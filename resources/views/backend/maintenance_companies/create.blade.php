@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('maintenance_company.add_maintenance_company')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('maintenance_companies.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="name" class="col-form-label">{{__('maintenance_company.name')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('maintenance_company.enter_name')}}">
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
                    <label for="address" class="col-form-label">{{__('maintenance_company.address')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="address" id="address" placeholder="{{__('maintenance_company.enter_address')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('address')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="phone" class="col-form-label">{{__('maintenance_company.phone')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__('maintenance_company.enter_phone')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('phone')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="responsable" class="col-form-label">{{__('maintenance_company.responsable')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="responsable" id="responsable" placeholder="{{__('maintenance_company.enter_responsable')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('responsable')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="maps" class="col-form-label">{{__('maintenance_company.maps')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="maps" id="maps" placeholder="{{__('maintenance_company.enter_maps')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                      </div>
                  @error('maps')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="photo" class="col-form-label">{{__('maintenance_company.photo')}}</label>
                    <div class="input-group mb-2">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> {{__('global.choose')}}
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                  @error('photo')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('maintenance_company.cv')}}</label>
                    <textarea class="form-control" id="cv" name="cv">{{old('cv')}}</textarea>
                    @error('cv')
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
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">

@endpush

@push('scripts')
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>

<script>
     var route_prefix = "{{ url('/filemanager') }}";
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#cv').summernote({
        placeholder: "{{__('maintenance_company.enter_cv')}}",
          tabsize: 2,
          height: 150
      });
  </script>
@endpush
