<!DOCTYPE html>
<html lang="{{ str_replace('_', '-',  app()->getLocale()) }}"  dir="{{ str_replace('_', '-',  app()->getLocale()) === "ar" ? "rtl": "ltr"}}">

@include('main.layouts.head')

<body >

        <!-- Navbar -->
        @include('main.layouts.navbar')

        <main id="mainpage">
            <!-- Begin Page Content -->
            @yield('main-content')
            <!-- /.container-fluid -->
        </main>

      <!-- End of Main Content -->
      @include('main.layouts.footer')
      @include('main.layouts.scripts')

</body>

</html>
