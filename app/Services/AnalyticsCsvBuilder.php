<?php

namespace App\Services;

use Illuminate\Support\Collection;
use RuntimeException;

class AnalyticsCsvBuilder
{
    public function build(Collection $visitors, Collection $contacts): string
    {
        $stream = fopen('php://temp', 'w+b');
        if ($stream === false) {
            throw new RuntimeException('Unable to create the analytics CSV stream.');
        }

        fwrite($stream, "\xEF\xBB\xBF");
        fputcsv($stream, [
            'Record Type', 'Record ID', 'Date', 'Time', 'IP Address', 'Country',
            'State', 'City', 'Postal Code', 'Area', 'Name', 'Email', 'Phone',
            'Subject', 'Message',
        ]);

        foreach ($visitors as $visitor) {
            fputcsv($stream, $this->safeRow([
                'Visit', $visitor->id, (string) $visitor->visit_date,
                optional($visitor->created_at)->format('H:i:s'), $visitor->ip_address,
                $visitor->country, $visitor->state, $visitor->city, $visitor->postal_code,
                $visitor->area, '', '', '', '', '',
            ]));
        }

        foreach ($contacts as $contact) {
            fputcsv($stream, $this->safeRow([
                'Contact Submission', $contact->id, optional($contact->created_at)->format('Y-m-d'),
                optional($contact->created_at)->format('H:i:s'), $contact->ip_address,
                $contact->country, $contact->state, $contact->city, $contact->postal_code,
                $contact->area, $contact->fullname, $contact->email, $contact->phone,
                $contact->subject, $contact->message,
            ]));
        }

        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);

        if ($csv === false) {
            throw new RuntimeException('Unable to read the analytics CSV stream.');
        }

        return $csv;
    }

    private function safeRow(array $row): array
    {
        return array_map(function ($value) {
            $value = (string) ($value ?? '');

            return preg_match('/^[=+\-@]/', ltrim($value)) ? "'".$value : $value;
        }, $row);
    }
}
