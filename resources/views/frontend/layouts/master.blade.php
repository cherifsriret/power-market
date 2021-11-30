<!DOCTYPE html>
<html lang="{{ str_replace('_', '-',  session()->get('lang')) }}"  dir="{{ str_replace('_', '-',  session()->get('lang')) === "ar" ? "rtl": "ltr"}}">
<head>
	@include('frontend.layouts.head')
</head>
<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')

	@include('frontend.layouts.footer')

</body>
</html>
