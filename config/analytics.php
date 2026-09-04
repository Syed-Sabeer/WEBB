<?php

return [
    'daily_report_email' => env('DAILY_REPORT_EMAIL', 'info@avrioglobal.io'),
    'daily_report_time' => env('DAILY_REPORT_TIME', '08:00'),
    'daily_report_timezone' => env('DAILY_REPORT_TIMEZONE', config('app.timezone')),
];
