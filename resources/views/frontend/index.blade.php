@extends('layouts.frontend.master')


@section('css')

@endsection

@section('content')


  <!-- Hero Section Start -->
                    <section class="hero-section-4 hero-4">
                        <div class="rain front-row"></div>
                        <div class="rain back-row"></div>
                        <div class="container">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-8">
                                    <div class="hero-content">
                                        <span class="hero-sub">Avrio Global Inc</span>
                                        <h1 class="title">
                                            <b> Bridging the Gap between</b> People & Technology
                                        </h1>
                                        <p>
                                            <b>Avrio Global Inc is a creative studio based in London. We think like</b>
                                            an agency and produce like a visuals for brands & agencies.
                                        </p>
                                        <div class="hero-button">
                                            <a class="theme-btn-main style-2 bg-white-style" href="contact.html">
                                                <span class="theme-btn-arrow-left"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">let’s talk</span>
                                                <span class="theme-btn-arrow-right"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                            <a class="theme-btn-main style-2 border-style" href="project.html">
                                                <span class="theme-btn-arrow-left"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">view work</span>
                                                <span class="theme-btn-arrow-right"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="hero-image">
                                        <img src="{{ asset('FrontendAssets/img/home-4/hero-image.png')}}" alt="img" class="float-bob-y">
                                        <div class="bg-circle">
                                            <img src="{{ asset('FrontendAssets/img/home-4/bg-circle.png')}}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-animation-shape1-1 animation-infinite-test gt-line-shape-animation animation-infinite"
                            style="background-image: url('{{ asset('FrontendAssets/img/home-4/hero-shape.png') }}');"></div>
                        <div class="line-2 animation-infinite-rtl"
                            style="background-image: url('{{ asset('FrontendAssets/img/home-4/line-shape-2.png') }}');"></div>
                    </section>

                    <!-- Brand Section Start -->
                    <div class="brand-section">
                        <div class="container">
                            <h2 class="title wa_title_spilt_1">
                                The Visionaries and <span><span class="font-style">Industry Leaders</span> We’ve</span>
                                <br> Proudly Partnered.
                            </h2>
                        </div>
                        <div class="swiper brand-slider wow fadeInUp" data-wow-delay=".3s">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.jpeg')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.jpeg')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/2.avif')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/2.avif')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/3.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/3.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/4.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/4.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/5.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/5.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/6.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/6.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/7.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/7.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/8.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/8.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                  <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/9.jpg')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/9.jpg')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/10.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/10.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-box-1">
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.png')}}" alt="img">
                                        </span>
                                        <span class="brand-img-1">
                                            <img src="{{ asset('FrontendAssets/img/white-file/11.png')}}" alt="img">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Section Start -->
                    <section class="about-section section-padding pt-0">
                        <div class="container">
                            <div class="about-wrapper">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="about-image wow fadeInUp">
                                            <div class="about-circle">
                                                <img src="{{ asset('FrontendAssets/img/home-1/about-circle.png')}}" alt="img">
                                            </div>
                                            <img src="{{ asset('FrontendAssets/img/home-1/about-image.png')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="about-content">
                                            <div class="section-title mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> About us
                                                </span>
                                                <h2 class="wa_title_spilt_1">
    <span class="style-font">Building Innovative </span> Software
    Solutions
</h2>
                                            </div>
                                           <p class="text wow fadeInUp" data-wow-delay=".3s">
    We help businesses accelerate growth through innovative software
    development and smart digital solutions. Our experienced team combines
    creativity with cutting-edge technology to build secure, scalable
    applications that solve real-world challenges. From startups to
    enterprises, we transform ideas into successful digital products.
