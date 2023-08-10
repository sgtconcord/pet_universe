@extends('layouts.site')
@section('stylesheet')

@endsection

@section('content')


    
<!-- Breadcrumb Area Start -->
<div class="section breadcrumb-area bg-bright">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-wrapper">
                    <h2 class="breadcrumb-title">About Us</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- About Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row mb-n6">
            <div class="col-md-6 pe-lg-9 pe-3 mb-6" data-aos="fade-up" data-aos-duration="1000">
                <!-- About Thumb Start -->
                <div class="about-thumb">
                    <img class="fit-image" src="{{asset('assets/site/images/about/1.png')}}" alt="About Image">
                </div>
                <!-- About Thumb End -->
            </div>
            <div class="col-md-6 align-self-center mb-6" data-aos="fade-up" data-aos-duration="1500">
                <!-- About Content Start -->
                <div class="about-content">
                    <h2 class="title">About Amber</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipis elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua. Ut enim ad minim quis nostrud exercitat ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <ul class="about-content-list">
                        <li><span><i class="ti-angle-double-right"></i></span> There are many variation passages</li>
                        <li><span><i class="ti-angle-double-right"></i></span> Contrary to popular belief not simply</li>
                        <li><span><i class="ti-angle-double-right"></i></span> But I must explain to you how all this</li>
                    </ul>
                    <a href="tel:+01701747787" class="btn btn-primary btn-hover-dark">Contact Us</a>
                </div>
                <!-- About Content End -->
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Testimonial Section Start -->
<div class="section bg-bright section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Testimonial Carousel Start -->
                <div class="testimonial-carousel">

                    <!-- Testimonial Gallery Top Start -->
                    <div class="swiper-container testimonial-gallery-top" data-aos="fade-up" data-aos-duration="1000">
                        <div class="swiper-wrapper">

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">

                                <!-- Testimonial Content Start -->
                                <div class="testimonial-content text-center">
                                    <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                                </div>
                                <!-- Testimonial Content End -->

                            </div>
                            <!-- Single Swiper Slide End -->

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">

                                <!-- Testimonial Content Start -->
                                <div class="testimonial-content text-center">
                                    <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
                                </div>
                                <!-- Testimonial Content End -->

                            </div>
                            <!-- Single Swiper Slide End -->
                        </div>

                    </div>
                    <!-- Testimonial Gallery Top End -->

                    <!-- Testimonial Gallery Thumb Start -->
                    <div class="swiper-container testimonial-gallery-thumbs" data-aos="fade-up" data-aos-duration="1500">
                        <div class="swiper-wrapper">

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">
                                <!-- Testimonial Thumb Start -->
                                <div class="testimonial-thumb text-center">
                                    <img src="{{asset('assets/site/images/testimonial/1.png')}}" alt="Testimonial Image">
                                    <h3 class="thumb-title">Jonathon Jhon</h3>
                                    <h6 class="thumb-subtitle">Customer</h6>
                                </div>
                                <!-- Testimonial Thumb End -->
                            </div>
                            <!-- Single Swiper Slide End -->

                            <!-- Single Swiper Slide Start -->
                            <div class="swiper-slide">
                                <!-- Testimonial Thumb Start -->
                                <div class="testimonial-thumb text-center">
                                    <img src="{{asset('assets/site/images/testimonial/2.png')}}" alt="Testimonial Image">
                                    <h3 class="thumb-title">Cristal Jerry</h3>
                                    <h6 class="thumb-subtitle">Customer</h6>
                                </div>
                                <!-- Testimonial Thumb End -->
                            </div>
                            <!-- Single Swiper Slide End -->

                        </div>

                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- Testimonial Gallery Thumb End -->

                </div>
                <!-- Testimonial Carousel End -->

            </div>
        </div>
    </div>
</div>
<!-- Testimonial Section End -->


