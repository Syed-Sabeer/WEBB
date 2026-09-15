# Avrio Global Automated AI Blog Agent

## Purpose

This document is the technical handoff for the automated blog-publishing feature in the Avrio Global Laravel application. It is intended to give another AI assistant or developer enough context to understand, operate, debug, and extend the feature without rediscovering the implementation.

The agent uses Anthropic Claude to create SEO-ready articles about Fintech and the IT industry. Laravel's scheduler runs the publishing command twice per week. A successful run creates a complete `Blog` record and a branded featured image.

## Current behavior at a glance

- Artisan command: `blogs:generate-with-ai`
- Default schedule: Monday and Thursday at 09:00
- Default model: `claude-sonnet-5`
- Supported themes/categories: `Fintech` and `IT Industry`
- Default behavior: publish immediately
- Optional behavior: save as a draft
- Article target: 1,200–1,800 words
- Featured image: branded SVG with an intrinsic size of 1080×675 pixels
- Recent-title context: the latest 20 blog titles
- API endpoint: `POST https://api.anthropic.com/v1/messages`

## Important distinction about image generation

Claude currently generates the article text, SEO data, and an `image_brief`. It does not generate the final raster artwork in this implementation.

`BlogFeaturedImageGenerator` creates a deterministic branded SVG using:

- The article title
- The selected category
- Category-specific colors
- The Claude-generated image brief as the SVG description

The resulting SVG is 1080×675 and is stored on Laravel's `public` filesystem disk. If true AI-generated illustrations or photos are required, a separate image-generation API must be integrated and should replace or extend `BlogFeaturedImageGenerator`.

## Main files

| File | Responsibility |
| --- | --- |
| `config/ai_blog.php` | Maps environment variables into application configuration. |
| `app/Console/Commands/GenerateAiBlog.php` | Orchestrates topic selection, Claude generation, image creation, database persistence, and error handling. |
| `app/Services/AnthropicBlogGenerator.php` | Calls the Anthropic Messages API, decodes and validates JSON, and sanitizes article HTML. |
| `app/Services/BlogFeaturedImageGenerator.php` | Builds and stores the branded 1080×675 SVG featured image. |
| `app/Console/Kernel.php` | Registers the twice-weekly Laravel schedule. |
| `app/Models/Blog.php` | Defines mass-assignable blog fields and slug behavior. |
| `tests/Unit/AnthropicBlogGeneratorTest.php` | Tests structured Claude output, sanitization, and featured-image creation. |
| `.env.example` | Documents the required environment variables. |

## Environment configuration

These values belong in the real deployment `.env` file:

```env
ANTHROPIC_API_KEY=your_anthropic_api_key
ANTHROPIC_MODEL=claude-sonnet-5
AI_BLOG_AUTO_PUBLISH=true
AI_BLOG_CRON="0 09 * * 1,4"
AI_BLOG_TIMEZONE=UTC
```

### Variable reference

#### `ANTHROPIC_API_KEY`

Required. The secret Anthropic API key used in the `x-api-key` request header.

Never commit a real API key to Git, `.env.example`, a prompt, a log entry, or this document.

#### `ANTHROPIC_MODEL`

Optional. Defaults to `claude-sonnet-5`.

The model name is passed directly to Anthropic. If Anthropic retires or replaces the configured model, update this value without changing application code.

#### `AI_BLOG_AUTO_PUBLISH`

Optional boolean. Defaults to `true`.

- `true`: scheduled articles are created with `visibility = 1`.
- `false`: scheduled articles are created with `visibility = 0` and must be reviewed and published manually.
- The command's `--draft` option always forces `visibility = 0`, regardless of this setting.

For a new production rollout, setting this to `false` for the first few runs is safer while editorial quality is reviewed.

#### `AI_BLOG_CRON`

Optional cron expression. Defaults to:

```text
0 09 * * 1,4
```

