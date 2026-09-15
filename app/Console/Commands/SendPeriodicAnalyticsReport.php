<?php

namespace App\Console\Commands;

use App\Models\ContactSubmission;
use App\Models\Visitor;
use App\Services\AnalyticsCsvBuilder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPeriodicAnalyticsReport extends Command
{
    protected $signature = 'analytics:send-periodic-report
        {period : weekly or monthly}
        {--date= : Date inside the desired period (YYYY-MM-DD); defaults to the previous completed period}';

    protected $description = 'Email a weekly or monthly filter-ready analytics CSV report';

    public function handle(AnalyticsCsvBuilder $csvBuilder): int
    {
        $period = strtolower($this->argument('period'));
        if (! in_array($period, ['weekly', 'monthly'], true)) {
            $this->error('Period must be either "weekly" or "monthly".');
            return self::FAILURE;
        }

        try {
            [$start, $end] = $this->dateRange($period);
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
            ->whereBetween('visit_date', [$start->toDateString(), $end->toDateString()])
            ->oldest('visit_date')->oldest('created_at')->get();
        $contacts = ContactSubmission::query()
            ->whereBetween('created_at', [$start->copy()->startOfDay(), $end->copy()->endOfDay()])
            ->oldest('created_at')->get();

        $csv = $csvBuilder->build($visitors, $contacts);
        $filename = sprintf('avrio-%s-analytics-%s-to-%s.csv', $period, $start->toDateString(), $end->toDateString());

        Mail::send('emails.periodic-analytics-report', compact('period', 'start', 'end', 'visitors', 'contacts'), function ($mail) use ($recipient, $period, $start, $end, $csv, $filename) {
            $mail->to($recipient)
                ->subject(sprintf('Avrio Global %s report - %s to %s', ucfirst($period), $start->toDateString(), $end->toDateString()))
                ->attachData($csv, $filename, ['mime' => 'text/csv']);
        });

        $this->info(sprintf(
            '%s report sent to %s for %s through %s (%d visits, %d contacts).',
            ucfirst($period), $recipient, $start->toDateString(), $end->toDateString(),
            $visitors->count(), $contacts->count()
        ));

        return self::SUCCESS;
    }

    private function dateRange(string $period): array
    {
        $timezone = config('analytics.daily_report_timezone');
        if ($this->option('date')) {
            $reference = Carbon::createFromFormat('!Y-m-d', $this->option('date'), $timezone);
        } else {
            $reference = $period === 'weekly'
                ? today($timezone)->subWeek()
                : today($timezone)->subMonth();
        }

        return $period === 'weekly'
            ? [$reference->copy()->startOfWeek(Carbon::MONDAY), $reference->copy()->endOfWeek(Carbon::SUNDAY)]
            : [$reference->copy()->startOfMonth(), $reference->copy()->endOfMonth()];
    }
}
