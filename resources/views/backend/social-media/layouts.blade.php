<!DOCTYPE html>
<html lang="{{ str_replace('_', '-',  app()->getLocale()) }}"  dir="{{ str_replace('_', '-',  app()->getLocale()) === "ar" ? "rtl": "ltr"}}">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Custom fonts for this template-->
        <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->

        @if(str_replace('_', '-',  app()->getLocale()) === "ar" )
        <link href="{{asset('backend/css/sb-admin-2.rtl.css')}}" rel="stylesheet">
        @else
        <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
        @endif

        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('styles')

        <style>
.object-cover{
    width: 40px;
    height: 40px;
    border-radius: 100%;
}
.rounded{
    border-radius: 20px !important;
}

.w-5 {
    width: 1.25rem;
}

.fill-current {
    fill: currentColor;
}
.h-5 {
    height: 1.25rem;
}
.rounded-lg {
    border-radius: 0.5rem;
}

.bg-blue-600 {
    --bg-opacity: 1;
    background-color: #3182ce;
    background-color: rgba(49, 130, 206, var(--bg-opacity));
}


        </style>

    </head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('backend.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('backend.layouts.header')
        <!-- End of Topbar -->


        <div id="app">
            <main class="">
                @yield('content')
            </main>
        </div>

      </div>
      <!-- End of Main Content -->
      @include('backend.layouts.footer')

</body>

</html>