This means 09:00 every Monday and Thursday, which produces two scheduled blog runs per week.

#### `AI_BLOG_TIMEZONE`

Optional. Defaults to Laravel's `config('app.timezone')`. This timezone determines when the cron expression is evaluated.

Use an explicit production value when business timing matters, for example:

```env
AI_BLOG_TIMEZONE=Asia/Karachi
```

## Configuration loading

Application code reads values from `config/ai_blog.php`, not directly from `env()` outside configuration files.

After changing production environment values, rebuild Laravel's cached configuration:

```bash
php artisan optimize:clear
php artisan config:cache
```

Editing `.env.example` does not change runtime behavior. `.env.example` is documentation for new installations only.

## End-to-end execution flow

1. Laravel's scheduler determines that `blogs:generate-with-ai` is due.
2. The command chooses a theme.
3. The command loads the latest 20 blog titles to discourage repeated subjects.
4. `AnthropicBlogGenerator` calls Claude.
5. Claude returns one JSON object containing the article and metadata.
6. The service extracts the JSON object from Claude's text response.
7. Laravel validates all required fields and length constraints.
8. The article HTML is sanitized with a small allowlist.
9. The command generates a unique slug.
10. `BlogFeaturedImageGenerator` writes a branded SVG to the public disk.
11. The command creates the blog inside a database transaction.
12. If database creation fails after image creation, the generated image is deleted.
13. The command logs failures and exits with a non-zero status when any stage fails.

No blog record should be created if the Claude request, JSON parsing, validation, HTML sanitization, or image storage fails.

## Theme selection

The command accepts only these exact logical themes:

- `Fintech`
- `IT Industry`

Theme matching for the `--theme` option is case-insensitive.

When no theme is supplied:

- If the newest blog's category is `Fintech`, the next theme is `IT Industry`.
- Otherwise, the next theme is `Fintech`.

This creates a simple alternating pattern. It is based on the newest blog in the entire blogs table, including manually created blogs, so a manual blog category can affect the next automated category.

## Artisan commands

Generate using automatic theme selection:

```bash
php artisan blogs:generate-with-ai
```

Force a Fintech article:

```bash
php artisan blogs:generate-with-ai --theme=Fintech
```

Force an IT Industry article:

```bash
php artisan blogs:generate-with-ai --theme="IT Industry"
```

Generate but save as an unpublished draft:

```bash
php artisan blogs:generate-with-ai --draft
```

Combine a theme and draft mode:

```bash
php artisan blogs:generate-with-ai --theme=Fintech --draft
```

Invalid themes make the command exit with failure before calling Claude.

## Anthropic API request

`AnthropicBlogGenerator` uses Laravel's HTTP client with:

- Header `x-api-key: {ANTHROPIC_API_KEY}`
- Header `anthropic-version: 2023-06-01`
- Header `content-type: application/json`
- Connection timeout: 10 seconds
- Total request timeout: 180 seconds
- Retries: 2, waiting 1 second between attempts
- Maximum output tokens: 7,000

The configured model is read from `config('ai_blog.anthropic_model')`.

The service combines all response content blocks whose `type` is `text`. It then takes the text from the first `{` through the last `}` and decodes that substring as JSON. This allows minor surrounding text or Markdown fences, although the prompt explicitly requires JSON only.

## Claude editorial instructions

The system prompt identifies Claude as Avrio Global's senior editorial writer and requires:

- Accurate and useful original content
- No invented statistics
- No fabricated quotations
- No fabricated customers or case studies
- No invented current events
- JSON-only output

The user prompt requires:

- One evergreen article for business leaders and technology decision-makers
- A target length of 1,200–1,800 words
- Professional, actionable, educational language
- Content that is not excessively promotional
- HTML content rather than Markdown
- No reuse or close imitation of the latest 20 titles
- An image brief without words, logos, trademarks, or people

