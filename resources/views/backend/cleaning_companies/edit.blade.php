@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('cleaning_company.add_cleaning_company')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('cleaning_companies.update',$cleaning_company->id)}}" >
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="name" class="col-form-label">{{__('cleaning_company.name')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="name" id="name" value="{{$cleaning_company->name}}" placeholder="{{__('cleaning_company.enter_name')}}">
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
                    <label for="address" class="col-form-label">{{__('cleaning_company.address')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="address" id="address"  value="{{$cleaning_company->address}}" placeholder="{{__('cleaning_company.enter_address')}}">
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
                    <label for="phone" class="col-form-label">{{__('cleaning_company.phone')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="phone" id="phone" value="{{$cleaning_company->phone}}" placeholder="{{__('cleaning_company.enter_phone')}}">
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
                    <label for="responsable" class="col-form-label">{{__('cleaning_company.responsable')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="responsable" id="responsable"  value="{{$cleaning_company->responsable}}" placeholder="{{__('cleaning_company.enter_responsable')}}">
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
                    <label for="maps" class="col-form-label">{{__('cleaning_company.maps')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="maps" id="maps"   value="{{$cleaning_company->maps}}" placeholder="{{__('cleaning_company.enter_maps')}}">
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
                    <label for="photo" class="col-form-label">{{__('cleaning_company.photo')}}</label>
                    <div class="input-group mb-2">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> {{__('global.choose')}}
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$cleaning_company->photo}}">
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

@endpush

@push('scripts')
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<script>
 $('#lfm').filemanager('image');

  </script>
@endpush