<!-- About Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row mb-n6">
          
            <div class="col-md-6 align-self-center mb-6" data-aos="fade-up" data-aos-duration="1500">
                <!-- About Content Start -->
                <div class="about-content">
                    <h2 class="title">About Health Care</h2>
                    <p>To get professional veterinary service for your pet, We are here for your help</p>
                    <ul class="about-content-list">
                        <li><span><i class="ti-angle-double-right"></i></span> Medical Treatment</li>
                        <li><span><i class="ti-angle-double-right"></i></span> Health care chart</li>
                        <li><span><i class="ti-angle-double-right"></i></span> Vitamins for all pets</li>
                    </ul>
                    <a href="tel:+01701747787" class="btn btn-primary btn-hover-dark">Contact Us</a>
                </div>
                <!-- About Content End -->
            </div>


            <div class="col-md-6 pe-lg-9 pe-3 mb-6" data-aos="fade-up" data-aos-duration="1000">
                <!-- About Thumb Start -->
                <div class="about-thumb">
                    <img class="fit-image" src="{{asset('assets/site/images/about/1.png')}}" alt="About Image">
                </div>
                <!-- About Thumb End -->
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Team section Start -->
<div class="section section-margin" style="text-align: center">
    <div class="container">
        <div class="row mb-n6">
        {{--  <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1 mb-n6">  --}}

            <div class="col mb-6" data-aos="fade-up" data-aos-duration="1000">
                <!-- Single Team Wrapper Start -->
                <div class="single-team-wrapper">
                    <div class="thumb">
                        <a href="contact.html">
                            <img class="fit-image" src="{{asset('assets/site/images/team/1.jpg')}}" alt="Team Image">
                        </a>
                        <!-- Social Shear Start -->
                        <div class="social-share">
                            <a title="Twitter" href="#/"><i class="ti-facebook"></i></a>
                            <a title="Instagram" href="#/"><i class="ti-pinterest"></i></a>
                            <a title="Linkedin" href="#/"><i class="ti-twitter-alt"></i></a>
                            <a title="Skype" href="#/"><i class="ti-instagram"></i></a>
                        </div>
                        <!-- Social Shear End -->
                    </div>
                    <div class="content">
                        <h4 class="title">Cristal Mile</h4>
                        <h4 class="subtitle">Customer</h4>
                    </div>
                </div>
                <!-- Single Team Wrapper End -->
            </div>

            <div class="col mb-6" data-aos="fade-up" data-aos-duration="1500">
                <!-- Single Team Wrapper Start -->
                <div class="single-team-wrapper">
                    <div class="thumb">
                        <a href="contact.html">
                            <img class="fit-image" src="{{asset('assets/site/images/team/2.jpg')}}" alt="Team Image">
                        </a>
                        <!-- Social Shear Start -->
                        <div class="social-share">
                            <a title="Twitter" href="www.facebook.com"><i class="ti-facebook"></i></a>
                            <a title="Instagram" href="#/"><i class="ti-pinterest"></i></a>
                            <a title="Linkedin" href="#/"><i class="ti-twitter-alt"></i></a>
                            <a title="Skype" href="#/"><i class="ti-instagram"></i></a>
                        </div>
                        <!-- Social Shear End -->
                    </div>
                    <div class="content">
                        <h4 class="title">Jems Prince</h4>
                        <h4 class="subtitle">CEO</h4>
                    </div>
                </div>
                <!-- Single Team Wrapper End -->
            </div>

            {{--  <div class="col mb-6" data-aos="fade-up" data-aos-duration="2000">
                <!-- Single Team Wrapper Start -->
                <div class="single-team-wrapper">
                    <div class="thumb">
                        <a href="contact.html">
                            <img class="fit-image" src="{{asset('assets/site/images/team/3.jpg')}}" alt="Team Image">
                        </a>
                        <!-- Social Shear Start -->
                        <div class="social-share">
                            <a title="Twitter" href="#/"><i class="ti-facebook"></i></a>
                            <a title="Instagram" href="#/"><i class="ti-pinterest"></i></a>
                            <a title="Linkedin" href="#/"><i class="ti-twitter-alt"></i></a>
                            <a title="Skype" href="#/"><i class="ti-instagram"></i></a>
                        </div>
                        <!-- Social Shear End -->
                    </div>
                    <div class="content">
                        <h4 class="title">Prety Pairy</h4>
                        <h4 class="subtitle">Customer</h4>
                    </div>
                </div>
                <!-- Single Team Wrapper End -->
            </div>  --}}

        </div>
    </div>
</div>
<!-- Team section End -->





@endsection

@section('script')

@endsection