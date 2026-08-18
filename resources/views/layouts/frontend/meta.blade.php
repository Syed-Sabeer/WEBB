@php
    // @section('name', $value) inline form already runs $value through e(), so
    // decode here before re-escaping via {{ }} below to avoid double-encoding.
    $seoDecode = fn ($value) => $value === '' ? '' : html_entity_decode($value, ENT_QUOTES);

    $seoTitle = $seoDecode(trim($__env->yieldContent('title'))) ?: config('seo.default_title');
    $seoDescription = $seoDecode(trim($__env->yieldContent('meta_description'))) ?: config('seo.default_description');
    $seoKeywords = $seoDecode(trim($__env->yieldContent('meta_keywords'))) ?: config('seo.default_keywords');
    $seoRobots = $seoDecode(trim($__env->yieldContent('meta_robots'))) ?: 'index, follow';
    $seoCanonical = $seoDecode(trim($__env->yieldContent('canonical'))) ?: url()->current();
    $seoImage = $seoDecode(trim($__env->yieldContent('og_image'))) ?: asset(config('seo.logo'));
    $seoType = $seoDecode(trim($__env->yieldContent('og_type'))) ?: 'website';
    $seoLogo = asset(config('seo.logo'));
@endphp
<!-- ========== Meta Tags ========== -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="{{ config('seo.site_name') }}">
<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="robots" content="{{ $seoRobots }}">

<!-- ======== Page title ============ -->
<title>{{ $seoTitle }}</title>

<!-- ======== Canonical ============ -->
<link rel="canonical" href="{{ $seoCanonical }}">

<!-- ======== Favicon ============ -->
<link rel="icon" type="image/png" href="{{ $seoLogo }}">
<link rel="apple-touch-icon" href="{{ $seoLogo }}">

<!-- ======== Open Graph ============ -->
<meta property="og:site_name" content="{{ config('seo.site_name') }}">
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $seoCanonical }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:locale" content="en_US">

<!-- ======== Twitter Card ============ -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

<!-- ======== Organization Structured Data ============ -->
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => config('seo.site_name'),
    'url' => config('seo.domain'),
    'logo' => $seoLogo,
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => config('seo.phone'),
        'contactType' => 'customer service',
        'email' => config('seo.email'),
    ],
    'sameAs' => array_values(array_filter(config('seo.social'))),
], JSON_UNESCAPED_SLASHES) !!}
</script>

@stack('schema')
