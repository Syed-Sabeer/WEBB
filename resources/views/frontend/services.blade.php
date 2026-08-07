@extends('layouts.frontend.master')


@section('css')
<style>
  .service-catalog-grid { --accent: #cf1f42; }
  .service-catalog-grid .avrio-service-card { height: 100%; display: flex; flex-direction: column; overflow: hidden; background: #fff; border: 1px solid #ececec; border-radius: 20px; box-shadow: 0 10px 30px rgba(14, 14, 14, .06); transition: transform .3s ease, box-shadow .3s ease; }
  .service-catalog-grid .avrio-service-card:hover { transform: translateY(-7px); box-shadow: 0 20px 38px rgba(14, 14, 14, .13); }
  .avrio-service-card .service-thumb { height: 230px; overflow: hidden; }
  .avrio-service-card .service-thumb img { width: 100%; height: 100%; display: block; object-fit: cover; transition: transform .45s ease; }
  .avrio-service-card:hover .service-thumb img { transform: scale(1.06); }
  .avrio-service-card .service-content { padding: 26px 28px 28px; display: flex; flex: 1; flex-direction: column; }
  .avrio-service-card .service-number { color: var(--accent); font-size: 13px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; margin-bottom: 12px; }
  .avrio-service-card .title { font-size: 24px; line-height: 1.18; margin: 0 0 14px; }
  .avrio-service-card .title a { color: #151515; }
  .avrio-service-card .title a:hover { color: var(--accent); }
  .avrio-service-card .service-summary { color: #666; font-size: 15px; line-height: 1.65; margin: 0 0 22px; }
  .avrio-service-card .service-link { margin-top: auto; display: inline-flex; align-items: center; gap: 8px; color: #151515; font-weight: 700; text-transform: uppercase; font-size: 13px; letter-spacing: .05em; }
  .avrio-service-card .service-link i { color: var(--accent); font-size: 16px; transition: transform .25s ease; }
  .avrio-service-card .service-link:hover i { transform: translate(3px, -3px); }
  @media (max-width: 575px) { .avrio-service-card .service-thumb { height: 200px; } .avrio-service-card .service-content { padding: 22px; } }
</style>

@endsection

@section('content')

     <!-- Breadcrumb Section Start -->
                    <div class="breadcrumb-wrapper light-theme-breadcrumb bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/inner-page/bread-line.png') }}');">
                        <div class="light-bg">
                            <img src="{{ asset('FrontendAssets/img/inner-page/light.png')}}" alt="img">
                        </div>
                        <div class="container">
                            <div class="page-heading">
                                <div class="breadcrumb-sub-title">
                                    <h1 class="rr_title_anim"><span>Software Services</span> Built Around Your Business Goals
                                    </h1>
                                </div>
                                <div class="breadcrumb-items">
                                    <ul>
                                        <li>
                                           12+ years of experience
                                        </li>
                                        <li>
                                            (©2015 — 2026)
                                        </li>
                                    </ul>
                                    <h2 class="title wa_title_spilt_1">
                                        Our service
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- About Section Start -->
                    <section class="about-section-2 fix section-padding pt-0">
                        <div class="container">
                            <div class="about-wrapper-2">
                                <div class="about-video-banner mt-0 fix wow fadeInUp" data-wow-delay=".7s">
                                    <img data-speed=".8" src="{{ asset('FrontendAssets/img/home-2/about-video-banner.jpg')}}" alt="img">
                                    <div class="video-circle">
                                            <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn ripple video-popup">
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                            <div class="text-circle">
                                                <img src="{{ asset('FrontendAssets/img/home-2/video-text.png')}}" alt="img">
                                            </div>
                                    </div>
                                    <div class="incrase-box float-bob-y">
                                        <span>Business Increase</span>
                                        <p>3X</p>
                                    </div>
                                </div>
                            </div>
                            <div class="counter-wrapper section-padding pb-0">
    
                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".2s">
                                    <span class="text">Completed Projects</span>
                                    <h2><span class="count">100</span>+</h2>
                                    <p>
                                        We provide innovative and reliable solutions.
                                    </p>
                                </div>

                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".4s">
                                    <span class="text">Total Team Members</span>
                                    <h2><span class="count">50</span>+</h2>
                                    <p>
                                       We provide innovative and reliable solutions.
                                    </p>
                                </div>

                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".6s">
                                    <span class="text">Success Ratio</span>
                                    <h2><span class="count">99</span>%</h2>
                                    <p>
                                        We provide innovative and reliable solutions.
                                    </p>
                                </div>

                                <div class="counter-box service-box-1 mt-0 wow fadeInUp" data-wow-delay=".8s">
                                    <span class="text">Awards Winning</span>
                                    <h2><span class="count">5</span>+</h2>
                                    <p>
                                       We provide innovative and reliable solutions.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </section>

                    <div class="sec-line-shape">
                        <img src="{{ asset('FrontendAssets/img/home-1/line-shape.png')}}" alt="img">
                    </div>

                    <!-- Service Section Start -->
                    <section class="service-section-2 pt-5 mt-3 section-padding fix">
                        <div class="container">
                            <div class="row g-4 service-catalog-grid mb-5">
                            @foreach($services as $service)
                              <div class="col-xl-4 col-md-6"><article class="avrio-service-card"><a class="service-thumb" href="{{ route('service.detail', $service['slug']) }}"><img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}"></a><div class="service-content"><p class="service-number">{{ $service['number'] }} / Service</p><h3 class="title"><a href="{{ route('service.detail', $service['slug']) }}">{{ $service['title'] }}</a></h3><p class="service-summary">{{ $service['short'] }}</p><a class="service-link" href="{{ route('service.detail', $service['slug']) }}">Explore service <i class="fa-solid fa-arrow-up-right"></i></a></div></article></div>
                            @endforeach
                            </div>
                            @if(false)
                            <div class="legacy-service-catalog">
                            <div class="des-portfolio-wrap">
                                <div class="service-box-items-2 pt-0 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>001.  /  service</p>
                                                <h3 class="title"><a href="service-details.html">Strategic business
                                                planning</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + product design
                                                        </li>
                                                        <li>
                                                            + Motion Graphics
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + brand design
                                                        </li>
                                                        <li>
                                                            + Web Development
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Provide data-driven stratege help companies identifies opportunities, reduce risk and achieve long term of our growth. Provide driven on strategie.
                                                </h4>
                                                <ul class="list-items">
                                                    <li>
                                                        <a href="service.html">Plan</a>
                                                    </li>
                                                    <li>
                                                        <a href="service.html">Execute</a>
                                                    </li>
                                                    <li>
                                                        <a href="service.html">Succeed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-01.jpg')}}" alt="img">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-01.jpg')}}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>002.  /  service</p>
                                                <h3 class="title"><a href="service-details.html">Digital Marketing & Brand Strategy</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + product design
                                                        </li>
                                                        <li>
                                                            + Motion Graphics
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + brand design
                                                        </li>
                                                        <li>
                                                            + Web Development
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Provide data-driven stratege help companies identifies opportunities, reduce risk and achieve long term of our growth. Provide driven on strategie.
                                                </h4>
                                                <ul class="list-items">
                                                    <li>
                                                        <a href="service.html">Plan</a>
                                                    </li>
                                                    <li>
                                                        <a href="service.html">Execute</a>
                                                    </li>
                                                    <li>
                                                        <a href="service.html">Succeed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-02.jpg')}}" alt="img">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-02.jpg')}}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>003.  /  service</p>
                                                <h3 class="title"><a href="service-details.html">Web Development & UI/UX Design</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + product design
                                                        </li>
                                                        <li>
                                                            + Motion Graphics
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + brand design
                                                        </li>
                                                        <li>
                                                            + Web Development
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Provide data-driven stratege help companies identifies opportunities, reduce risk and achieve long term of our growth. Provide driven on strategie.
                                                </h4>
                                                <ul class="list-items">
                                                    <li>
                                                        <a href="service.html">Plan</a>
                                                    </li>
                                                    <li>
                                                        <a href="service.html">Execute</a>
                                                    </li>
                                                    <li>
                                                        <a href="service.html">Succeed</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-03.jpg')}}" alt="img">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-03.jpg')}}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                            @endif
                        </div>
                    </section>

              

                    <!-- Faq Section Start -->
                    <section class="faq-section-2 fix section-padding">
                        <div class="container">
                            <div class="faq-wrapper-2">
                                <div class="row g-4">
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="faq-content">
                                            <div class="section-title mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img">Faq
                                                </span>
                                                <h2 class="rr_title_anim">
                                                    <span class="style-font">Frequently</span> Ask Questions
                                                </h2>
                                            </div>   
                                            <p class="text wow fadeInUp" data-wow-delay=".3s">
                                                We are a results-driven IT consulting team helping businesses unlock efficiency.
                                            </p>
                                            <a href="contact.html" class="news-btn wow fadeInUp" data-wow-delay=".5s">
                                            <span class="text">
                                                <span class="text-default">Contact us  <i class="fa-regular fa-arrow-up-right"></i></span>
                                                <span class="text-hover">Contact us  <i class="fa-regular fa-arrow-up-right"></i></span>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8">
                                        <ul class="accordion-box wow fadeInUp" data-wow-delay=".3s">
                                            <!--Block-->
                                            <li class="accordion block active-block">
                                                <div class="acc-btn active">
                                                   1.  What services does an IT solutions company provide?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content current">
                                                    <div class="content">
                                                        <div class="text">
                                                            IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   2. Why does my business need IT support?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                           IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                             <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   3. How can IT solutions improve my business productivity?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                           IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   4. What is cloud computing, and how can it help my business?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                            IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!--Block-->
                                            <li class="accordion block">
                                                <div class="acc-btn active">
                                                   5. How do you protect my business from cyber threats?
                                                    <div class="icon fa-regular fa-plus"></div>
                                                </div>
                                                <div class="acc-content">
                                                    <div class="content">
                                                        <div class="text">
                                                            IT solution companies offer services like software development, website design, cloud solutions, cybersecurity, IT consulting, network setup, server management, and ongoing technical support. IT solution companies offer services like software development, website design, cloud solutions, cybersecurity.
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                    </section>

                    <div class="sec-line-shape">
                        <img src="{{ asset('FrontendAssets/img/home-1/line-shape.png')}}" alt="img">
                    </div>

              


@endsection

@section('script')

@endsection