Because Claude is not given web-search tools or current sources, the prompt tells it to avoid claims requiring live data.

## Required Claude JSON contract

Claude must return exactly one logical object with this shape:

```json
{
  "title": "Article title",
  "content": "<p>Article HTML...</p>",
  "category": "Fintech",
  "tags": ["fintech", "payments", "security"],
  "meta_title": "SEO title",
  "meta_description": "SEO description",
  "meta_keywords": ["fintech development", "payment security"],
  "image_brief": "A modern editorial technology illustration..."
}
```

`category` must be either `Fintech` or `IT Industry`.

There is intentionally no `summary` or `summary_note` field. Summary-note support was removed from the blog model, UI, AI schema, and database.

## Response validation

The response must pass these Laravel validation rules:

| Field | Rules |
| --- | --- |
| `title` | Required string, maximum 255 characters |
| `content` | Required string, minimum 4,000 characters |
| `category` | Required, exactly `Fintech` or `IT Industry` |
| `tags` | Required array, 3–8 items |
| Each tag | Required string, maximum 40 characters |
| `meta_title` | Required string, maximum 70 characters |
| `meta_description` | Required string, maximum 160 characters |
| `meta_keywords` | Required array, 3–10 items |
| Each keyword | Required string, maximum 50 characters |
| `image_brief` | Required string, maximum 500 characters |

Validation failure throws `ValidationException`, which the command catches and logs as an AI blog generation failure.

## HTML security and sanitization

Blog content is ultimately rendered as trusted HTML by the frontend, so generated content is sanitized before persistence.

Allowed elements:

```text
p, h2, h3, ul, ol, li, strong, em, blockquote
```

All other elements are removed. Attributes on allowed opening elements are also removed. Therefore event handlers, inline styles, classes, IDs, and other generated attributes are not stored.

The prompt separately prohibits:

- `h1`
- `script`
- `style`
- links
- images
- Markdown
- repeating the article title inside the content

If the allowed HTML rules are changed, update both the prompt and `sanitizeContent()` together. Never expand the allowlist without considering stored-XSS risk.

## Blog persistence mapping

Validated Claude output is mapped to the `blogs` table as follows:

| Blog field | Source |
| --- | --- |
| `title` | Claude `title` |
| `slug` | Unique slug derived from the title |
| `content` | Sanitized Claude `content` |
| `category` | Claude `category` |
| `image` | Path returned by `BlogFeaturedImageGenerator` |
| `tags` | Claude tag array joined with `, ` |
| `min_read` | Calculated word count divided by 220 and rounded up |
| `visibility` | `--draft`, otherwise `AI_BLOG_AUTO_PUBLISH` |
| `meta_title` | Claude `meta_title` |
| `meta_description` | Claude `meta_description` |
| `meta_keywords` | Claude keyword array joined with `, ` |

The minimum displayed reading time is one minute.

## Slug generation and duplicate handling

The base slug is created with `Str::slug($title)`. If that produces an empty string, the base becomes `ai-generated-blog`.

If the slug already exists, numeric suffixes are tried:

```text
example-title
example-title-2
example-title-3
```

This prevents database unique-key failures when two articles have the same title. It does not prevent semantically duplicate articles with different titles.

## Featured image generation

`BlogFeaturedImageGenerator` creates an SVG with:

- Width: 1080 pixels
- Height: 675 pixels
- View box: `0 0 1080 675`
- Avrio Global label
- Article category
- Article title, wrapped to 30 characters and limited to three lines
- Decorative circles and lines
- XML-escaped title, category, and image brief

Category palettes:

- Fintech: navy, teal, and light teal
- IT Industry: dark purple, violet, and light violet

Storage path:

```text
storage/app/public/uploads/ai-blogs/{slug}.svg
```

Database value:

```text
uploads/ai-blogs/{slug}.svg
```

Public URL convention:

```text
/storage/uploads/ai-blogs/{slug}.svg
```

