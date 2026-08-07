@extends('layouts.frontend.master')


@section('css')
<style>
  .services-details-section { background: #fff; }.services-details-section > .light-bg,.services-details-section > .bg-line,.services-details-section > .title-area{display:none}.service-details-image{max-width:980px;margin:0 auto}.service-details-image img{width:100%;height:430px;object-fit:cover}.service-details-wrapper { padding-top:70px; }.service-details-wrapper .details-top-item { padding:38px; border:1px solid #ececec; border-radius:20px; background:#fff; box-shadow:0 12px 35px rgba(20,20,20,.06); }.service-details-wrapper h2,.service-concept-item h2,.service-visual-section h2 { color:#161616; }.service-details-wrapper p,.service-concept-item p,.service-visual-section p { color:#626262; line-height:1.75; }.details-list li { background:#f8f8f8; border-radius:10px; padding:13px 16px!important; margin-bottom:10px; color:#222; }.details-list li i { color:#cf1f42; }.service-details-image img,.service-visual-image img,.details-thumb img { border-radius:18px; }.service-concept-item { margin-top:60px; padding:42px; border-radius:20px; background:#f7f7f7; }.service-concept-box { background:#fff; border-radius:14px; padding:22px; margin-bottom:14px; border-left:4px solid #cf1f42; }.service-concept-box h3 { color:#161616; font-size:21px; }.service-visual-section { background:#fff; }.service-visual-item { background:#f8f8f8; padding:24px; border-radius:18px; height:100%; }@media(max-width:767px){.service-details-image img{height:260px}.service-concept-item{padding:24px}}
</style>

@endsection

@section('content')

<div class="breadcrumb-wrapper light-theme-breadcrumb bg-cover" style="background-image:url('{{ asset('FrontendAssets/img/inner-page/bread-line.png') }}')"><div class="light-bg"><img src="{{ asset('FrontendAssets/img/inner-page/light.png') }}" alt=""></div><div class="container"><div class="page-heading mb-0"><div class="breadcrumb-sub-title"><h1 class="rr_title_anim"><span>{{ $service['title'] }}</span> Solutions For Modern Business</h1></div>
{{-- <div class="breadcrumb-items"><ul><li>Avrio Global Services</li><li>(&copy;2015 &mdash; 2026)</li></ul>
    <h2 class="title wa_title_spilt_1">{{ $service['title'] }}</h2></div> --}}
</div></div></div>

  <!-- Service Section Start -->
                    <section class="services-details-section section-padding">
                         <div class="light-bg">
                            <img src="{{ asset('FrontendAssets/img/inner-page/light.png')}}" alt="img">
                        </div>
                        <div class="bg-line">
                            <img src="{{ asset('FrontendAssets/img/inner-page/bread-line.png')}}" alt="img">
                        </div>
                        <div class="title-area">
                            <div class="container">
                                <h1 class="text-white rr_title_anim"><span>{{ $service['title'] }}</span> {{ $service['short'] }}
                                </h1>
                            </div>
                        </div>
                        <div class="container container-1680">
                            <div class="service-details-wrapper">
                                <div class="row g-4">
                                    <div class="details-top-item">
                                        <div class="left-content">
                                            <h2>
                                                {{ $service['title'] }} <br> For Every Business
                                            </h2>
                                            <p>
                                                {{ $service['description'] }} We combine strategy, engineering, design, and measurable delivery to create solutions that support long-term growth.
                                            </p>
                                        </div>
                                        <ul class="details-list">
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                                Strategy-Driven Delivery
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                                Secure, Scalable Architecture
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                               Experienced Specialists
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-check"></i>
                                               Clear Communication & Support
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="service-details-image">
                                            <img data-speed=".8" src="{{ asset($service['image'])}}" alt="{{ $service['title'] }}">
                                        </div>
                                    </div>
                                    <div class="service-concept-item">
                                        <div class="number-list">
                                            <span class="number">01</span>
                                            <span class="number">02</span>
                                            <span class="number">03</span>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-lg-6 col-md-6">
                                            <div class="service-count-left">
                                                <h2>0<span class="count">3</span></h2>
                                                <p>Our simple comprehensive design process</p>
                                                <div class="details-thumb">
                                                    <img src="{{ asset($service['image'])}}" alt="{{ $service['title'] }}">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <h2>
                                                    From Concept To <br> Completion
                                                </h2>
                                                <div class="service-concept-box">
                                                    <h3>Discover & define</h3>
                                                    <p>
                                                        We align on your goals, user needs, technical constraints, and the success metrics that matter.
                                                    </p>
                                                </div>
                                                <div class="service-concept-box">
                                                    <h3>Design & develop</h3>
                                                    <p>
                                                        Our specialists build in focused iterations, keeping quality, security, and feedback at the center.
                                                    </p>
                                                </div>
                                                <div class="service-concept-box mb-0">
                                                    <h3>Deliver & launch</h3>
                                                    <p>
                                                        We test, deploy, and support your solution so it continues creating value after launch.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                     <!-- Service-Visual-Section Start -->
                    <section class="service-visual-section section-padding fix">
                        <div class="container container-1680">
                            <div class="section-title-4 mb-4">
                                <h2>
                                    Turning {{ $service['title'] }} Into <br> Measurable Results
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="service-visual-item">
                                        <p>
                                            Collaboration is key to our process. We work closely with clients, understanding their feedback and iterating rapidly to ensure the outcome aligns perfectly with their vision. Every design decision is deliberate, backed by research, creativity, and a deep understanding of human behavior. This approach allows us to craft solutions.
                                        </p>
                                        <div class="service-visual-image">
                                            <img data-speed=".8" src="{{ asset($service['image'])}}" alt="{{ $service['title'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="service-visual-item">
                                        <p>
                                            Collaboration is key to our process. We work closely with clients, understanding their feedback and iterating rapidly to ensure the outcome aligns perfectly with their vision. Every design decision is deliberate, backed by research, creativity, and a deep understanding of human behavior. This approach allows us to craft solutions.
                                        </p>
                                        <div class="service-visual-image">
                                            <img data-speed=".8" src="{{ asset($service['image'])}}" alt="{{ $service['title'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

           

@endsection

@section('script')

@endsection