</p>
                                            <a class="theme-btn-main style-2 bg-white-style wow fadeInUp"
                                                data-wow-delay=".5s" href="about.html">
                                                <span class="theme-btn-arrow-left"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                                <span class="theme-btn">Know more us</span>
                                                <span class="theme-btn-arrow-right"> <i
                                                        class="fa-solid fa-arrow-up-right"></i> </span>
                                            </a>
                                            <div class="about-counter-items">
                                                <div class="content wow fadeInUp" data-wow-delay=".3s">
                                                    <h2>
                                                        <span class="count">100</span><span class="plus">+</span>
                                                    </h2>
                                                    <p>
                                                        Trusted Experience Built on <br class="d-block"> Successful
                                                        Projects.
                                                    </p>
                                                </div>
                                                <div class="about-small wow fadeInUp" data-wow-delay=".5s">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/about-small.jpg')}}" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif
                    </section>



                    <!-- Service Section Start -->
                    <section class="service-section-2 section-padding fix">
                        <div class="container">
                            <div class="section-title mb-0">
                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our services
                                </span>
                                <h2 class="wa_title_spilt_1">
                                    <span class="style-font">Our Creative Services</span> That Deliver <br> Innovation,
                                    <span class="style-color">& Measurable Results</span>
                                </h2>
                            </div>
                            <div class="des-portfolio-wrap">
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>001. / service</p>
                                                <h3 class="title"><a href="service-details.html">Web App Development</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + responsive web apps
                                                        </li>
                                                        <li>
                                                            + custom dashboards
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + API integrations
                                                        </li>
                                                        <li>
                                                            + scalable architecture
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    We build fast, secure web applications that turn your ideas into
                                                    reliable digital products designed to grow with your business.
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
                                                <p>002. / service</p>
                                                <h3 class="title"><a href="service-details.html">Mobile App Development</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + iOS & Android apps
                                                        </li>
                                                        <li>
                                                            + cross-platform development
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + intuitive UI/UX
                                                        </li>
                                                        <li>
                                                            + app maintenance
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    From concept to launch, we create high-performing mobile apps that
                                                    deliver seamless experiences on every device.
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
                                                <p>003. / service</p>
                                                <h3 class="title"><a href="service-details.html">AI/ML Development</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>
                                                            + machine learning models
                                                        </li>
                                                        <li>
                                                            + predictive analytics
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            + intelligent automation
                                                        </li>
                                                        <li>
                                                            + AI integrations
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Turn data into smarter decisions with practical AI and machine-learning
                                                    solutions tailored to your workflows and business goals.
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
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>004. / service</p>
                                                <h3 class="title"><a href="https://avrioglobal.io/services/digital-marketing/">Digital Marketing</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>+ SEO strategy</li>
                                                        <li>+ social media marketing</li>
                                                    </ul>
                                                    <ul>
                                                        <li>+ PPC campaigns</li>
                                                        <li>+ email marketing</li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Reach the right audience and grow your brand with measurable digital
                                                    marketing campaigns built around your business objectives.
                                                </h4>
                                                <ul class="list-items">
                                                    <li><a href="https://avrioglobal.io/services/digital-marketing/">Discover</a></li>
                                                    <li><a href="https://avrioglobal.io/services/digital-marketing/">Engage</a></li>
                                                    <li><a href="https://avrioglobal.io/services/digital-marketing/">Grow</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-01.jpg')}}" alt="Digital marketing">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-01.jpg')}}" alt="Digital marketing">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-box-items-2 des-portfolio-panel">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-content">
                                                <p>005. / service</p>
                                                <h3 class="title"><a href="https://avrioglobal.io/services/digital-marketing/">SEO &amp; Content Writing</a></h3>
                                                <div class="service-list">
                                                    <ul>
                                                        <li>+ keyword research</li>
                                                        <li>+ on-page SEO</li>
                                                    </ul>
                                                    <ul>
                                                        <li>+ website content</li>
                                                        <li>+ content strategy</li>
                                                    </ul>
                                                </div>
                                                <h4 class="title-2">
                                                    Improve search visibility and turn visitors into customers with useful,
                                                    optimized content that speaks directly to your audience.
                                                </h4>
                                                <ul class="list-items">
                                                    <li><a href="https://avrioglobal.io/services/digital-marketing/">Research</a></li>
                                                    <li><a href="https://avrioglobal.io/services/digital-marketing/">Create</a></li>
                                                    <li><a href="https://avrioglobal.io/services/digital-marketing/">Rank</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="service-thumb">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-02.jpg')}}" alt="SEO and content writing">
                                                <img src="{{ asset('FrontendAssets/img/home-2/service-02.jpg')}}" alt="SEO and content writing">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Choose Us Section Start -->
                    <section class="choose-us-section-3 fix section-padding">
                        <div class="container">
                            <div class="choose-us-wrapper-3">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="about-left-items">
                                            <div class="about-thumb fix wow fadeInUp" data-wow-delay=".3s">
                                                <img data-speed=".8" src="{{ asset('FrontendAssets/img/home-3/choose-us.jpg')}}" alt="img">
                                            </div>
                                            <div class="about-bottom-content wow fadeInUp" data-wow-delay=".5s">
                                                <div class="about-counter">
                                                    <div class="sub-text">More than</div>
                                                    <h2>
                                                        <span class="count">30</span>%
                                                    </h2>
                                                    <p>Focused on outcome</p>
                                                </div>
                                                <div class="about-line"></div>
                                                <div class="content">
                                                    <p>
                                                        We empower businesses with custom software, web, mobile, and
                                                        cloud solutions designed for efficiency and growth. By combining
                                                        cutting-edge technology with industry expertise, we deliver
                                                        exceptional results that exceed expectations.
                                                    </p>
                                                    <a class="theme-btn-main style-2 bg-white-style"
                                                        href="contact.html">
                                                        <span class="theme-btn-arrow-left"> <i
                                                                class="fa-solid fa-arrow-up-right"></i> </span>
                                                        <span class="theme-btn">Get In Touch</span>
                                                        <span class="theme-btn-arrow-right"> <i
                                                                class="fa-solid fa-arrow-up-right"></i> </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="choose-us-content">
                                            <div class="section-title mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Why choose us
                                                </span>
                                                <h2 class="wa_title_spilt_1">
                                                    <span class="style-font">From Challenge Our</span> Best
                                                    Opportunities Expertise & Real Success.
                                                </h2>
                                            </div>
                                            <div class="choose-icon-items">
                                                <div class="icon-items wow fadeInUp" data-wow-delay=".3s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/feature-icon-1.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="title">Our mission</h3>
                                                        <p>
                                                            Deliver innovative solutions that empower businesses through
                                                            technology.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="icon-items wow fadeInUp" data-wow-delay=".5s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/feature-icon-2.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="title">Our vision</h3>
                                                        <p>
                                                            Become a trusted global technology partner driving
                                                            innovation.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-4 align-items-center">
                                                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                                                    <div class="award-items-box">
                                                        <img src="{{ asset('FrontendAssets/img/white-file/award.png')}}" alt="img">
                                                        <p>
                                                            <b>20+ Awards</b> of our <br class="d-block"> Consulting
                                                            Experiences.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                                                    <div class="about-small-image">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/about-small.jpg')}}" alt="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                 <!-- Marque Section Start -->
