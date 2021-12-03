@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('invitation.update_invitation')}}</h5>
    <div class="card-body">
      <form method="post"  action="{{route('invitations.update',$invitation->id)}}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('invitation.visitor_name')}}</label>
                  <input id="inputTitle" type="text" name="visitor_name" placeholder="{{__('invitation.enter_visitor_name')}}" value="{{$invitation->visitor_name}}"  class="form-control">
                  @error('visitor_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('invitation.visit_from_date')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="text" class="form-control" value="{{$invitation->visit_from_date}}"  name="visit_from_date" id="visit_from_date" placeholder="{{__('invitation.enter_visit_from_date')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('invitation.visit_from_time')}}</label>
                    <div class="input-group mb-2  bootstrap-timepicker timepicker">
                        <input type="text" class="form-control"  value="{{$invitation->visit_from_time}}"  name="visit_from_time" id="visit_from_time" placeholder="{{__('invitation.enter_visit_from_time')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                        </div>
                    </div>
                    @error('visit_from_time')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('invitation.visit_to_date')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="text" class="form-control" value="{{$invitation->visit_to_date}}"  name="visit_to_date" id="visit_to_date" placeholder="{{__('invitation.enter_visit_to_date')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('invitation.visit_to_time')}}</label>
                    <div class="input-group mb-2  bootstrap-timepicker timepicker">
                        <input type="text" class="form-control"  value="{{$invitation->visit_to_time}}" name="visit_to_time" id="visit_to_time" placeholder="{{__('invitation.enter_visit_to_time')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                        </div>
                    </div>
                    @error('visit_to_time')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="visit_type" class="col-form-label">{{__('invitation.visit_type')}}</label>
                    <select name="visit_type" class="form-control">
                        <option >{{__('invitation.select_type')}}</option>
                        <option value="single" {{(($invitation->visit_type=='single') ? 'selected' : '')}}>{{__('invitation.single_visit')}}</option>
                        <option value="multiple"{{(($invitation->visit_type=='multiple') ? 'selected' : '')}}>{{__('invitation.multiple_visit')}}</option>
                    </select>
                  @error('visit_type')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
        </div>

        <div class="form-group mb-3 text-center">
          <button type="reset" class="btn btn-warning">{{__('global.reset')}}</button>
           <button class="btn btn-success" type="submit">{{__('global.submit')}}</button>
        </div>
      </form>
    </div>
</div>

@endsection


@push('styles')
  @if(str_replace('_', '-',  session()->get('lang')) === "ar" )
  <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.rtl.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
  @else
  <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
  @endif
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  @if(str_replace('_', '-',  session()->get('lang')) === "ar" )
  <script src="{{asset('vendor/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js')}}"></script>
  @endif
  <script>
      $('#visit_from_date,#visit_to_date').datepicker({
    language: "{{str_replace('_', '-',  session()->get('lang'))}}",
    format:"dd/mm/yyyy"
});

$('#visit_from_time,#visit_to_time').timepicker({
    showMeridian:false,
    template: false,
    showInputs: false,
    minuteStep: 5
});
  </script>
@endpush
