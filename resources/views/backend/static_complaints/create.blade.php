@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('static_complaint.add_static_complaint')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('static_complaints.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('static_complaint.name')}}</label>
                    <div class="input-group mb-2 date">
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('static_complaint.enter_name')}}">
                      </div>
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('static_complaint.national_id')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control"  value="{{old('national_id')}}" name="national_id" id="national_id" placeholder="{{__('static_complaint.enter_national_id')}}">

                    </div>
                    @error('national_id')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('static_complaint.phone')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control"  value="{{old('phone')}}" name="phone" id="phone" placeholder="{{__('static_complaint.enter_phone')}}">

                    </div>
                    @error('phone')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('static_complaint.email')}}</label>
                    <div class="input-group mb-2">
                        <input class="form-control" type="email"  value="{{old('email')}}" name="email" id="email" placeholder="{{__('static_complaint.enter_email')}}">
                    </div>
                    @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('static_complaint.address')}}</label>
                    <div class="input-group mb-2">
                        <textarea  name="address" id="address" class="form-control" placeholder="{{__('static_complaint.enter_address')}}" cols="30" rows="2">{{old('address')}}</textarea>

                    </div>
                    @error('address')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">{{__('static_complaint.description')}}</label>
                    <div class="input-group mb-2">
                        <textarea  name="description" id="description" class="form-control" placeholder="{{__('static_complaint.enter_description')}}" cols="30" rows="2">{{old('description')}}</textarea>

                    </div>
                    @error('description')
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

<script>

  </script>
@endpush
