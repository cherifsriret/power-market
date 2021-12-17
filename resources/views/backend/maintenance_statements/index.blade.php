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
      <h6 class="m-0 font-weight-bold text-primary float-left">{{__('maintenance_statement.list_maintenance_statements')}}</h6>
      @can("create_maintenance_statements")
        <a href="{{route('maintenance_statements.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="{{__('maintenance_statement.add_maintenance_statements')}}"><i class="fas fa-plus"></i>{{__('maintenance_statement.add_maintenance_statements')}}</a>
      @endcan
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="user-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>{{__('global.s_n')}}</th>
              <th>{{__('maintenance_statement.maintenance_date')}}</th>
              <th>{{__('maintenance_statement.description')}}</th>
              <th>{{__('maintenance_statement.price')}}</th>
              <th>{{__('maintenance_statement.technician_name')}}</th>
              <th>{{__('maintenance_statement.technician_phone')}}</th>
              @can('read_maintenance_statements')
              <th>{{__('maintenance_statement.building')}}</th>
              @endcan
              <th>{{__('global.created_at')}}</th>
              <th>{{__('global.actions')}}</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>{{__('global.s_n')}}</th>
                <th>{{__('maintenance_statement.maintenance_date')}}</th>
                <th>{{__('maintenance_statement.description')}}</th>
                <th>{{__('maintenance_statement.price')}}</th>
                <th>{{__('maintenance_statement.technician_name')}}</th>
                <th>{{__('maintenance_statement.technician_phone')}}</th>
                @can('read_maintenance_statements')
                <th>{{__('maintenance_statement.building')}}</th>
                @endcan
                <th>{{__('global.created_at')}}</th>
                <th>{{__('global.actions')}}</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($maintenance_statements as $maintenance_statement)
                <tr>
                    <td>{{$maintenance_statement->id}}</td>
                    <td>{{$maintenance_statement->maintenance_date}}</td>
                    <td>{!! $maintenance_statement->description !!}</td>
                    <td>{{$maintenance_statement->price}}</td>
                    <td>{{$maintenance_statement->technician_name}}</td>
                    <td>{{$maintenance_statement->technician_phone}}</td>
                    @can('read_maintenance_statements')
                        <td>{{$maintenance_statement->building->name??''}}</td>
                    @endcan
                    <td>{{(($maintenance_statement->created_at)? $maintenance_statement->created_at->diffForHumans() : '')}}</td>
                    <td>
                        <a href="{{route('maintenance_statements.show',$maintenance_statement->id)}}" class="btn btn-primary btn-sm float-left mx-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="show" data-placement="bottom"><i class="fas fa-list"></i></a>
                        @can("update_maintenance_statements")
                        <a href="{{route('maintenance_statements.edit',$maintenance_statement->id)}}" class="btn btn-warning btn-sm float-left mx-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        @endcan
                        @can("delete_maintenance_statements")
                        <form method="POST" action="{{route('maintenance_statements.destroy',[$maintenance_statement->id])}}">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn" data-id={{$maintenance_statement->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title={{__('global.delete')}}><i class="fas fa-trash-alt"></i></button>
                              </form>
                        @endcan

                    </td>

                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$maintenance_statements->links()}}</span>
      </div>
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

      $('#user-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[6,7]
                }
            ],
            @if(str_replace('_', '-',  app()->getLocale()) === "ar" )
                "language": {
    "emptyTable": "ليست هناك بيانات متاحة في الجدول",
    "loadingRecords": "جارٍ التحميل...",
    "lengthMenu": "أظهر _MENU_ مدخلات",
    "zeroRecords": "لم يعثر على أية سجلات",
    "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
    "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    "search": "ابحث:",
    "paginate": {
        "first": "الأول",
        "previous": "السابق",
        "next": "التالي",
        "last": "الأخير"
    },
    "aria": {
        "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
        "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
    },
    "select": {
        "rows": {
            "_": "%d قيمة محددة",
            "1": "1 قيمة محددة"
        },
        "cells": {
            "1": "1 خلية محددة",
            "_": "%d خلايا محددة"
        },
        "columns": {
            "1": "1 عمود محدد",
            "_": "%d أعمدة محددة"
        }
    },
    "buttons": {
        "print": "طباعة",
        "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
        "copySuccess": {
            "_": "%d قيمة نسخت",
            "1": "1 قيمة نسخت"
        },
        "pageLength": {
            "-1": "اظهار الكل",
            "_": "إظهار %d أسطر"
        },
        "collection": "مجموعة",
        "copy": "نسخ",
        "copyTitle": "نسخ إلى الحافظة",
        "csv": "CSV",
        "excel": "Excel",
        "pdf": "PDF",
        "colvis": "إظهار الأعمدة",
        "colvisRestore": "إستعادة العرض"
    },
    "autoFill": {
        "cancel": "إلغاء",
        "fill": "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
        "fillHorizontal": "تعبئة الحقول أفقيًا",
        "fillVertical": "تعبئة الحقول عموديا"
    },
    "searchBuilder": {
        "add": "اضافة شرط",
        "clearAll": "ازالة الكل",
        "condition": "الشرط",
        "data": "المعلومة",
        "logicAnd": "و",
        "logicOr": "أو",
        "title": [
            "منشئ البحث"
        ],
        "value": "القيمة",
        "conditions": {
            "date": {
                "after": "بعد",
                "before": "قبل",
                "between": "بين",
                "empty": "فارغ",
                "equals": "تساوي",
                "not": "ليس",
                "notBetween": "ليست بين",
                "notEmpty": "ليست فارغة"
            },
            "number": {
                "between": "بين",
                "empty": "فارغة",
                "equals": "تساوي",
                "gt": "أكبر من",
                "gte": "أكبر وتساوي",
                "lt": "أقل من",
                "lte": "أقل وتساوي",
                "not": "ليست",
                "notBetween": "ليست بين",
                "notEmpty": "ليست فارغة"
            },
            "string": {
                "contains": "يحتوي",
                "empty": "فاغ",
                "endsWith": "ينتهي ب",
                "equals": "يساوي",
                "not": "ليست",
                "notEmpty": "ليست فارغة",
                "startsWith": " تبدأ بـ "
            }
        },
        "button": {
            "0": "فلاتر البحث",
            "_": "فلاتر البحث (%d)"
        },
        "deleteTitle": "حذف فلاتر"
    },
    "searchPanes": {
        "clearMessage": "ازالة الكل",
        "collapse": {
            "0": "بحث",
            "_": "بحث (%d)"
        },
        "count": "عدد",
        "countFiltered": "عدد المفلتر",
        "loadMessage": "جارِ التحميل ...",
        "title": "الفلاتر النشطة"
    },
    "infoThousands": ",",
    "datetime": {
        "previous": "السابق",
        "next": "التالي",
        "hours": "الساعة",
        "minutes": "الدقيقة",
        "seconds": "الثانية",
        "unknown": "-",
        "amPm": [
            "صباحا",
            "مساءا"
        ],
        "weekdays": [
            "الأحد",
            "الإثنين",
            "الثلاثاء",
            "الأربعاء",
            "الخميس",
            "الجمعة",
            "السبت"
        ],
        "months": [
            "يناير",
            "فبراير",
            "مارس",
            "أبريل",
            "مايو",
            "يونيو",
            "يوليو",
            "أغسطس",
            "سبتمبر",
            "أكتوبر",
            "نوفمبر",
            "ديسمبر"
        ]
    },
    "editor": {
        "close": "إغلاق",
        "create": {
            "button": "إضافة",
            "title": "إضافة جديدة",
            "submit": "إرسال"
        },
        "edit": {
            "button": "تعديل",
            "title": "تعديل السجل",
            "submit": "تحديث"
        },
        "remove": {
            "button": "حذف",
            "title": "حذف",
            "submit": "حذف",
            "confirm": {
                "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
            }
        },
        "error": {
            "system": "حدث خطأ ما"
        },
        "multi": {
            "title": "قيم متعدية",
            "restore": "تراجع"
        }
    },
    "processing": "جارٍ المعالجة..."
}
                @endif




        } );
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
