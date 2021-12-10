@extends('backend.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4  m-2">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">{{__('global.maps')}}</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3036.8738449880334!2d31.126215013490512!3d29.991373192357127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1637158426454!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
@endsection

@push('styles')

  <style>

  </style>
@endpush

@push('scripts')

  <script>

  </script>
  <script>

  </script>
@endpush
