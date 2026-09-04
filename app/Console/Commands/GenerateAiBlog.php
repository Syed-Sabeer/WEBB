<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Services\AnthropicBlogGenerator;
use App\Services\BlogFeaturedImageGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GenerateAiBlog extends Command
{
    protected $signature = 'blogs:generate-with-ai {--theme= : Fintech or IT Industry} {--draft : Save the generated blog as a draft}';

    protected $description = 'Generate and save a fintech or IT blog using Claude';

    public function handle(AnthropicBlogGenerator $generator, BlogFeaturedImageGenerator $imageGenerator): int
    {
        $theme = $this->resolveTheme();

        if (! $theme) {
            $this->error('Theme must be either "Fintech" or "IT Industry".');
            return self::FAILURE;
        }

        $this->info("Generating a {$theme} article with Claude...");

        try {
            $article = $generator->generate(
                $theme,
                Blog::latest()->limit(20)->pluck('title')->all()
            );
            $slug = $this->uniqueSlug($article['title']);
            $image = $imageGenerator->generate($article['title'], $article['category'], $article['image_brief'], $slug);

            try {
                $blog = DB::transaction(fn () => Blog::create([
                    'title' => $article['title'],
                    'slug' => $slug,
                    'content' => $article['content'],
                    'category' => $article['category'],
                    'image' => $image,
                    'tags' => implode(', ', $article['tags']),
                    'min_read' => max(1, (int) ceil(str_word_count(strip_tags($article['content'])) / 220)).' min read',
                    'visibility' => $this->option('draft') ? 0 : (int) config('ai_blog.auto_publish', true),
                    'meta_title' => $article['meta_title'],
                    'meta_description' => $article['meta_description'],
                    'meta_keywords' => implode(', ', $article['meta_keywords']),
                ]));
            } catch (\Throwable $error) {
                Storage::disk('public')->delete($image);
                throw $error;
            }

            $status = $blog->visibility ? 'published' : 'saved as a draft';
            $this->info("Blog #{$blog->id} {$status}: {$blog->title}");
            return self::SUCCESS;
        } catch (\Throwable $error) {
            Log::error('AI blog generation failed', ['theme' => $theme, 'message' => $error->getMessage()]);
            $this->error('AI blog generation failed: '.$error->getMessage());
            return self::FAILURE;
        }
    }

    private function resolveTheme(): ?string
    {
        if ($requested = $this->option('theme')) {
            return collect(['Fintech', 'IT Industry'])->first(fn ($theme) => strcasecmp($theme, $requested) === 0);
        }

        return Blog::latest()->value('category') === 'Fintech' ? 'IT Industry' : 'Fintech';
    }

    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title) ?: 'ai-generated-blog';
        $slug = $base;
        $suffix = 2;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = $base.'-'.$suffix++;
        }

        return $slug;
    }
}
