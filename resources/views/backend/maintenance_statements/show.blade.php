@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('maintenance_statement.update_maintenance_statement')}}</h5>
    <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('maintenance_statement.description')}}</label>
                    <div class=" card p-3 my-2">{!!$maintenance_statement->description!!}</div>
                  </div>
              </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('maintenance_statement.maintenance_date')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="text" class="form-control" disabled value="{{$maintenance_statement->maintenance_date}}" >
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('maintenance_statement.price')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="number" class="form-control" disabled value="{{$maintenance_statement->price}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-money-bill"></i></div>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="technician_name" class="col-form-label">{{__('maintenance_statement.technician_name')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" disabled value="{{$maintenance_statement->technician_name}}" >
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-info-circle"></i></div>
                          </div>
                      </div>
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="technician_phone" class="col-form-label">{{__('maintenance_statement.technician_phone')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" disabled value="{{$maintenance_statement->technician_phone}}" >
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-phone-square"></i></div>
                          </div>
                      </div>
                  </div>
            </div>
            @can('read_maintenance_statements')

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="technician_phone" class="col-form-label">{{__('maintenance_statement.building')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" disabled value="{{$maintenance_statement->building->name??''}}" >
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-building"></i></div>
                          </div>
                      </div>
                  </div>
            </div>
            @endcan



        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="photo" class="col-form-label">{{__('maintenance_statement.photo')}}</label>
                    <img src="{{$maintenance_statement->photo}}" alt="{{$maintenance_statement->photo}}">
                  </div>
            </div>
        </div>
        <div class="form-group mb-3 text-center">
            <a class="btn btn-warning " href="{{route('maintenance_statements.read')}}" >{{__('maintenance_statement.list_maintenance_statements')}}</a>
        </div>
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
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
  <!-- Page level plugins -->
  <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  @if(str_replace('_', '-',  app()->getLocale()) === "ar" )
  <script src="{{asset('vendor/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js')}}"></script>
  @endif
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
     var route_prefix = "{{ url('/laravel-filemanager') }}";
    $('#lfm').filemanager('image', {prefix: route_prefix});

      $('#maintenance_date').datepicker({
    language: "{{str_replace('_', '-',  app()->getLocale())}}",
    format:"dd/mm/yyyy"
});


// $('#description').summernote({
//         placeholder: "{{__('maintenance_statement.enter_maintenance_statement_description')}}",
//           tabsize: 2,
//           height: 150
//       });
  </script>
@endpush
