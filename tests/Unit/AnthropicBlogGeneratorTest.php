<?php

namespace Tests\Unit;

use App\Services\AnthropicBlogGenerator;
use App\Services\BlogFeaturedImageGenerator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnthropicBlogGeneratorTest extends TestCase
{
    public function test_it_generates_and_validates_a_structured_article(): void
    {
        config(['ai_blog.anthropic_api_key' => 'test-key', 'ai_blog.anthropic_model' => 'test-model']);
        $article = [
            'title' => 'A Practical Fintech Architecture Guide',
            'content' => '<p onclick="alert(1)">'.str_repeat('Useful and original fintech guidance. ', 150).'</p>',
            'category' => 'Fintech',
            'tags' => ['fintech', 'architecture', 'security'],
            'meta_title' => 'A Practical Fintech Architecture Guide',
            'meta_description' => 'Learn how to plan secure and maintainable fintech architecture for sustainable business growth.',
            'meta_keywords' => ['fintech architecture', 'fintech security', 'software planning'],
            'image_brief' => 'Abstract secure payment rails in teal and navy.',
        ];

        Http::fake([
            'api.anthropic.com/*' => Http::response([
                'content' => [['type' => 'text', 'text' => json_encode($article)]],
            ]),
        ]);

        $result = app(AnthropicBlogGenerator::class)->generate('Fintech', []);

        $this->assertSame($article['title'], $result['title']);
        $this->assertStringNotContainsString('onclick', $result['content']);
        Http::assertSentCount(1);
    }

    public function test_it_creates_a_public_featured_image(): void
    {
        Storage::fake('public');

        $path = app(BlogFeaturedImageGenerator::class)->generate(
            'Modern Fintech Infrastructure',
            'Fintech',
            'Abstract connected financial systems.',
            'modern-fintech-infrastructure'
        );

        $this->assertSame('uploads/ai-blogs/modern-fintech-infrastructure.svg', $path);
        Storage::disk('public')->assertExists($path);
    }
}
