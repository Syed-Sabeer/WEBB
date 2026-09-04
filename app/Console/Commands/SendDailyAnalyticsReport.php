<?php

namespace App\Console\Commands;

use App\Models\ContactSubmission;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyAnalyticsReport extends Command
{
    protected $signature = 'analytics:send-daily-report {--date= : Report date in YYYY-MM-DD format; defaults to yesterday}';

    protected $description = 'Email the daily visitor location and contact submission report';

    public function handle(): int
    {
        try {
            $date = $this->option('date')
                ? Carbon::createFromFormat('Y-m-d', $this->option('date'))->startOfDay()
                : today(config('analytics.daily_report_timezone'))->subDay();
        } catch (\Throwable $error) {
            $this->error('The report date must use the YYYY-MM-DD format.');
            return self::FAILURE;
        }

        $recipient = config('analytics.daily_report_email');

        if (! filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            $this->error('DAILY_REPORT_EMAIL must contain a valid email address.');
            return self::FAILURE;
        }

        $visitors = Visitor::query()
            ->whereDate('visit_date', $date)
            ->get();

        $locations = $visitors
            ->groupBy(fn (Visitor $visitor) => collect(['country', 'state', 'city', 'area'])
                ->map(fn ($field) => $visitor->{$field} ?: 'Unknown')
                ->join('|'))
            ->map(function ($visitors) {
                $visitor = $visitors->first();

                return (object) [
                    'country' => $visitor->country ?: 'Unknown',
                    'state' => $visitor->state ?: 'Unknown',
                    'city' => $visitor->city ?: 'Unknown',
                    'area' => $visitor->area ?: 'Unknown',
                    'total' => $visitors->count(),
                ];
            })
            ->sortByDesc('total')
            ->values();

        $contacts = ContactSubmission::query()
            ->whereDate('created_at', $date)
            ->oldest('created_at')
            ->get();

        $pdf = Pdf::loadView('reports.daily-analytics-report', compact('date', 'visitors', 'locations', 'contacts'))
            ->setPaper('a4', 'landscape');
        $filename = 'avrio-daily-analytics-'.$date->toDateString().'.pdf';

        Mail::send('emails.daily-analytics-report', compact('date', 'visitors', 'contacts'), function ($mail) use ($recipient, $date, $pdf, $filename) {
            $mail->to($recipient)
                ->subject('Avrio Global daily report — '.$date->format('F j, Y'));
            $mail->attachData($pdf->output(), $filename, ['mime' => 'application/pdf']);
        });

        $this->info(sprintf(
            'Daily report for %s sent to %s (%d visits, %d contacts).',
            $date->toDateString(),
            $recipient,
            $visitors->count(),
            $contacts->count()
        ));

        return self::SUCCESS;
    }
}
