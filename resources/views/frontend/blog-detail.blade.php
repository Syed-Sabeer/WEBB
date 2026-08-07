@extends('layouts.frontend.master')


@section('css')
<style>
  .blog-detail-content img { max-width: 100%; height: auto; }
  .blog-post-details .comments-area, .blog-post-details .comment-form-wrap { display: none; }
  .blog-detail-sidebar-legacy { display: none; }
  .blog-detail-sidebar-dynamic .gt-single-sideber-widget { background: #fff; border: 1px solid #e8e8e8; border-radius: 16px; padding: 28px; margin-bottom: 26px; box-shadow: 0 8px 24px rgba(20,20,20,.06); }
  .blog-detail-sidebar-dynamic .gt-widget-title h3, .blog-detail-sidebar-dynamic .gt-category-list a, .blog-detail-sidebar-dynamic .gt-category-list span, .blog-detail-sidebar-dynamic .gt-recent-content .title a { color: #171717; }
  .blog-detail-sidebar-dynamic .gt-recent-content ul li, .blog-detail-sidebar-dynamic .gt-single-sideber-widget p { color: #777; }
  .blog-detail-sidebar-dynamic .gt-search-widget input { color: #171717; background: #fff; border-color: #dedede; }
  .blog-detail-sidebar-dynamic .gt-search-widget input::placeholder { color: #8b8b8b; }
  .blog-detail-sidebar-dynamic .gt-category-list li { border-color: #e2e2e2; }
  .blog-detail-sidebar-dynamic .tagcloud a { color: #171717; border-color: #dedede; }
</style>
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
                                    @php
    $words = explode(' ', trim($blog->title));
    $firstTwo = implode(' ', array_slice($words, 0, 2));
    $remaining = implode(' ', array_slice($words, 2));
@endphp

<h2 class="about-page-heading-title">
    <span>{{ $firstTwo }}</span>
    {{ $remaining }}
</h2>
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
                                    <h1 class="title wa_title_spilt_1">
                                     Avrio Insights
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                       <!-- GT News-standard Section Start -->
                <section class="news-standard-section section-padding">
                    <div class="container">
                        <div class="news-details-area">
                            <div class="row g-4">
                                <div class="col-12 col-lg-8">
                                    <div class="blog-post-details">
                                        <div class="single-blog-post">
                                            <div class="post-featured-thumb fix">
                                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/img/inner-page/blog-post-4.jpg') }}" alt="{{ $blog->title }}">
                                            </div>
                                            <div class="post-content">
                                                <ul class="post-list d-flex align-items-center">
                                                    <li>
                                                        <i class="fa-regular fa-user"></i>
                                                        By Avrio Global
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        {{ optional($blog->created_at)->format('d M, Y') }}
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-tag"></i>
                                                       {{ $blog->category ?: 'Software Insights' }}
                                                    </li>
                                                </ul>
                                                <h2>{{ $blog->title }}</h2>
                                                <div class="blog-detail-content">{!! $blog->content !!}</div>
                                                {{-- Legacy placeholder detail content disabled.
                                                <p class="mb-3">
                                                   Stories of hope are born when compassion meets action. In communities facing poverty, illness, and uncertainty, small acts of support can create life-changing results. Every family we serve carries a journey of struggle and strength, and each story reminds us why our mission matters. From parents who worried about their children’s next meal to students who dreamed of education but lacked resources, these challenges are real and deeply personal. Through consistent care, emergency assistance.
                                                </p>
                                                <p class="mb-3">
                                                   Families who once depended on aid are now rebuilding their lives with confidence and dignity. Children who missed school due to hunger or sickness are returning to classrooms with renewed energy and purpose. These stories are not only about receiving help; they are about regaining hope, restoring self-worth, and believing in a better future. Our work goes beyond focusing on long-term impact.
                                                </p>
                                                <p>
                                                   Families who once depended on aid are now rebuilding their lives with confidence and dignity. Children who missed school due to hunger or sickness are returning to classrooms with renewed energy and purpose. These stories are not only about receiving help; they are about regaining hope.
                                                </p>
                                                <div class="hilight-text mt-4 mb-4">
                                                    <p>Pellentesque sollicitudin congue dolor non aliquam. Morbi volutpat, nisi vel
                                                        ultricies urnacondimentum, sapien neque
                                                        lobortis tortor, quis efficitur mi ipsum eu metus. Praesent eleifend orci sit
                                                        amet
                                                        est vehicula.</p>
                                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 20.3698H7.71428L2.57139 30.5546H10.2857L15.4286 20.3698V5.09247H0V20.3698Z" fill="#fff"></path>
                                                            <path d="M20.5703 5.09247V20.3698H28.2846L23.1417 30.5546H30.856L35.9989 20.3698V5.09247H20.5703Z" fill="#fff"></path>
                                                        </svg>
                                                </div>
                                                <p class="mt-4 mb-5">
                                                    Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante fermentum sit amet. Pellentesque commodo lacus at sodales sodales. Quisque sagittis orci ut diam condimentum, vel euismod erat placerat. In iaculis arcu eros.
                                                </p>
                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="details-image">
                                                            <img src="{{ asset('FrontendAssets/img/inner-page/blog-post-5.jpg') }}" alt="img">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="details-image">
                                                           <img src="{{ asset('FrontendAssets/img/inner-page/blog-post-6.jpg') }}" alt="img">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <p class="pt-5">
                                                    Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and dolor in reprehenderit.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore of magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea dolor commodo consequat. Duis aute irure and dolor in reprehenderit.
                                                </p>
                                                --}}
                                            </div>
                                        </div>
                                        <div class="row tag-share-wrap mt-4 mb-5">
                                            <div class="col-lg-8 col-12">
                                                <div class="tagcloud">                                   
                                                    @foreach(collect(preg_split('/[,#]+/', $blog->tags ?? ''))->map(fn($tag) => trim($tag))->filter() as $tag)
                                                        <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}">{{ $tag }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                                <div class="social-share">
                                                    <span class="me-3">Share:</span>
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comments-area">
                                            <div class="comments-heading">
                                                <h3>02 Comments</h3>
                                            </div>
                                            <div class="blog-single-comment d-flex gap-4 pt-4 pb-5">
                                                <div class="image">
                                                    <img src="{{ asset('FrontendAssets/img/inner-page/post-comment.png') }}" alt="image">
                                                </div>
                                                <div class="content">
                                                    <div class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                        <div class="con">
                                                            <h4><a href="news-details.html">Shikhon Islam</a></h4>
                                                            <span>March 20, 2024 at 2:37 pm</span>
                                                        </div>
                                                        <div class="star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="mt-30 mb-4">Neque porro est qui dolorem ipsum quia quaed inventor
                                                        veritatis et quasi
                                                        architecto var sed efficitur turpis gilla sed
                                                        sit amet finibus eros. Lorem Ipsum is simply dummy</p>
                                                    <a href="news-details.html" class="reply">Reply</a>
                                                </div>
                                            </div>
                                            <div class="blog-single-comment bb-none d-flex gap-4 pt-5">
                                                <div class="image">
                                                    <img src="{{ asset('FrontendAssets/img/inner-page/post-comment-2.png') }}" alt="image">
                                                </div>
                                                <div class="content">
                                                    <div class="head d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                                        <div class="con">
                                                            <h4><a href="news-details.html">Alex Flores</a></h4>
                                                            <span>March 20, 2024 at 2:37 pm</span>
                                                        </div>
                                                        <div class="star">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="mt-30 mb-4">Neque porro est qui dolorem ipsum quia quaed inventor
                                                        veritatis et quasi
                                                        architecto var sed efficitur turpis gilla sed
                                                        sit amet finibus eros. Lorem Ipsum is simply dummy</p>
                                                    <a href="news-details.html" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-form-wrap">
                                            <h3>Leave a Comments</h3>
                                            <form action="#" id="contact-form" method="POST">
                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-clt">
                                                            <input type="text" name="name" id="name" placeholder="Your Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-clt">
                                                            <input type="text" name="email" id="email2" placeholder="Your Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-clt">
                                                            <textarea name="message" id="message" placeholder="Write Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button class="theme-btn-main style-2" type="submit">
                                                            <span class="theme-btn-arrow-left"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                            <span class="theme-btn"> post comment</span>
                                                            <span class="theme-btn-arrow-right"> <i class="fa-solid fa-arrow-up-right"></i> </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                   <div class="blog-detail-sidebar-dynamic gt-main-sideber sticky-style">
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
                                              @forelse($latestBlogs as $recent)
                                                  <div class="gt-recent-items">
                                                      <div class="gt-recent-thumb"><img src="{{ $recent->image ? asset('storage/' . $recent->image) : asset('FrontendAssets/img/inner-page/post-1.jpg') }}" alt="{{ $recent->title }}"></div>
                                                      <div class="gt-recent-content"><h4 class="title"><a href="{{ route('blog.detail', $recent->slug) }}">{{ $recent->title }}</a></h4><ul><li>{{ optional($recent->created_at)->format('M d, Y') }}</li></ul></div>
                                                  </div>
                                              @empty
                                                  <p>No recent posts yet.</p>
                                              @endforelse
                                          </div>
                                      </div>
                                      <div class="gt-single-sideber-widget mb-0">
                                          <div class="gt-widget-title"><h3>Popular Tags</h3></div>
                                          <div class="tagcloud">
                                              @forelse($tags as $tag)<a href="{{ route('blog', ['search' => $tag]) }}">{{ $tag }}</a>@empty
                                                  <span class="text-muted">No tags yet.</span>
                                              @endforelse
                                          </div>
                                      </div>
                                   </div>
                                   <div class="blog-detail-sidebar-legacy gt-main-sideber sticky-style">
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
                                                    @foreach($categories as $category)
                                                        <li><a href="{{ route('blog', ['category' => $category->category]) }}">{{ $category->category }}</a><span>({{ str_pad($category->total, 2, '0', STR_PAD_LEFT) }})</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="gt-single-sideber-widget">
                                                <div class="gt-widget-title">
                                                    <h3>Recent Post</h3>
                                                </div>
                                                <div class="gt-recent-post-area">
                                                    <div class="gt-recent-items">
                                                        <div class="gt-recent-thumb">
                                                            <img src="{{ asset('FrontendAssets/img/inner-page/post-1.jpg') }}" alt="img">
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
                                                            <img src="{{ asset('FrontendAssets/img/inner-page/post-2.jpg') }}" alt="img">
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
                                                        <img src="{{ asset('FrontendAssets/img/inner-page/post-3.jpg') }}" alt="img">
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