<div class="marque-section">
    <div class="marquee">
        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>

        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>

        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>

        <div class="marquee-group">
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Software
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Innovation
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> Cloud
            </div>
            <div class="text-4">
                <img src="{{ asset('FrontendAssets/img/home-3/star.png') }}" alt="img"> AI Solutions
            </div>
        </div>
    </div>
</div>
                    <!-- Project Section Start -->
                    <section class="project-section section-padding">
                        <div class="container">
                            <div class="section-title mb-0 work-title scroll-anim">
                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Completed projects
                                </span>
                                <h2 class="work-title">
                                    <span class="jump-anim">Project</span>
                                    <span class="last style-font studio-text">Showcase</span>
                                </h2>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row design-choose-item-wrap">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="project-box-items-2 design-choose-item-1">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-01.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-01.jpg')}}" alt="img">
                                            <a href="project-details.html" class="arrow-icon">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                            </a>
                                            <div class="content-items">
                                                <div class="content">
                                                    <h3 class="title">
                                                        <a href="project-details.html">Market Expansion</a>
                                                    </h3>
                                                    <div class="tag-items">
                                                        <a href="project.html">Consulting</a>
                                                        <a href="project.html">Business</a>
                                                    </div>
                                                </div>
                                                <span class="year-text">[ 2025 ]</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="project-box-items-2 style-auto design-choose-item-2">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-02.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-02.jpg')}}" alt="img">
                                            <a href="project-details.html" class="arrow-icon">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                            </a>
                                            <div class="content-items">
                                                <div class="content">
                                                    <h3 class="title">
                                                        <a href="project-details.html">Creative Campaign</a>
                                                    </h3>
                                                    <div class="tag-items">
                                                        <a href="project.html">Consulting</a>
                                                        <a href="project.html">Business</a>
                                                    </div>
                                                </div>
                                                <span class="year-text">[ 2025 ]</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="project-box-items-2 design-choose-item-1">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-03.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-03.jpg')}}" alt="img">
                                            <a href="project-details.html" class="arrow-icon">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                            </a>
                                            <div class="content-items">
                                                <div class="content">
                                                    <h3 class="title">
                                                        <a href="project-details.html">Product Innovatio</a>
                                                    </h3>
                                                    <div class="tag-items">
                                                        <a href="project.html">Consulting</a>
                                                        <a href="project.html">Business</a>
                                                    </div>
                                                </div>
                                                <span class="year-text">[ 2025 ]</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="project-box-items-2 style-auto design-choose-item-2">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-04.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-04.jpg')}}" alt="img">
                                            <a href="project-details.html" class="arrow-icon">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                            </a>
                                            <div class="content-items">
                                                <div class="content">
                                                    <h3 class="title">
                                                        <a href="project-details.html">Brand Strategy </a>
                                                    </h3>
                                                    <div class="tag-items">
                                                        <a href="project.html">Consulting</a>
                                                        <a href="project.html">Business</a>
                                                    </div>
                                                </div>
                                                <span class="year-text">[ 2025 ]</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="project-box-items-2 design-choose-item-1">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-05.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-05.jpg')}}" alt="img">
                                            <a href="project-details.html" class="arrow-icon">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                            </a>
                                            <div class="content-items">
                                                <div class="content">
                                                    <h3 class="title">
                                                        <a href="project-details.html">Product Innovatio</a>
                                                    </h3>
                                                    <div class="tag-items">
                                                        <a href="project.html">Consulting</a>
                                                        <a href="project.html">Business</a>
                                                    </div>
                                                </div>
                                                <span class="year-text">[ 2025 ]</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="project-box-items-2 style-auto design-choose-item-2">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-06.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-2/projecr-06.jpg')}}" alt="img">
                                            <a href="project-details.html" class="arrow-icon">
                                                <i class="fa-solid fa-arrow-up-right"></i>
                                            </a>
                                            <div class="content-items">
                                                <div class="content">
                                                    <h3 class="title">
                                                        <a href="project-details.html">Brand Strategy </a>
                                                    </h3>
                                                    <div class="tag-items">
                                                        <a href="project.html">Consulting</a>
                                                        <a href="project.html">Business</a>
                                                    </div>
                                                </div>
                                                <span class="year-text">[ 2025 ]</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Work Process Section Start -->
                    <section class="work-process-section-3 fix section-padding">
                        <div class="container">
                            <div class="section-title-area">
                                <div class="section-title">
                                    <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                        <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our working process
                                    </span>
                                    <h2 class="split-title">
                                        <span class="style-font">A Streamlined Process,</span> <br> Built For Clarity,
                                        Creativity, <br> And Results
                                    </h2>
                                </div>
                                <div class="text-items wow fadeInUp" data-wow-delay=".3s">
                                    <p>
                                        See what clients worldwide are saying about our team <br> and software solutions
                                        we proudly deliver.
                                    </p>
                                </div>
                            </div>
                            <div class="work-process-wrapper-3">
                                <div class="line-1">
                                    <img src="{{ asset('FrontendAssets/img/white-file/line.png')}}" alt="img">
                                </div>
                                <div class="work-process-items-3 active wow fadeInUp">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon1.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Discover</h3>
                                        <p>Understand your business, <br>
                                            users, & goals </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".2s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon2.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Define</h3>
                                        <p>
                                            Align on strategy, structure, <br>
                                            and scope
                                        </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon3.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Design</h3>
                                        <p>
                                            Visualize the solution and bring <br>
                                            ideas to life
                                        </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".6s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon4.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Develop</h3>
                                        <p>
                                            Build high-performing <br>
                                            digital products
                                        </p>
                                    </div>
                                </div>
                                <div class="work-process-items-3 wow fadeInUp" data-wow-delay=".8s">
                                    <div class="icon">
                                        <img src="{{ asset('FrontendAssets/img/home-3/icon5.svg')}}" alt="img">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Deploy & Market</h3>
                                        <p>
                                            Launch, optimize, <br>
                                            and scale
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Choose Us Section Start -->
                    <section class="choose-us-section-33 fix section-padding section-bg">
                        <div class="container">
                            <div class="choose-us-wrapper-33">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="choose-us-content">
                                            <div class="section-title style-3 mb-0">
                                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> AI solutions
                                                </span>
                                                <h2 class="wa_title_spilt_1">
                                                    <span class="style-font">Trusted Solutions </span>For Your <br> AI
                                                    Digital Services
                                                </h2>

                                            </div>
                                            <ul class="choose-list">
                                                <li class="active wow fadeInUp" data-wow-delay=".3s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/icon5.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3>
                                                            Innovative solutions
                                                        </h3>
                                                        <p>
                                                            Our team is always available to address your concerns,
                                                            providing quick and effective solution to keep your business
                                                            expert option.
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="wow fadeInUp" data-wow-delay=".5s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/icon6.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3>
                                                            Winning expertise
                                                        </h3>
                                                        <p>
                                                            Our team is always available to address your concerns,
                                                            providing quick and effective solution to keep your business
                                                            expert option.
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="wow fadeInUp" data-wow-delay=".7s">
                                                    <div class="icon">
                                                        <img src="{{ asset('FrontendAssets/img/home-3/icon7.svg')}}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h3>
                                                            Dedicated support
                                                        </h3>
                                                        <p>
                                                            Our team is always available to address your concerns,
                                                            providing quick and effective solution to keep your business
                                                            expert option.
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="choose-us-image fix">
                                            <img data-speed=".8" src="{{ asset('FrontendAssets/img/home-3/choose-us-2.jpg')}}" alt="img">
                                            <div class="grap-shape">
                                                <img src="{{ asset('FrontendAssets/img/home-3/grap.png')}}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- Testimonial Section Start -->
                     <section class="testimonial-section-about section-padding tp-project-5-2-area bg-cover" style="background-image: url('assets/img/inner-page/testimonial-bg2.jpg');">
                        <div class="container">
                            <div class="section-title text-center tp-project-5-2-title">
                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                    <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our testimonials
                                </span>
                                <h2 class="wa_title_spilt_1">
                                    <span class="style-font">Our Valued Clients Trust Us</span> To <br>
                                    Innovative <span class="testi-iimg"><img class="img-custom-anim-left" src="{{ asset('FrontendAssets/img/home-1/client-info-2.png')}}" alt="img"></span> <span class="style-color">Solutions And <br> Outstanding Results.</span>
                                </h2>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="testimonial-box-style-5 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Rizwan Bukhari</h4>
                                                <span>BankIslami Pakistan Limited</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-box-style-5 style-2 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Ahmar Hasan</h4>
                                                <span>EFU Life Assurance Ltd.</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="testimonial-box-style-5 style-2 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Farhan Arif</h4>
                                                <span>Medics Laboratories (Pvt.) Ltd.</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial-box-style-5 style-3 bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/home-1/process-shape.png') }}');">
                                        <div class="quote-icon">
                                            <img src="{{ asset('FrontendAssets/img/home-1/quote.png')}}" alt="img">
                                        </div>
                                        <h3>
                                            “From the outset, we provid expectations and regular updates our progress. You’ll receive comprehensive reports outline. From the outset, we pro expectations and regular updates our progress.
                                        </h3>
                                        <div class="client-info-item">
                                        <div class="client-info">
                                                <h4>Daniele Cagnazzo</h4>
                                                <span>Aroundrs</span>
                                        </div>
                                        <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- News Section Start -->
                    <section class="news-section fix section-padding section-bg oit-panel-pin-area">
                        <div class="container">
                            <div class="section-title-area mb-0">
                                <div class="text-items wow fadeInUp" data-wow-delay=".3s">
                                    <p>
                                        See how Avrio Global helps businesses grow with practical software, digital
                                        experiences, and technology solutions.
                                    </p>
                                    <a href="{{ route('blog') }}" class="news-btn">
                                        <span class="text">
                                            <span class="text-default">Explore More <i
                                                    class="fa-regular fa-arrow-up-right"></i></span>
                                            <span class="text-hover">Explore More <i
                                                    class="fa-regular fa-arrow-up-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                                <div class="section-title">
                                    <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                        <img src="{{ asset('FrontendAssets/img/home-1/01.png')}}" alt="img"> Our insights
                                    </span>
                                    <h2 class="wa_title_spilt_1">
                                        <span class="style-font">Latest</span> From Avrio
                                    </h2>
                                </div>
                            </div>
                            <div class="news-box-items oit-panel-pin">
                                @forelse($latestBlogs as $blog)
                                <div class="row">
                                    <div class="col-lg-6"><div class="thumb"><img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/img/home-1/news-01.jpg') }}" alt="{{ $blog->title }}"><img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('FrontendAssets/img/home-1/news-01.jpg') }}" alt="{{ $blog->title }}"></div></div>
                                    <div class="col-lg-6"><div class="content"><h3 class="title"><a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h3><ul><li><div class="client-info"><div class="client-content"><p class="name">Avrio Global</p><p>Software insights</p></div></div></li><li><div class="news-line"></div></li><li><span>{{ $blog->category ?: 'Technology' }}</span><span class="color-2">{{ optional($blog->created_at)->format('M d, Y') }}</span></li></ul></div></div>
                                </div>
                                @empty
                                <div class="row"><div class="col-12"><p>No blog insights published yet.</p></div></div>
                                @endforelse
                            </div>
                            {{-- Legacy static news cards retained for reference. --}}
                            @if(false)
                            <div class="news-box-items oit-panel-pin">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-01.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-01.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3 class="title">
                                                <a href="news-details.html">Unlocking the future of business how smart
                                                    innovation creates lasting impact</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <div class="client-info">
                                                        <div class="client-image">
                                                            <img src="{{ asset('FrontendAssets/img/home-1/news-client-1.png')}}" alt="img">
                                                        </div>
                                                        <div class="client-content">
                                                            <p class="name">Pixelone</p>
                                                            <p>Composed by</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="news-line"></div>
                                                </li>
                                                <li>
                                                    <span>web design</span>
                                                    <span class="color-2">Aug 27, 2026</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="news-box-items oit-panel-pin">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-02.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-02.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3 class="title">
                                                <a href="news-details.html">Unlocking the future of business how smart
                                                    innovation creates lasting impact</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <div class="client-info">
                                                        <div class="client-image">
                                                            <img src="{{ asset('FrontendAssets/img/home-1/news-client-2.png')}}" alt="img">
                                                        </div>
                                                        <div class="client-content">
                                                            <p class="name">Pixelone</p>
                                                            <p>Composed by</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="news-line"></div>
                                                </li>
                                                <li>
                                                    <span>web design</span>
                                                    <span class="color-2">Aug 27, 2026</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="news-box-items oit-panel-pin">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="thumb">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-03.jpg')}}" alt="img">
                                            <img src="{{ asset('FrontendAssets/img/home-1/news-03.jpg')}}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <h3 class="title">
                                                <a href="news-details.html">Unlocking the future of business how smart
                                                    innovation creates lasting impact</a>
                                            </h3>
                                            <ul>
                                                <li>
                                                    <div class="client-info">
                                                        <div class="client-image">
                                                            <img src="{{ asset('FrontendAssets/img/home-1/news-client-3.png')}}" alt="img">
                                                        </div>
                                                        <div class="client-content">
                                                            <p class="name">Pixelone</p>
                                                            <p>Composed by</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="news-line"></div>
                                                </li>
                                                <li>
                                                    <span>web design</span>
                                                    <span class="color-2">Aug 27, 2026</span>
                                                </li>
                                             </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </section>

@endsection

@section('script')

@endsection
