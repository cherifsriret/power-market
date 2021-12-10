@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('place.add_place')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('places.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="address" class="col-form-label">{{__('place.address')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="address" id="address" placeholder="{{__('place.enter_address')}}">
                      </div>
                  @error('address')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
              <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('place.description')}}</label>
                    <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
              </div>

              <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="photo" class="col-form-label">{{__('place.photo')}}</label>
                    <div class="input-group mb-2">
                        <span class="input-group-btn">
                            <button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success">
                            <i class="fa fa-picture-o"></i> {{__('global.choose')}}
                            </button>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                  @error('photo')
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
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
        var route_prefix = "{{ url('/filemanager') }}";
    $('#lfm').filemanager('image', {prefix: route_prefix});
$('#description').summernote({
        placeholder: "{{__('place.enter_place_description')}}",
          tabsize: 2,
          height: 150
      });
  </script>
@endpush