The production server must have Laravel's public storage link:

```bash
php artisan storage:link
```

The `image_brief` is currently stored only inside the SVG `<desc>` element and does not substantially change the visual composition. An image API integration should use this brief as its generation prompt.

## Scheduler configuration

The Laravel schedule is registered in `app/Console/Kernel.php`:

```php
$schedule->command('blogs:generate-with-ai')
    ->cron(config('ai_blog.schedule', '0 09 * * 1,4'))
    ->timezone(config('ai_blog.timezone', config('app.timezone')))
    ->withoutOverlapping(180)
    ->name('ai-blog-publisher');
```

`withoutOverlapping(180)` prevents concurrent scheduler instances of this job and gives the overlap lock a 180-minute expiry. It does not guarantee one article per calendar date if the command is also run manually.

Verify Laravel's interpreted schedule with:

```bash
php artisan schedule:list
```

Expected default entry:

```text
0 09 * * 1,4  php artisan blogs:generate-with-ai
```

## Required server cron

Laravel's schedule does nothing unless the hosting server invokes `schedule:run` every minute.

Typical Linux cron:

```cron
* * * * * cd /absolute/path/to/AvrioGlobal && php artisan schedule:run >> /dev/null 2>&1
```

On hosting panels that prepend the PHP binary and account home path, the command may be entered as:

```text
public_html/artisan schedule:run >> /dev/null 2>&1
```

Use the actual directory containing `artisan`. Only one server cron is needed for all Laravel-scheduled commands.

## Deployment checklist

1. Deploy all application changes.
2. Add the real Anthropic key to the production `.env`.
3. Set the model, publishing mode, cron expression, and timezone.
4. Install Composer dependencies.
5. Run database migrations.
6. Ensure the public storage link exists.
7. Clear stale Laravel caches and rebuild production caches.
8. Configure the server cron to run Laravel's scheduler every minute.
9. Check `schedule:list`.
10. Run one article as a draft and review it before enabling automatic publication.

Recommended deployment commands:

```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan storage:link
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan schedule:list
php artisan blogs:generate-with-ai --draft
```

If `storage:link` reports that the link already exists, verify that `public/storage` points to `storage/app/public` rather than deleting it blindly.

## Testing

Focused tests:

```bash
php artisan test tests/Unit/AnthropicBlogGeneratorTest.php
```

The test suite currently verifies:

- A mocked Anthropic response is accepted.
- Structured fields are returned correctly.
- Unsafe HTML attributes such as `onclick` are removed.
- Exactly one mocked HTTP request is sent.
- A featured image is written to the public disk.
- The image path follows the expected convention.
- The SVG has a 1080×675 canvas.

The tests use `Http::fake()` and `Storage::fake('public')`; they do not spend Anthropic credits or write a real featured image.

## Logging and failure diagnosis

All command-level failures are logged with:

```text
AI blog generation failed
```

The log context includes:

- Selected theme
- Exception message

Production log location:

```text
storage/logs/laravel.log
```

Useful commands:

```bash
php artisan blogs:generate-with-ai --draft
php artisan schedule:list
php artisan schedule:run -v
tail -n 200 storage/logs/laravel.log
```

### Common failures

#### `ANTHROPIC_API_KEY is not configured.`

The real `.env` is missing the key, or Laravel is using stale cached configuration.

```bash
php artisan optimize:clear
php artisan config:cache
```

#### Authentication or HTTP 401

The Anthropic key is invalid, expired, revoked, or associated with the wrong account/workspace.

#### Model-not-found error

`ANTHROPIC_MODEL` is invalid or unavailable to the Anthropic account. Set it to a supported model and rebuild the configuration cache.

#### HTTP timeout

Claude did not respond within 180 seconds or the server could not reach `api.anthropic.com`. Check outbound HTTPS access, DNS, firewall rules, and provider status.

#### Invalid JSON

Claude did not return a decodable JSON object. Review the raw behavior using a safe development environment, refine the prompt, or add a controlled repair/retry step. Never log the API key.

#### Validation failure

Claude omitted a field, returned the wrong category, produced content below 4,000 characters, or exceeded an SEO limit.

#### Image does not appear publicly

Check:

```bash
php artisan storage:link
```

Also verify write permission for `storage/app/public/uploads/ai-blogs` and web access through `public/storage`.

#### Scheduler never publishes

Check all of the following:

- The system cron runs once per minute.
- The cron points to the correct `artisan` file.
- `php artisan schedule:list` contains the AI job.
- `AI_BLOG_CRON` is set in `.env`, not only `.env.example`.
- Laravel's config cache was rebuilt after environment changes.
- The configured timezone matches expectations.
- A stale overlap lock is not suppressing the job.

Clear scheduler locks when appropriate:

```bash
php artisan schedule:clear-cache
```

## Security and editorial safeguards

- Keep the Anthropic API key only in environment configuration.
- Do not expose API responses or secrets in browser responses.
- Preserve server-side validation even if the prompt is strengthened.
- Preserve HTML sanitization because frontend blog content is rendered as HTML.
- Prefer draft mode until editorial behavior is reviewed in production.
- Do not let generated content make unsourced legal, financial, security, medical, or regulatory claims.
- Do not assume Claude has current facts unless a separate verified research pipeline is added.
- Review copyright, attribution, factual accuracy, brand voice, and SEO quality before expanding automatic publication.

## Known limitations

- The agent does not browse or verify current sources.
- It does not cite sources.
- It does not create a true AI-generated raster image.
- The image brief has minimal visual influence in the current SVG generator.
- Recent-title avoidance is prompt-based and not a semantic duplicate detector.
- The alternating theme algorithm can be influenced by manually created blogs.
- There is no database record identifying which blogs were AI-generated.
- There is no approval workflow beyond setting `visibility = 0`.
- There is no alert email or retry queue after a scheduled failure.
- There is no cost/token usage tracking.
- There is no per-week idempotency record; manual reruns can create additional blogs.

## Recommended future improvements

1. Add `generated_by`, `ai_model`, and `generation_metadata` columns to blogs.
2. Save API request IDs and token usage without saving secrets.
3. Add a dedicated image-generation provider interface and retain the SVG as fallback.
4. Add editorial review and approval notifications.
5. Add semantic similarity checks against existing articles.
6. Add source-backed research with explicit citations before content generation.
7. Queue generation so scheduler execution is short and retryable.
8. Add alerting for failed scheduled runs.
9. Add a weekly quota/idempotency table to prevent accidental duplicate runs.
10. Add integration tests for database transaction cleanup and visibility behavior.

## Safe modification checklist for another AI

Before changing this feature:

1. Read every file listed in **Main files**.
2. Do not remove validation or HTML sanitization.
3. Keep secrets out of tracked files and logs.
4. Keep the Claude JSON contract, validation rules, and persistence mapping synchronized.
5. Keep image dimensions at 1080×675 unless the product requirement changes.
6. Preserve deletion of the generated image when database persistence fails.
7. Preserve unique-slug behavior.
8. Confirm scheduled and manual draft behavior separately.
9. Run the focused unit test after changes.
10. Run `php artisan schedule:list` after scheduler or configuration changes.

## Quick handoff summary

The feature is a Laravel Artisan workflow scheduled twice weekly. `GenerateAiBlog` orchestrates the run, `AnthropicBlogGenerator` obtains and validates a structured article from Claude, and `BlogFeaturedImageGenerator` creates a branded 1080×675 SVG. The article is saved to the existing `blogs` table and is published by default unless draft mode or configuration says otherwise. Production requires a valid Anthropic key, cached configuration refresh, writable public storage, a storage symlink, and a server cron that invokes Laravel's scheduler every minute.
