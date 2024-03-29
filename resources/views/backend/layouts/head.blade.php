<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="description of your website/webpage, make sure you use keywords!">
    <meta name="author" content="Sriret Cherif Amine">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-SHOP || DASHBOARD</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->



    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

    @stack('styles')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(str_replace('_', '-',  app()->getLocale()) === "ar" )
    <link href="{{asset('backend/css/sb-admin-2.rtl.css')}}" rel="stylesheet">
    @else
    <link href="{{asset('backend/css/sb-admin-2.css')}}" rel="stylesheet">
    @endif
    <style>


    </style>
</head>
