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
      <h6 class="m-0 font-weight-bold text-primary float-left">{{__('place.list_places')}}</h6>
      @can("create_places")
        <a href="{{route('places.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus mx-2"></i>{{__('place.add_place')}}</a>
      @endcan
    </div>
    <div class="card-body">
        <div class="row">
        @foreach($places as $place)
        <div class="col-md-12"> <div class="picec"><div class="row"><div class="col-md-4">
            <div class="item image-com">

                @if($place->photo)
                @php
                  $photo=explode(',',$place->photo);
                  // dd($photo);
                @endphp
                <img src="{{$photo[0]}}" alt="{{$place->photo}}" class="img-fluid">
            @else
                <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
            @endif

            </div>
            </div>

        <div class="col-md-8"><div class="item">
            <span class="num">{{$place->id}}</span>
    </div>
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                {{__('place.address')}} </div>
        </div>
        <div class="col-auto">
            {{$place->address}}
        </div>
    </div>
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                {{__('place.description')}} </div>
        </div>
    </div>
    <div class="row no-gutters align-items-center">
        <div class="col">
            {!! $place->description !!}
        </div>
    </div>
    <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                {{__('global.created_at')}}</div>
        </div>
        <div class="col-auto">
            {{(($place->created_at)? $place->created_at->diffForHumans() : '')}}
        </div>
    </div>


    <div class="item text-left" style="display: flex; flex-direction:row-reverse">


        @can("delete_places")
        <form method="POST" action="{{route('places.destroy',[$place->id])}}">
            @csrf
            @method('delete')
                <button class="delete confirm btn btn-danger  mx-1 dltBtn" data-id={{$place->id}}  data-toggle="tooltip" data-placement="bottom" title={{__('global.delete')}}><i class="fas fa-times-circle"></i> {{__('global.delete')}}</button>
              </form>
        @endcan
        @can("update_places")
        <a href="{{route('places.edit',$place->id)}}" class="settings btn btn-primary mx-1"  data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i>تعديل</a>
        @endcan

    </div></div></div></div> </div>
        @endforeach
    </div>
    <span class="d-flex flex-row-reverse"> {{$places->links("pagination::bootstrap-4")}}</span>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  @if(str_replace('_', '-',  app()->getLocale()) === "ar" )
  <style>
  div.dataTables_wrapper div.dataTables_filter {
    text-align: left !important;
}
  </style>
  @endif




  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .swal-footer{
          text-align: center;
      }
      .picec {
    background-color: #fff;
    position: relative;
    box-shadow: 0px 0px 4px 0px #ccc;
    padding: 10px;
    border-radius: 3px;
    margin: 20px 0 0;
    overflow: hidden;
}
 .picec .item {
    position: relative;
}

.picec .item:last-of-type {
    text-align: center;
}
 .picec .image-com {
    height: 200px;
    margin-bottom: 0;
}
.picec .item .num {
    top: -8px;
    right: -105px;
    width: 45px;
    height: 45px;
    font-size: 18px;
    padding-top: 8px;
}
.picec .item .num {
    position: absolute;
    top: -8px;
    right: -105px;
    left: 17px;
    background-color: var(--subColor);
    color: #fff;
    width: 35px;
    height: 35px;
    text-align: center;
    border-radius: 25px;
    padding-top: 5px;
    box-shadow: 0px 0px 10px 0px #1e3799;
    width: 45px;
    height: 45px;
    font-size: 18px;
    padding-top: 8px;
}
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "{{__('global.are_you_sure')}}",
                    text: "{{__('global.msg_confirm_delete')}}",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("{{__('global.your_data_safe')}}");
                    }
                });
          })
      })
  </script>
@endpush
