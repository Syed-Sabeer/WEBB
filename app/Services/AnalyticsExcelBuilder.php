<?php

namespace App\Services;

use Illuminate\Support\Collection;

class AnalyticsExcelBuilder
{
    private const HEADERS = [
        'Record Type', 'Record ID', 'Date', 'Time', 'IP Address', 'Country',
        'State', 'City', 'Postal Code', 'Area', 'Name', 'Email', 'Phone',
        'Subject', 'Message',
    ];

    public function build(Collection $visitors, Collection $contacts): string
    {
        $rows = [];

        foreach ($visitors as $visitor) {
            $rows[] = [
                'Visit', $visitor->id, (string) $visitor->visit_date,
                optional($visitor->created_at)->format('H:i:s'), $visitor->ip_address,
                $visitor->country, $visitor->state, $visitor->city, $visitor->postal_code,
                $visitor->area, '', '', '', '', '',
            ];
        }

        foreach ($contacts as $contact) {
            $rows[] = [
                'Contact Submission', $contact->id, optional($contact->created_at)->format('Y-m-d'),
                optional($contact->created_at)->format('H:i:s'), $contact->ip_address,
                $contact->country, $contact->state, $contact->city, $contact->postal_code,
                $contact->area, $contact->fullname, $contact->email, $contact->phone,
                $contact->subject, $contact->message,
            ];
        }

        $header = $this->row(self::HEADERS, 'Header');
        $body = collect($rows)->map(fn ($row) => $this->row($row))->implode("\n");
        $lastRow = count($rows) + 1;
        $columnCount = count(self::HEADERS);

        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<?mso-application progid="Excel.Sheet"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
 xmlns:o="urn:schemas-microsoft-com:office:office"
 xmlns:x="urn:schemas-microsoft-com:office:excel"
 xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">
 <Styles>
  <Style ss:ID="Default" ss:Name="Normal"><Alignment ss:Vertical="Top"/><Font ss:FontName="Arial" ss:Size="10"/></Style>
  <Style ss:ID="Header"><Font ss:FontName="Arial" ss:Size="10" ss:Bold="1" ss:Color="#FFFFFF"/><Interior ss:Color="#198754" ss:Pattern="Solid"/><Alignment ss:Vertical="Center"/></Style>
 </Styles>
 <Worksheet ss:Name="Analytics">
  <Table ss:ExpandedColumnCount="{$columnCount}" ss:ExpandedRowCount="{$lastRow}" x:FullColumns="1" x:FullRows="1">
   <Column ss:Width="105"/><Column ss:Width="60"/><Column ss:Width="75"/><Column ss:Width="65"/><Column ss:Width="120"/>
   <Column ss:Width="95"/><Column ss:Width="95"/><Column ss:Width="95"/><Column ss:Width="80"/><Column ss:Width="110"/>
   <Column ss:Width="120"/><Column ss:Width="150"/><Column ss:Width="100"/><Column ss:Width="160"/><Column ss:Width="280"/>
   {$header}
   {$body}
  </Table>
  <AutoFilter x:Range="R1C1:R{$lastRow}C{$columnCount}" xmlns="urn:schemas-microsoft-com:office:excel"/>
  <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel"><FreezePanes/><FrozenNoSplit/><SplitHorizontal>1</SplitHorizontal><TopRowBottomPane>1</TopRowBottomPane><ActivePane>2</ActivePane></WorksheetOptions>
 </Worksheet>
</Workbook>
XML;
    }

    private function row(array $values, ?string $style = null): string
    {
        $cells = collect($values)->map(function ($value, $index) {
            $value = (string) ($value ?? '');
            $type = $index === 1 && ctype_digit($value) ? 'Number' : 'String';

            if ($index === 2 && preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
                $type = 'DateTime';
                $value .= 'T00:00:00.000';
            }

            return '<Cell><Data ss:Type="'.$type.'">'.$this->escape($value).'</Data></Cell>';
        })->implode('');
        $styleAttribute = $style ? ' ss:StyleID="'.$style.'"' : '';

        return '<Row'.$styleAttribute.'>'.$cells.'</Row>';
    }

    private function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }
}
