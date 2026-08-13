@extends('layouts.frontend.master')


@section('css')
<style>
  .services-details-section { background: #fff; }.services-details-section > .light-bg,.services-details-section > .bg-line,.services-details-section > .title-area{display:none}.service-details-wrapper { padding-top:70px; }.service-details-wrapper .details-top-item { min-height:430px; padding:38px; border:1px solid #ececec; border-radius:20px; background:#fff; box-shadow:0 12px 35px rgba(20,20,20,.06); display:flex!important; flex-direction:column!important; justify-content:center; }.service-details-wrapper .details-top-item .left-content{width:100%;max-width:none}.service-details-wrapper .details-top-item h2{font-size:clamp(32px,3vw,48px);line-height:1.12;margin-bottom:18px}.service-details-wrapper .detail-hero-image{display:flex;align-items:stretch}.service-details-wrapper .service-details-image{width:100%;height:100%;margin:0}.service-details-wrapper .service-details-image img{width:100%!important;height:430px!important;min-height:0!important;object-fit:cover;border-radius:20px;box-shadow:0 12px 35px rgba(20,20,20,.1)}.service-details-wrapper h2,.service-concept-item h2,.service-visual-section h2 { color:#161616; }.service-details-wrapper p,.service-concept-item p,.service-visual-section p { color:#626262;line-height:1.7 }.service-details-wrapper .details-list{display:grid!important;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;width:100%;margin:20px 0 0!important}.service-details-wrapper .details-list li { background:#f8f8f8; border-radius:10px; padding:12px 14px!important; margin:0!important; color:#222; font-size:14px; }.details-list li i { color:#cf1f42; }.service-visual-image img,.details-thumb img { border-radius:18px; }.service-concept-item { margin-top:60px; padding:42px; border-radius:20px; background:#f7f7f7; }.service-concept-box { background:#fff; border-radius:14px; padding:22px; margin-bottom:14px; border-left:4px solid #cf1f42; }.service-concept-box h3 { color:#161616; font-size:21px; }.service-visual-section { background:#fff; }.service-visual-item { background:#f8f8f8; padding:24px; border-radius:18px; height:100%; }@media(max-width:991px){.service-details-wrapper .details-top-item{min-height:auto}.service-details-wrapper .service-details-image img{height:350px!important}}@media(max-width:767px){.service-details-wrapper .details-top-item,.service-concept-item{padding:24px}.service-details-wrapper .details-list{grid-template-columns:1fr}.service-details-wrapper .service-details-image img{height:260px!important}}
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
                                <div class="row g-4 align-items-stretch">
                                    <div class="details-top-item col-lg-6">
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




                                    
                                    <div class="col-lg-6 detail-hero-image">
                                        <div class="service-details-image">
                                            <img data-speed=".8" src="{{ asset($service['image'])}}" alt="{{ $service['title'] }}">
                                        </div>
                                    </div>



   <!-- Powerful Feature Section Start -->
                    <section class="powerful-feature-section section-bg fix section-padding">
                        <div class="container">
                            <div class="section-title text-center">
                                <span class="sub-title tz-sub-tilte tz-sub-anim tx-subTitle">
                                    <img src="assets/img/home-1/01.png" alt="img"> Powerful features integrations
                                </span>
                                    <h2 class="wa_title_spilt_1">
                                    <span class="style-font">Delivering Innovative </span> IT Solutions That Empower In Businesses To
                                    <span class="style-color">Grow For Connect And Succeed In The Digital Era And Unwavering.</span>
                                </h2>
                            </div>
                        </div>
                        <div class="powerful-marque-section">
                            <div class="marquee">
                                <div class="marquee-group">
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature1.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature2.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature3.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature4.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature5.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature6.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature7.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature8.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature9.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature10.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature11.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature12.png" alt="">
                                    </div>
                                </div>
                                 <div class="marquee-group">
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature1.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature2.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature3.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature4.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature5.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature6.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature7.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature8.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature9.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature10.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature11.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature12.png" alt="">
                                    </div>
                                </div>
                                 <div class="marquee-group">
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature1.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature2.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature3.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature4.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature5.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature6.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature7.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature8.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature9.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature10.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature11.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature12.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="marquee marquee-2">
                                <div class="marquee-group">
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature1.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature2.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature3.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature4.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature5.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature6.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature7.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature8.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature9.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature10.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature11.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature12.png" alt="">
                                    </div>
                                </div>
                                 <div class="marquee-group">
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature1.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature2.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature3.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature4.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature5.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature6.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature7.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature8.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature9.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature10.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature11.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature12.png" alt="">
                                    </div>
                                </div>
                                 <div class="marquee-group">
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature1.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature2.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature3.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature4.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature5.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature6.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature7.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature8.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature9.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature10.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature11.png" alt="">
                                    </div>
                                    <div class="icon-box">
                                        <img src="assets/img/home-3/feature12.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


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
               
                

           

@endsection

@section('script')

@endsection
