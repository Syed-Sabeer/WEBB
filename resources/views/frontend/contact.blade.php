@extends('layouts.frontend.master')


@section('css')

@endsection

@section('content')


   <!-- Breadcrumb Section Start -->
                    <div class="breadcrumb-wrapper light-theme-breadcrumb bg-cover" style="background-image: url('{{ asset('FrontendAssets/img/inner-page/bread-line.png') }}');">
                        <div class="light-bg">
                            <img src="{{ asset('FrontendAssets/img/inner-page/light.png') }}" alt="img">
                        </div>
                        <div class="container">
                            <div class="page-heading mb-0">
                                <div class="breadcrumb-sub-title">
                                    <h1 class="about-page-heading-title"><span>Let’s Build Something Better  </span>
                                        Together 
                                    </h1>
                                </div>
                                <div class="breadcrumb-items">
                                    <ul>
                                        <li>
                                           <span class="about-page-heading-meta">Software solutions for  businesses</span>
                                        </li>
                                        <li>
    (&copy;2020 — {{ date('Y') }})
</li>
                                    </ul>
                                    <h2 class="title wa_title_spilt_1">
                                       Contact Avrio
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Section Start -->
                    <section class="contact-section section-padding fix">
                        <div class="container">
                            <div class="contac-us-wrapper">
                                <div class="row g-4">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="contact-us-card-item">
                                            <div class="contact-image">
                                                <img src="{{ asset('FrontendAssets/img/inner-page/contact-1.jpg') }}" alt="Canada office">
                                            </div>
                                            <div class="contact-content">
                                                <h2>Canada Office</h2>
                                                <p>349 Beechlawn Drive Waterloo<br>ON N2L 5L8, CANADA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="contact-us-card-item">
                                            <div class="contact-image">
                                                <img src="{{ asset('FrontendAssets/img/inner-page/contact-2.jpg') }}" alt="Hong Kong office">
                                            </div>
                                            <div class="contact-content">
                                                <h2>Hong Kong Office</h2>
                                                <p>Unit 1406B, Belgian Bank Building, Nathan Road,<br>Mong Kok, Kowloon, Hong Kong</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="contact-us-card-item">
                                            <div class="contact-image">
                                                <img src="{{ asset('FrontendAssets/img/inner-page/contact-3.jpg') }}" alt="Pakistan office">
                                            </div>
                                            <div class="contact-content">
                                                <h2>Pakistan Office</h2>
                                                <p>Plot No. A-26/1, Block 8, K.A.E.C.H.S,<br>Karachi - 75460, PAKISTAN</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Contact-Map Section Start -->
                    <div class="contact-map-section section-padding fix pt-0">
                        <div class="container">
                            <div class="contact-map-wrapper">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                       <div class="contact-map">
                                            <iframe class="pakistan-map" src="https://www.google.com/maps?q=Plot+No.+A-26%2F1%2C+Block+8%2C+K.A.E.C.H.S%2C+Karachi+75460%2C+Pakistan&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29332256.25226939!2d133.41701195!3d-26.1772288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sbd!4v1775899425045!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-from-box">
                                            <h2>Start your software project</h2>
                                            <form action="contact.php" id="contact-form" class="contact-form-box">
                                                <div class="row g-4 align-items-center">
                                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                                        <div class="form-clt">
                                                            <input type="text" placeholder="Full name *">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                                        <div class="form-clt">
                                                            <input type="text" placeholder="Email address *">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                                        <div class="form-clt">
                                                            <input type="text" placeholder="Phone number *">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                                        <div class="form-clt">
                                                            <div class="form">
                                                                <select class="single-select w-100">
                                                                    <option>Choose a service</option>
                                                                    <option>Web App Development</option>
                                                                    <option>Mobile App Development</option>
                                                                    <option>AI/ML Development</option>
                                                                    <option>Digital Marketing</option>
                                                                    <option>SEO &amp; Content Writing</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                                        <div class="form-clt">
                                                            <textarea name="message" placeholder="Tell us about your goals, timeline, and the software you need"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".5s">
                                                        <button type="submit" class="thems-btn w-100 wow fadeInUp" data-wow-delay=".5s">
                                                            Send message <i class="fa-solid fa-arrow-up-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


@endsection

@section('script')

@endsection
