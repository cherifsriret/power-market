@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('maintenance_statement.add_maintenance_statements')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('maintenance_statements.store')}}">
        {{csrf_field()}}
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('maintenance_statement.description')}}</label>
                    <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
              </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('maintenance_statement.maintenance_date')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="text" class="form-control" name="maintenance_date" id="maintenance_date" placeholder="{{__('maintenance_statement.enter_maintenance_date')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('maintenance_date')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('maintenance_statement.price')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="number" class="form-control" name="price" id="price" placeholder="{{__('maintenance_statement.enter_price')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-money-bill"></i></div>
                          </div>
                      </div>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="technician_name" class="col-form-label">{{__('maintenance_statement.technician_name')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="technician_name" id="technician_name" placeholder="{{__('maintenance_statement.enter_technician_name')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-info-circle"></i></div>
                          </div>
                      </div>
                  @error('technician_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="technician_phone" class="col-form-label">{{__('maintenance_statement.technician_phone')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="technician_phone" id="technician_phone" placeholder="{{__('maintenance_statement.enter_technician_phone')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-phone-square"></i></div>
                          </div>
                      </div>
                  @error('technician_phone')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="photo" class="col-form-label">{{__('maintenance_statement.photo')}}</label>
                    <div class="input-group mb-2">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success">
                            <i class="fa fa-picture-o"></i> {{__('global.choose')}}
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" readonly name="photo" value="{{old('photo')}}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                  @error('photo')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            @can('read_maintenance_statements')
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="building_id" class="col-form-label">{{__('maintenance_statement.building')}}</label>
                    <select name="building_id" class="form-control">
                        <option >{{__('maintenance_statement.enter_building')}}</option>
                        @foreach ($buildings as $building)
                            <option value="{{$building->id}}">{{$building->name}}</option>
                        @endforeach
                    </select>
                  @error('building_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            @endcan



        </div>

        <div class="form-group mb-3 text-center">
            <a class="btn btn-warning " href="{{route('maintenance_statements.read')}}" >{{__('maintenance_statement.list_maintenance_statements')}}</a>
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


$('#description').summernote({
        placeholder: "{{__('maintenance_statement.enter_maintenance_statement_description')}}",
          tabsize: 2,
          height: 150
      });
  </script>
@endpush
