@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('meeting.add_meeting')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('meetings.store')}}">
        {{csrf_field()}}
        <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('meeting.description')}}</label>
                    <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
              </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('meeting.meeting_date')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="text" class="form-control" name="meeting_date" id="meeting_date" placeholder="{{__('meeting.enter_meeting_date')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('meeting_date')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('meeting.meeting_time')}}</label>
                    <div class="input-group mb-2  bootstrap-timepicker timepicker">
                        <input type="text" class="form-control"  value="{{old('meeting_time')}}" name="meeting_time" id="meeting_time" placeholder="{{__('meeting.enter_meeting_time')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                        </div>
                    </div>
                    @error('meeting_time')
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
  @if(str_replace('_', '-',  app()->getLocale()) === "ar" )
  <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.rtl.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
  @else
  <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
  @endif
  <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  @if(str_replace('_', '-',  app()->getLocale()) === "ar" )
  <script src="{{asset('vendor/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js')}}"></script>
  @endif
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
      $('#meeting_date').datepicker({
    language: "{{str_replace('_', '-',  app()->getLocale())}}",
    format:"dd/mm/yyyy"
});

$('#meeting_time').timepicker({
    showMeridian:false,
    template: false,
    showInputs: false,
    minuteStep: 5
});
$('#description').summernote({
        placeholder: "{{__('meeting.enter_meeting_description')}}",
          tabsize: 2,
          height: 150
      });
  </script>
@endpush
