<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class AnthropicBlogGenerator
{
    public function generate(string $theme, array $recentTitles): array
    {
        $apiKey = config('ai_blog.anthropic_api_key');

        if (! $apiKey) {
            throw new RuntimeException('ANTHROPIC_API_KEY is not configured.');
        }

        $response = Http::withHeaders([
                'x-api-key' => $apiKey,
                'anthropic-version' => '2023-06-01',
                'content-type' => 'application/json',
            ])
            ->connectTimeout(10)
            ->timeout(180)
            ->retry(2, 1000)
            ->post('https://api.anthropic.com/v1/messages', [
                'model' => config('ai_blog.anthropic_model'),
                'max_tokens' => 7000,
                'system' => 'You are the senior editorial writer for Avrio Global, a software and digital transformation company. Produce accurate, useful, original business content. Never invent statistics, quotations, customers, case studies, or current events. Return valid JSON only.',
                'messages' => [[
                    'role' => 'user',
                    'content' => $this->prompt($theme, $recentTitles),
                ]],
            ])
            ->throw();

        $text = collect($response->json('content', []))
            ->where('type', 'text')
            ->pluck('text')
            ->implode("\n");

        $data = $this->decodeJson($text);
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:4000',
            'category' => 'required|in:Fintech,IT Industry',
            'tags' => 'required|array|min:3|max:8',
            'tags.*' => 'required|string|max:40',
            'meta_title' => 'required|string|max:70',
            'meta_description' => 'required|string|max:160',
            'meta_keywords' => 'required|array|min:3|max:10',
            'meta_keywords.*' => 'required|string|max:50',
            'image_brief' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $validated = $validator->validated();
        $validated['content'] = $this->sanitizeContent($validated['content']);

        return $validated;
    }

    private function prompt(string $theme, array $recentTitles): string
    {
        $titles = $recentTitles ? implode("\n- ", $recentTitles) : 'None';

        return <<<PROMPT
Write one evergreen, practical {$theme} article for business leaders and technology decision-makers.

Requirements:
- 1,200–1,800 words, clear professional English, actionable and educational rather than promotional.
- Use HTML only in content: paragraphs, h2/h3, ul/ol/li, strong, em, and blockquote. Do not include h1, scripts, styles, links, images, markdown, or a repeated title.
- Avoid claims requiring live data. Do not fabricate facts. Explain uncertainty where relevant.
- Do not reuse or closely imitate these recent titles:
- {$titles}
- Provide an image brief for a modern editorial technology illustration with no words, logos, trademarks, or people.

Return exactly one JSON object with this schema:
{"title":"...","content":"<p>...</p>","category":"Fintech or IT Industry","tags":["..."],"meta_title":"...","meta_description":"...","meta_keywords":["..."],"image_brief":"..."}
PROMPT;
    }

    private function decodeJson(string $text): array
    {
        $start = strpos($text, '{');
        $end = strrpos($text, '}');

        if ($start === false || $end === false || $end < $start) {
            throw new RuntimeException('Claude did not return a JSON object.');
        }

        $data = json_decode(substr($text, $start, $end - $start + 1), true);

        if (! is_array($data)) {
            throw new RuntimeException('Claude returned invalid JSON: '.json_last_error_msg());
        }

        return $data;
    }

    private function sanitizeContent(string $content): string
    {
        $content = strip_tags($content, '<p><h2><h3><ul><ol><li><strong><em><blockquote>');

        return preg_replace('/<(p|h2|h3|ul|ol|li|strong|em|blockquote)\b[^>]*>/i', '<$1>', $content) ?: '';
    }
}
