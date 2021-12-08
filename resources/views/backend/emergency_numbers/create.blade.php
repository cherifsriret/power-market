@extends('backend.layouts.master')

@section('main-content')

<div class="card m-2">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
    <h5 class="card-header">{{__('emergency_number.add_emergency_number')}}</h5>
    <div class="card-body">
      <form method="post" action="{{route('emergency_numbers.store')}}">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="name" class="col-form-label">{{__('emergency_number.name')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('emergency_number.enter_name')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-info-circle"></i></div>
                          </div>
                      </div>
                  @error('name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="phone" class="col-form-label">{{__('emergency_number.phone')}}</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__('emergency_number.enter_phone')}}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-phone-square"></i></div>
                          </div>
                      </div>
                  @error('phone')
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

@endpush
