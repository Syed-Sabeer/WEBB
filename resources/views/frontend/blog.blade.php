@extends('layouts.frontend.master')


@section('css')

@endsection

@section('content')


    <!-- Breadcrumb Section Start -->
                    <div class="breadcrumb-wrapper light-theme-breadcrumb bg-cover" style="background-image: url({{ asset('FrontendAssets/img/inner-page/bread-line.png') }});">
                        <div class="light-bg">
                            <img src="{{ asset('FrontendAssets/img/inner-page/light.png')}}" alt="img">
                        </div>
                        <div class="container">
                            <div class="page-heading mb-0">
                                <div class="breadcrumb-sub-title">
                                    <h1 class="about-page-heading-title"><span>Software Insights</span>
                                        For Building Better Digital Products
                                    </h1>
                                </div>
                                <div class="breadcrumb-items">
                                    <ul>
                                        <li>
                                           <span class="about-page-heading-meta">Software insights for businesses</span>
                                        </li>
                                        <li>
    (&copy;2020 — {{ date('Y') }})
</li>
                                    </ul>
                                    <h2 class="title wa_title_spilt_1">
                                     Avrio Insights
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   <!-- GT News-standard Section Start -->
                    <section class="news-standard-section section-padding">
                        <div class="container">
                            <div class="gt-news-standard-wrapper">
                                <div class="row g-4">
                                    <div class="col-12 col-lg-8">
                                        <div class="gt-news-standard-items">
                                            @forelse($blogs as $blog)
                                                <article class="gt-news-card-items-4">
                                                    <div class="gt-news-image">
                                                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/img/inner-page/blog-post-1.jpg') }}" alt="{{ $blog->title }}">
                                                    </div>
                                                    <div class="gt-news-content">
                                                        <ul class="gt-date-list">
                                                            <li><i class="fa-solid fa-calendar-days"></i> {{ optional($blog->created_at)->format('d F Y') }}</li>
                                                            {{-- <li><i class="fa-solid fa-comments"></i> {{ $blog->comments_count ?? 0 }} Comments</li> --}}
                                                        </ul>
                                                        <h2 class="news-title"><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h2>
                                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 220) }}</p>
                                                        <a class="theme-btn-main style-2 bg-white-style" href="{{ route('blog.detail', $blog->slug) }}">
                                                            <span class="theme-btn-arrow-left"><i class="fa-solid fa-arrow-up-right"></i></span>
                                                            <span class="theme-btn">Read More</span>
                                                            <span class="theme-btn-arrow-right"><i class="fa-solid fa-arrow-up-right"></i></span>
                                                        </a>
                                                    </div>
                                                </article>
                                            @empty
                                                <div class="gt-news-card-items-4"><div class="gt-news-content"><h2 class="news-title">No articles published yet</h2><p>New software insights and company updates will appear here soon.</p></div></div>
                                            @endforelse
                                            @if($blogs->hasPages())
                                                <div class="page-nav-wrap text-center">{{ $blogs->links() }}</div>
                                            @endif
                                            {{-- Legacy static blog cards retained for reference but disabled.
                                            <div class="gt-news-card-items-4">
                                                <div class="gt-news-image">
                                                    <img src="{{ asset('FrontendAssets/img/inner-page/blog-post-1.jpg') }}" alt="img">
                                                </div>
                                                <div class="gt-news-content">
                                                <ul class="gt-date-list">
                                                        <li>
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                            11 March 2025
                                                        </li>
                                                        <li>
                                                            <i class="fa-solid fa-comments"></i>
                                                            19 Comments
                                                        </li>
                                                </ul>
                                                <h2 class="news-title">
                                                    <a href="news-details.html">
                                                       We design digital experience that turn visitors into profitable customers.
                                                    </a>
                                                </h2>
                                                <p>
                                                    "Relive every thrilling moment from this week’s matches — from the opening kickoff to the final whistle, with expert commentary, key plays, and unforgettable highlights 
                                                </p>
                                                    <a class="theme-btn-main style-2 bg-white-style" href="news-details.html">
                                                        <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                        <span class="theme-btn"> Read More</span>
                                                        <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gt-news-card-items-4">
                                                <div class="gt-news-image">
                                                    <img src="{{ asset('FrontendAssets/img/inner-page/blog-post-2.jpg') }}" alt="img">
                                                </div>
                                                <div class="gt-news-content">
                                                <ul class="gt-date-list">
                                                        <li>
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                            11 March 2025
                                                        </li>
                                                        <li>
                                                            <i class="fa-solid fa-comments"></i>
                                                            19 Comments
                                                        </li>
                                                </ul>
                                                <h2 class="news-title">
                                                    <a href="news-details.html">
                                                  We craft digital experiences that help convert visitors into customers and growth.
                                                    </a>
                                                </h2>
                                                <p>
                                                    Follow our journey through the highs and lows of the season, capturing every victory, setback, and defining moment on the road to claiming the ultimate championship glory.
                                                </p>
                                                 <a class="theme-btn-main style-2 bg-white-style" href="news-details.html">
                                                        <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                        <span class="theme-btn"> Read More</span>
                                                        <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gt-news-card-items-4 mb-0">
                                                <div class="gt-news-image">
                                                    <img src="{{ asset('FrontendAssets/img/inner-page/blog-post-3.jpg') }}" alt="img">
                                                </div>
                                                <div class="gt-news-content">
                                                <ul class="gt-date-list">
                                                        <li>
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                            11 March 2025
                                                        </li>
                                                        <li>
                                                            <i class="fa-solid fa-comments"></i>
                                                            19 Comments
                                                        </li>
                                                </ul>
                                                 <h2 class="news-title">
                                                    <a href="news-details.html">
                                             We create digital experiences that turn visitors into paying customers.
                                                    </a>
                                                </h2>
                                                <p>
                                                    Our Youth Academy is dedicated to developing future football stars, providing top-tier coaching, essential skills, and a strong foundation to nurture talent and inspire 
                                                </p>
                                                    <a class="theme-btn-main style-2 bg-white-style" href="news-details.html">
                                                        <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                        <span class="theme-btn"> Read More</span>
                                                        <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                    </a>
                                                </div>
                                            </div>
                                           --}}
                                           <div class="page-nav-wrap text-center d-none">
                                                <ul>
                                                    <li class="active"><a class="page-numbers" href="#">01</a></li>
                                                    <li><a class="page-numbers" href="#">02</a></li>
                                                    <li><a class="page-numbers" href="#">03</a></li>
                                                    <li><a class="page-numbers" href="#"><i class="fa-solid fa-arrow-up-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <aside class="blog-dynamic-sidebar gt-main-sideber sticky-style">
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title"><h3>Search</h3></div>
                                                <div class="gt-search-widget">
                                                    <form action="{{ route('blog') }}" method="GET">
                                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search here">
                                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title"><h3>All Categories</h3></div>
                                                <ul class="gt-category-list">
                                                    @forelse($categories as $category)
                                                        <li><a href="{{ route('blog', ['category' => $category->category]) }}">{{ $category->category }}</a><span>({{ str_pad($category->total, 2, '0', STR_PAD_LEFT) }})</span></li>
                                                    @empty
                                                        <li><span>No categories yet</span></li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title"><h3>Recent Posts</h3></div>
                                                <div class="gt-recent-post-area">
                                                    @forelse($latestBlogs as $latest)
                                                        <div class="gt-recent-items">
                                                            <div class="gt-recent-thumb"><img src="{{ $latest->image ? asset('storage/' . $latest->image) : asset('FrontendAssets/img/inner-page/post-1.jpg') }}" alt="{{ $latest->title }}"></div>
                                                            <div class="gt-recent-content"><h4 class="title"><a href="{{ route('blog.detail', $latest->slug) }}">{{ $latest->title }}</a></h4><ul><li>{{ optional($latest->created_at)->format('d M Y') }}</li></ul></div>
                                                        </div>
                                                    @empty
                                                        <p>No recent posts yet.</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="gt-single-sideber-widget mb-0">
                                                <div class="gt-widget-title"><h3>Popular Tags</h3></div>
                                                <div class="tagcloud">
                                                    @forelse($tags as $tag)<a href="{{ route('blog', ['search' => $tag]) }}">{{ $tag }}</a>@empty<span>No tags yet</span>@endforelse
                                                </div>
                                            </div>
                                        </aside>
                                        <div class="gt-main-sideber sticky-style">
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title">
                                                    <h3>Search</h3>
                                                </div>
                                                <div class="gt-search-widget">
                                                    <form action="#">
                                                        <input type="text" placeholder="Search here">
                                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title">
                                                    <h3>All Categories</h3>
                                                </div>
                                                <ul class="gt-category-list">
                                                    <li><a href="news-details.html">Inspiration</a><span>(08)</span></li>
                                                    <li><a href="news-details.html">Branding </a><span>(02)</span></li>
                                                    <li><a href="news-details.html">Innovation </a><span>(10)</span></li>
                                                    <li><a href="news-details.html">Design</a><span>(15)</span></li>
                                                    <li><a href="news-details.html">Trends </a><span>(12)</span></li>
                                                </ul>
                                            </div>
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title">
                                                    <h3>Recent Post</h3>
                                                </div>
                                                <div class="gt-recent-post-area">
                                                    <div class="gt-recent-items">
                                                        <div class="gt-recent-thumb">
                                                            <img src="{{ asset('FrontendAssets/img/inner-page/post-1.jpg" alt="img">
                                                        </div>
                                                        <div class="gt-recent-content">
                                                            <h4 class="title">
                                                                <a href="news-details.html">
                                                                How great UI/UX experience drives business for more
                                                                </a>
                                                            </h4>
                                                            <ul>
                                                                <li>
                                                                    March 26, 2025
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="gt-recent-items">
                                                        <div class="gt-recent-thumb">
                                                            <img src="{{ asset('FrontendAssets/img/inner-page/post-2.jpg" alt="img">
                                                        </div>
                                                        <div class="gt-recent-content">
                                                            <h4 class="title">
                                                                <a href="news-details.html">
                                                           The role of creative agencies in scaling modern
                                                                </a>
                                                            </h4>
                                                            <ul>
                                                                <li>
                                                                    March 26, 2025
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="gt-recent-items">
                                                        <div class="gt-recent-thumb">
                                                        <img src="{{ asset('FrontendAssets/img/inner-page/post-3.jpg" alt="img">
                                                        </div>
                                                        <div class="gt-recent-content">
                                                           <h4 class="title">
                                                                <a href="news-details.html">
                                                              How strong brand identity drives long-term.
                                                                </a>
                                                            </h4>
                                                            <ul>
                                                                <li>
                                                                    March 26, 2025
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gt-single-sideber-widget mb-0">
                                                <div class="gt-widget-title">
                                                    <h3>Popular Tags</h3>
                                                </div>
                                                <div class="tagcloud">
                                                    <a href="news-details.html">Creative</a>     
                                                    <a href="news-details.html">Design</a>
                                                    <a href="news-details.html">UI-UX</a>
                                                    <a href="news-details.html">Insights</a>
                                                    <a href="news-details.html">Trends</a>
                                                    <a href="news-details.html">Inspiration</a>
                                                    <a href="news-details.html">Digital</a>
                                                    <a href="news-details.html">Growth</a>
                                                    <a href="news-details.html">Process</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                   

@endsection

@section('script')

@endsection
