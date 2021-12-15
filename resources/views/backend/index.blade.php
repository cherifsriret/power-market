@extends('backend.layouts.master')
@section('title','E-SHOP || DASHBOARD')
@section('main-content')
<div class="container-fluid">
    @include('backend.layouts.notification')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{__('global.dashboard')}}</h1>
    </div>
@if ( auth()->user()->status =="inactive")


<div class="alert alert-danger p-2" role="alert">
    {{trans('global.your_account_is_not_yet_activated')}}
</div>
@else

@canany(['our_users','read_users'])
   <!-- Content Row -->
   <div class="row">

    <!-- Category -->
    <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <a  href="{{route('users.index')}}">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">{{__('user.all_user')}}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['all_user']}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </a>
        </div>
      </div>
    </div>

    <!-- Products -->
    <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <a  href="{{route('users.activated')}}">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-lg font-weight-bold text-success text-uppercase mb-1">{{__('user.activated_user')}}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['activated_user']}}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-check fa-2x text-gray-300"></i>
            </div>
          </div>
        </a>
        </div>
      </div>
    </div>

    <!-- Order -->
    <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <a  href="{{route('users.desactivated')}}">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">{{__('user.desactivated_user')}}</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data['disactivated_user']}}</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-alt-slash fa-2x text-gray-300"></i>
            </div>
          </div>
        </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Row -->
@endcan
@endif






  </div>
@endsection

@push('scripts')

@endpush
