<!DOCTYPE html>
<html lang="{{ str_replace('_', '-',  app()->getLocale()) }}"  dir="{{ str_replace('_', '-',  app()->getLocale()) === "ar" ? "rtl": "ltr"}}">

@include('backend.layouts.head')

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
            <!-- Begin Page Content -->
            @yield('main-content')
            <!-- /.container-fluid -->
        </div>

      </div>
      <!-- End of Main Content -->
      @include('backend.layouts.footer')

</body>

</html>
