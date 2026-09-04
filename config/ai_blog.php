<?php

return [
    'anthropic_api_key' => env('ANTHROPIC_API_KEY'),
    'anthropic_model' => env('ANTHROPIC_MODEL', 'claude-sonnet-5'),
    'auto_publish' => env('AI_BLOG_AUTO_PUBLISH', true),
    'schedule' => env('AI_BLOG_CRON', '0 09 * * 1,4'),
    'timezone' => env('AI_BLOG_TIMEZONE', config('app.timezone')),
];
