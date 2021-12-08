@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('user.create_user')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('users.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('user.name')}}</label>
                  <input id="inputTitle" type="text" name="name" placeholder="{{__('user.enter_name')}}"  value="{{old('name')}}" class="form-control">
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputEmail" class="col-form-label">{{__('user.mail')}}</label>
                  <input id="inputEmail"  type="email" name="email" placeholder="{{__('user.enter_mail')}}"  value="{{old('email')}}" class="form-control">
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputPassword" class="col-form-label">{{__('user.password')}}</label>
                  <input id="inputPassword"  type="password" name="password" placeholder="{{__('user.enter_password')}}"  value="{{old('password')}}" class="form-control">
                  @error('password')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputGovernorate" class="col-form-label">{{__('user.governorate')}}</label>
                  <input id="inputGovernorate" type="text" name="governorate" placeholder="{{__('user.enter_governorate')}}"  value="{{old('governorate')}}" class="form-control">
                  @error('governorate')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputCity" class="col-form-label">{{__('user.city')}}</label>
                  <input id="inputCity" type="text" name="city" placeholder="{{__('user.enter_city')}}"  value="{{old('city')}}" class="form-control">
                  @error('city')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputRegion" class="col-form-label">{{__('user.region')}}</label>
                  <input id="inputRegion" type="text" name="region" placeholder="{{__('user.enter_region')}}"  value="{{old('region')}}" class="form-control">
                  @error('region')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputBuilding" class="col-form-label">{{__('user.building')}}</label>
                  <input id="inputBuilding" type="text" name="building" placeholder="{{__('user.enter_building')}}"  value="{{old('building')}}" class="form-control">
                  @error('building')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputStage" class="col-form-label">{{__('user.stage')}}</label>
                  <input id="inputStage" type="text" name="stage" placeholder="{{__('user.enter_stage')}}"  value="{{old('stage')}}" class="form-control">
                  @error('stage')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputApartmentNumber" class="col-form-label">{{__('user.apartment_number')}}</label>
                  <input id="inputApartmentNumber" type="text" name="apartment_number" placeholder="{{__('user.enter_apartment_number')}}"  value="{{old('apartment_number')}}" class="form-control">
                  @error('apartment_number')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputPhone" class="col-form-label">{{__('user.phone')}}</label>
                  <input id="inputPhone" type="text" name="phone" placeholder="{{__('user.enter_phone')}}"  value="{{old('phone')}}" class="form-control">
                  @error('phone')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="user_type" class="col-form-label">{{__('user.user_type')}}</label>
                    <select name="user_type" class="form-control">
                        <option >{{__('user.enter_user_type')}}</option>
                        <option value="tenant" >{{__('user.tenant')}}</option>
                        <option value="owner">{{__('user.owner')}}</option>
                        <option value="owners_association_president">{{__('user.owners_association_president')}}</option>
                    </select>
                  @error('user_type')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="status" class="col-form-label">{{__('global.status')}}</label>
                    <select name="status" class="form-control">
                        <option >{{__('global.enter_status')}}</option>
                        <option value="active">{{__('global.status_active') }}</option>
                        <option value="inactive">{{__('global.status_inactive') }}</option>
                    </select>
                  @error('status')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="role[]" class="col-form-label">{{__('role.role')}}</label>
                    <select name="role[]" id="roles"  multiple="multiple" class="form-control">
                        <option >{{__('user.select_roles')}}</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->display_name}}</option>
                        @endforeach
                    </select>
                  @error('role[]')
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush

@push('scripts')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush
