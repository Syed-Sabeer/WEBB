<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class BlogFeaturedImageGenerator
{
    public function generate(string $title, string $category, string $brief, string $slug): string
    {
        $palette = $category === 'Fintech'
            ? ['#081f3d', '#0f766e', '#5eead4']
            : ['#18122b', '#6d28d9', '#c4b5fd'];
        $titleLines = array_slice(explode("\n", wordwrap($title, 30)), 0, 3);
        $text = collect($titleLines)->map(function ($line, $index) {
            $y = 300 + ($index * 62);
            return '<text x="72" y="'.$y.'" fill="#ffffff" font-family="Arial, sans-serif" font-size="48" font-weight="700">'.$this->escape($line).'</text>';
        })->implode("\n");

        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1080" height="675" viewBox="0 0 1080 675">
  <title>{$this->escape($title)}</title>
  <desc>{$this->escape($brief)}</desc>
  <defs><linearGradient id="bg" x1="0" y1="0" x2="1" y2="1"><stop stop-color="{$palette[0]}"/><stop offset="1" stop-color="{$palette[1]}"/></linearGradient></defs>
  <rect width="1080" height="675" fill="url(#bg)"/>
  <circle cx="950" cy="100" r="245" fill="{$palette[2]}" opacity=".18"/>
  <circle cx="940" cy="620" r="190" fill="#ffffff" opacity=".08"/>
  <path d="M700 130h300M750 190h280M820 250h200" stroke="{$palette[2]}" stroke-width="8" stroke-linecap="round" opacity=".5"/>
  <text x="72" y="105" fill="{$palette[2]}" font-family="Arial, sans-serif" font-size="24" font-weight="700" letter-spacing="3">AVRIO GLOBAL · {$this->escape(strtoupper($category))}</text>
  {$text}
  <rect x="72" y="530" width="130" height="8" rx="4" fill="{$palette[2]}"/>
</svg>
SVG;

        $path = 'uploads/ai-blogs/'.Str::slug($slug).'.svg';

        if (! Storage::disk('public')->put($path, $svg)) {
            throw new RuntimeException('The generated featured image could not be stored.');
        }

        return $path;
    }

    private function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }
}
