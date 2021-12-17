<!-- Navigation -->
<!-- <div class="navbar"> -->
    @php
    $share_link_home = Share::page(route('home'))->facebook()->linkedin()->twitter()->whatsapp()->getRawLinks();
@endphp
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="socail">
                        <a href="{{$share_link_home['facebook']}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$share_link_home['twitter']}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{$share_link_home['linkedin']}}"><i class="fab fa-linkedin-in"></i></a>
                        <a href="{{$share_link_home['whatsapp']}}"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="phone">
                    الدعم من قبل : <a href="">23334567+(02)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navLinks">
        <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{route('main.home')}}"> <img class="imgMob" src="{{asset('main/images/logo-remove.png')}}" alt=""></a>

        <div class="collapse navbar-collapse links" id="navbarSupportedContent">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('main.home')}}">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link link-scroll" data-scroll="about" href="#">من نحن</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropbtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-caret-down"></i>
                الخدمات
                </a>
                <div class="dropdown-content" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"><i class="fas fa-arrow-left"></i>أسواق المدينة </a>
                <a class="dropdown-item" href="#"><i class="fas fa-arrow-left"></i> خريطة المدينة </a>
                <a class="dropdown-item" href="#"><i class="fas fa-arrow-left"></i> شركات الصيانة </a>
                <a class="dropdown-item" href="#"><i class="fas fa-arrow-left"></i> معالم المدينة  </a>
                <a class="dropdown-item" href="#"><i class="fas fa-arrow-left"></i> ارقام الطورائ </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#jopAppModal"><i class="fas fa-arrow-left"></i>  وظائف شاغرة </a>
                <!-- <div class="dropdown-divider"></div> -->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link link-scroll" data-scroll="contact-us" href="contact-Us.php">  تواصل معنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">   شركاءنا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('customerComplaintsAdd')}}"> تقديم شكوي </a>
                <!-- data-toggle="modal" data-target="#complaintModal" -->
            </li>
            </ul>
        </div>
        <div class="form-inline my-2 my-lg-0">
                <div class="searsh-box">
                    <i class="fas fa-search"></i>
                </div>
                <a href="{{route("register")}}" class="sign default-btn btn-bg-two">سجل معنا</a>
                @auth()
                    <a href="{{route("admin")}}" class="sign default-btn btn-bg-one">اللوحة الادارية</a>
                @endauth
                @guest
                <a href="{{route("login")}}" class="sign default-btn btn-bg-one">تسجيل الدخول</a>
                @endguest
            </div>
        </div>
    </nav>
<!-- </div> -->
