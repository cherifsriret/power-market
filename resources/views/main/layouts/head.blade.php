<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title??""}}</title>

    <link rel="icon" href="{{asset('main/images/logo-remove.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('main/fontawesome-free-5.13.1-web/css/all.min.css')}}"> <!--library font-awesome-5-->

    <link href="{{asset('main/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('main/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('main/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('main/css/uicons-regular-rounded.css')}}" rel="stylesheet">
    <link href="{{asset('main/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('main/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2">
    <link href="{{asset('main/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('main/css/style.css')}}" rel="stylesheet">
    @stack('styles')
</head>
