<?php

return [
    'daily_report_email' => env('DAILY_REPORT_EMAIL', 'info@avrioglobal.io'),
    'daily_report_time' => env('DAILY_REPORT_TIME', '08:00'),
    'daily_report_timezone' => env('DAILY_REPORT_TIMEZONE', config('app.timezone')),
    'weekly_report_schedule' => env('WEEKLY_REPORT_CRON', '10 08 * * 1'),
    'monthly_report_schedule' => env('MONTHLY_REPORT_CRON', '20 08 1 * *'),
    'geonames_username' => env('GEONAMES_USERNAME'),
    'postal_enrichment_time' => env('POSTAL_ENRICHMENT_TIME', '07:30'),
];
