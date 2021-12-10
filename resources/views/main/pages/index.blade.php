@extends('main.layouts.master')

@section('main-content')

 <!-- Start Content Home Page -->
                    <!-- Start Header -->
                    <div class="owl-carousel owl-theme" id="Owl-Header">
                        <div class="item">
                            <img src="{{asset('main/images/home-one-img1.jpg')}}" alt="">
                            <div class="content">
                                <span>فقط خدمات عالية الجودة</span>
                                <h2> . نحن نقدم أفضل خدمات التي توفر احتياجاتك </h2>
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه
                                    وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                </p>
                                <a href="signUp.php" class="default-btn btn-bg-one">سجل معنا الان</a>
                                <a href="{{route("admin")}}" class="default-btn btn-bg-two">اللوحة الادارية</a>
                                <a href="http://www.me-me-eg.com/InterCome" class="default-btn btn-bg-one">الوجهة</a>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('main/images/home-one-img2.jpg')}}" alt="">
                            <div class="content">
                                <span>فقط خدمات عالية الجودة</span>
                                <h2>. نحن نقدم أفضل خدمات التي توفر احتياجاتك .</h2>
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه
                                    وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                </p>
                                <a href="signUp.php" class="default-btn btn-bg-one">سجل معنا الان</a>
                                <a href="http://www.me-me-eg.com/InterCome/sys/index.php" class="default-btn btn-bg-two">اللوحة الادارية</a>
                                <a href="http://www.me-me-eg.com/InterCome" class="default-btn btn-bg-one">الوجهة</a>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{asset('main/images/home-one-img3.jpg')}}" alt="">
                            <div class="content">
                                <span>فقط خدمات عالية الجودة</span>
                                <h2>. نحن نقدم أفضل خدمات التي توفر احتياجاتك .</h2>
                                <p>
                                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه
                                    وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                </p>
                                <a href="signUp.php" class="default-btn btn-bg-one">سجل معنا الان</a>
                                <a href="{{route("admin")}}" class="default-btn btn-bg-two">اللوحة الادارية</a>
                                <a href="http://www.me-me-eg.com/InterCome" class="default-btn btn-bg-one">الوجهة</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Start About -->
                    <div class="about">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-content">
                                        <h2>فقط خدمات عالية الجودة</h2>
                                        <p>
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه
                                            وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <div class="content-card">
                                                    <i class="fas fa-headset"></i>
                                                    <h4>دعم سريع</h4>
                                                    <p>
                                                        لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه
                                                        وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... او نماذج مواقع انترنت ...
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <a href="contact-Us.php" class="default-btn btn-bg-two border-radius-50"> قرأ المزيد !  <i class="fas fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-img">
                                        <img src="{{asset('main/images/about/about-img1.jpg')}}" alt="">
                                        <div class="sub-content">
                                        <img src="{{asset('main/images/about/about-img2.jpg')}}" alt="">
                                            <div class="content">
                                                <h3>4.5k</h3>
                                                <span>عملاء راضون</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End About -->

                    <!-- Start Services -->
                    <section class="services pt-100 pb-70">
                        <div class="container">
                            <div class="section-title text-center">
                                <span class="sp-color1">خدماتنا</span>
                                <h2>نحن نقدم مجموعة متنوعة من خدمات تكنولوجيا المعلومات</h2>
                                <p class="margin-auto">
                                لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور
                                 طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                </p>
                            </div>
                            <div class="row pt-45">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="services-card">
                                        <i class="fas fa-store"></i>
                                        <h3><a href="service-details.html">أسواق المدينة  </a></h3>
                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...</p>
                                        <a href="" class="learn-btn">اقراء المزيد  <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="services-card">
                                        <i class="far fa-building"></i>
                                        <h3><a href=""> شركات الصيانة  </a></h3>
                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...</p>
                                        <a href="" class="learn-btn">اقراء المزيد  <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="services-card">
                                        <i class="fas fa-home"></i>
                                        <h3><a href="service-details.html">  معالم المدينة  </a></h3>
                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...</p>
                                        <a href="" class="learn-btn">اقراء المزيد  <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="services-card">
                                        <i class="fas fa-home"></i>
                                        <h3><a href="service-details.html">   أرقام الطورائ  </a></h3>
                                        <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...</p>
                                        <a href="" class="learn-btn">اقراء المزيد  <i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-shape">
                            <img src="{{asset('main/images/service/service-shape1.png')}}"alt="Images">
                        </div>
                    </section>
                    <!-- End Services -->

                    <!-- Start Work Progress -->
                    <section class="work-process-area pt-100 pb-70">
                        <div class="container">
                            <div class="section-title text-center">
                                <span class="sp-color2">عملية العمل لدينا</span>
                                <h2>كيف ستساعدك خدماتنا على تنمية عملك</h2>
                            </div>
                            <div class="row pt-45">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="work-process-card">
                                    <i class="fas fa-people-arrows"></i>
                                        <h3>لوريم إيبسوم </h3>
                                        <p>
                                            ما هو لوريم ايبسوم
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص
                                            بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                        </p>
                                        <div class="number">01</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="work-process-card">
                                    <i class="fas fa-recycle"></i>
                                        <h3>لوريم إيبسوم </h3>
                                        <p>
                                            ما هو لوريم ايبسوم
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص
                                            بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                        </p>
                                        <div class="number">02</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="work-process-card">
                                    <i class="fas fa-people-arrows"></i>
                                        <h3>لوريم إيبسوم </h3>
                                        <p>
                                            ما هو لوريم ايبسوم
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص
                                            بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                        </p>
                                        <div class="number">03</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="work-process-card">
                                    <i class="fas fa-recycle"></i>
                                        <h3>لوريم إيبسوم </h3>
                                        <p>
                                            ما هو لوريم ايبسوم
                                            لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص
                                            بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...
                                        </p>
                                        <div class="number">04</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                    <!-- End Work Progress -->

                    <!-- Start Contact Us -->
                    <div class="contact-us pt-100 pb-70">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-md-8">
                                    <div class="build-content">
                                        <div class="section-title">
                                            <span>نحن نحمل أكثر من مجرد مهارات تشفير جيدة</span>
                                            <h2>
                                                    ما هو لوريم ايبسوم لوريم ايبسوم هو نموذج افتراضي يوضع   ...
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="build-btn-area">
                                        <a href="contact-Us.php" class="default-btn btn-bg-two border-radius-50">تواصل معنا !  <i class="fas fa-cheveron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="build-play-img pt-45">
                            <img src="{{asset('main/images/contactus/build-img.jpg')}}"alt="Images">
                                <div class="play-area-content">
                                    <span>شاهد فيديو المقدمة لدينا</span>
                                    <h2>الحل الأمثل لخدمات تكنولوجيا المعلومات!</h2>
                                </div>
                                <div class="play-area">
                                    <a href="https://www.youtube.com/watch?v=tUP5S4YdEJo" class="play-on popup-btn"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Contact Us -->

                <!-- End Content Home Page -->
@endsection
