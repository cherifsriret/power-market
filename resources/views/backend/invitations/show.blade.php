@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <h5 class="card-header">{{__('invitation.show_invitation')}}</h5>
    <div class="card-body" id="receipt-invitation">
        <h3 class="text-center mb-5">{{__('invitation.invitation')}}</h3>
        <div class="row">
            <div class="col-12 text-center">
                <div class="symbol symbol-50 symbol-lg-120">
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
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">{{__('invitation.owner')}}</label>
                  <input  type="text"  disabled  value="{{$invitation->user->name??''}}"  class="form-control">
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label  class="col-form-label">{{__('user.governorate')}}</label>
                  <input  type="text"  disabled  value="{{$invitation->user->governorate??''}}"  class="form-control">
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">{{__('user.city')}}</label>
                  <input  type="text"  disabled  value="{{$invitation->user->city??''}}"  class="form-control">
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">{{__('user.region')}}</label>
                  <input  type="text"  disabled  value="{{$invitation->user->region??''}}"  class="form-control">
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">{{__('user.building')}}</label>
                  <input  type="text"  disabled  value="{{$invitation->user->building??''}}"  class="form-control">
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">{{__('user.stage')}}</label>
                  <input  type="text"  disabled  value="{{$invitation->user->stage??''}}"  class="form-control">
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">{{__('user.apartment_number')}}</label>
                  <input  type="text"  disabled  value="{{$invitation->user->apartment_number??''}}"  class="form-control">
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label  class="col-form-label">{{__('user.user_type')}}</label>
                    <select class="form-control" disabled>
                         <option value="tenant" {{(($invitation->visit_type=='tenant') ? 'selected' : '')}}>{{__('user.tenant')}}</option>
                        <option value="owner"{{(($invitation->visit_type=='owner') ? 'selected' : '')}}>{{__('invitation.owner')}}</option>
                        <option value="owners_association_president"{{(($invitation->visit_type=='owners_association_president') ? 'selected' : '')}}>{{__('invitation.owners_association_president')}}</option>
                    </select>
                  </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <div class="form-group mb-3 text-center">
            <button class="btn btn-danger" type="button" onclick='printDiv();'>{{__('global.print')}}</button>
         </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function printDiv()
{

  var divToPrint=document.getElementById('receipt-invitation');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write(`<html>
    <head>

<meta charset="utf-8">
<link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@if(str_replace('_', '-',  session()->get('lang')) === "ar" )
<link href="{{asset('backend/css/sb-admin-2.rtl.css')}}" rel="stylesheet">
@else
<link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
@endif
</head>
  <body onload="window.print()">${divToPrint.innerHTML}</body></html>`);

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
@endpush
