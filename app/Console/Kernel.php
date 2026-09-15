<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('analytics:send-daily-report')
            ->dailyAt(config('analytics.daily_report_time', '08:00'))
            ->timezone(config('analytics.daily_report_timezone'))
            ->withoutOverlapping();

        $schedule->command('analytics:enrich-postal-areas')
            ->dailyAt(config('analytics.postal_enrichment_time', '07:30'))
            ->timezone(config('analytics.daily_report_timezone'))
            ->withoutOverlapping()
            ->name('postal-area-enrichment');

        $schedule->command('analytics:send-periodic-report weekly')
            ->cron(config('analytics.weekly_report_schedule', '10 08 * * 1'))
            ->timezone(config('analytics.daily_report_timezone'))
            ->withoutOverlapping()
            ->name('weekly-analytics-report');

        $schedule->command('analytics:send-periodic-report monthly')
            ->cron(config('analytics.monthly_report_schedule', '20 08 1 * *'))
            ->timezone(config('analytics.daily_report_timezone'))
            ->withoutOverlapping()
            ->name('monthly-analytics-report');

        $schedule->command('blogs:generate-with-ai')
            ->cron(config('ai_blog.schedule', '0 09 * * 1,4'))
            ->timezone(config('ai_blog.timezone', config('app.timezone')))
            ->withoutOverlapping(180)
            ->name('ai-blog-publisher');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
