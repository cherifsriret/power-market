<!DOCTYPE html>
<html lang="{{ str_replace('_', '-',  app()->getLocale()) }}"  dir="{{ str_replace('_', '-',  app()->getLocale()) === "ar" ? "rtl": "ltr"}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="description of your website/webpage, make sure you use keywords!">
    <meta name="author" content="Sriret Cherif Amine">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('invitation.invitation')}}</title>
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->



    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <div class="card m-2">
                <div class="card-body" id="receipt-invitation">
                    <h3 class="text-center mb-5">{{__('invitation.invitation')}}</h3>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="symbol symbol-50 symbol-lg-120" id="">
                                {!!QrCode::color(0, 0, 0)->size(120)->generate($invitation->code)!!}
                            </div>
                            <div class="m-3">
                                <b>{{ $invitation->code }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">{{__('invitation.visitor_name')}}</label>
                              <input id="inputTitle" type="text" name="visitor_name" disabled placeholder="{{__('invitation.enter_visitor_name')}}" value="{{$invitation->visitor_name}}"  class="form-control">
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">{{__('invitation.visit_from_date')}}</label>
                                <div class="input-group mb-2 date">
                                    <input type="text" class="form-control" disabled value="{{$invitation->visit_from_date}}"  name="visit_from_date" id="visit_from_date" placeholder="{{__('invitation.enter_visit_from_date')}}">
                                  </div>
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">{{__('invitation.visit_from_time')}}</label>
                                <div class="input-group mb-2  bootstrap-timepicker timepicker">
                                    <input type="text" class="form-control" disabled  value="{{$invitation->visit_from_time}}"  name="visit_from_time" id="visit_from_time" placeholder="{{__('invitation.enter_visit_from_time')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">{{__('invitation.visit_to_date')}}</label>
                                <div class="input-group mb-2 date">
                                    <input type="text" class="form-control" disabled value="{{$invitation->visit_to_date}}"  name="visit_to_date" id="visit_to_date" placeholder="{{__('invitation.enter_visit_to_date')}}">
                                  </div>
                              </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">{{__('invitation.visit_to_time')}}</label>
                                <div class="input-group mb-2  bootstrap-timepicker timepicker">
                                    <input type="text" class="form-control" disabled value="{{$invitation->visit_to_time}}" name="visit_to_time" id="visit_to_time" placeholder="{{__('invitation.enter_visit_to_time')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="visit_type" class="col-form-label">{{__('invitation.visit_type')}}</label>
                                <select name="visit_type" class="form-control" disabled>
                                    <option value="single" {{(($invitation->visit_type=='single') ? 'selected' : '')}}>{{__('invitation.single_visit')}}</option>
                                    <option value="multiple"{{(($invitation->visit_type=='multiple') ? 'selected' : '')}}>{{__('invitation.multiple_visit')}}</option>
                                </select>
                              </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>



  </body>

</html>



