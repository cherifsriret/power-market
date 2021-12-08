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
      <h6 class="m-0 font-weight-bold text-primary float-left">{{__('maintenance_company.list_maintenance_companies')}}</h6>
      @can("create_maintenance_companies")
        <a href="{{route('maintenance_companies.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus mx-2"></i>{{__('maintenance_company.add_maintenance_company')}}</a>
      @endcan
    </div>
    <div class="card-body">
        <div class="row">
        @foreach($maintenanceCompanies as $maintenance_company)
        <div class="col-md-6  col-sm-12 mb-4">
            <div class="card border-left-primary shadow">
                <div class="card-header m-auto">
                    @if($maintenance_company->photo)
                        <img src="{{$maintenance_company->photo}}" alt="{{$maintenance_company->photo}}" height="200">
                    @else
                        <img src="https://via.placeholder.com/600x370" alt="#">
                    @endif
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('maintenance_company.name')}} </div>
                        </div>
                        <div class="col-auto">
                            {{$maintenance_company->name}}
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('maintenance_company.address')}} </div>
                        </div>
                        <div class="col-auto">
                            {{$maintenance_company->address}}
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('maintenance_company.phone')}} </div>
                        </div>
                        <div class="col-auto">
                            {{$maintenance_company->phone}}
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('maintenance_company.responsable')}} </div>
                        </div>
                        <div class="col-auto">
                            {{$maintenance_company->responsable}}
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('maintenance_company.maps')}} </div>
                        </div>
                        <div class="col-auto">
                            {{$maintenance_company->maps}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('global.created_at')}} : {{(($maintenance_company->created_at)? $maintenance_company->created_at->diffForHumans() : '')}}</div>
                        </div>
                        <div class="col-auto">
                            <div style="display: inline-flex;">
                                @can("update_maintenance_companies")
                                <a href="{{route('maintenance_companies.edit',$maintenance_company->id)}}" class="btn btn-warning btn-sm float-left mx-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can("delete_maintenance_companies")
                                <form method="POST" action="{{route('maintenance_companies.destroy',[$maintenance_company->id])}}">
                                    @csrf
                                    @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$maintenance_company->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title={{__('global.delete')}}><i class="fas fa-trash-alt"></i></button>
                                      </form>
                                @endcan
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <span class="d-flex flex-row-reverse"> {{$maintenanceCompanies->links("pagination::bootstrap-4")}}</span>
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
