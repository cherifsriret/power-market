@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit User</h5>
    <div class="card-body">
      <form method="post" action="{{route('roles.update',$role->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name</label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$role->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="row">
            <div class="col-xl-12">
            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('role.permission.all') }}</th>
                        <th scope="col">{{ __('role.permission.read') }}</th>
                        <th scope="col">{{ __('role.permission.mine') }}</th>
                        <th scope="col">{{ __('role.permission.create') }}</th>
                        <th scope="col">{{ __('role.permission.edit') }}</th>
                        <th scope="col">{{ __('role.permission.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($display_permissions as $permission => $value)
                @php
                    $group = substr( $value[0]["name"],1);

                @endphp
                    <tr>
                        <th scope="row"><h5>{{ substr( $permission,1) }}</h5></th>
                        <td class="text-center">
                            <label class="checkbox checkbox-lg">
                                <input  type="checkbox" name="" id="{{$permission}}Parent" class="littleParent" onclick="checkCard(`{{$permission}}`)">
                                <span></span>
                            </label>
                        </td>

                    <td>
                            @if(count(array_filter($value,function($q)use($group){ return $q['name'] === 'read'.$group;})))
                                <label class="checkbox checkbox-lg">
                                    <input type="checkbox" class="{{$group}} child" name="{{ 'read'.$group }}" {{array_values(array_filter($value,function($q)use($group){ return $q['name'] === 'read'.$group;}))[0]["checked"] ? "checked" : false}}>
                                    <span></span>
                                </label>
                            @endif
                    </td>
                    <td>
                        @if(count(array_filter($value,function($q)use($group){ return $q['name'] === 'our'.$group;})))
                            <label class="checkbox checkbox-lg">
                                <input type="checkbox" class="{{$group}} child" name="{{ 'our'.$group }}" {{array_values(array_filter($value,function($q)use($group){ return $q['name'] === 'our'.$group;}))[0]["checked"] ? "checked" : false}}>
                                <span></span>
                            </label>
                        @endif
                    </td>
                    <td>
                            @if(count(array_filter($value,function($q)use($group){ return $q['name'] === 'create'.$group;})))
                                <label class="checkbox checkbox-lg">
                                    <input type="checkbox" class="{{$group}} child" name="{{ 'create'.$group }}" {{array_values(array_filter($value,function($q)use($group){ return $q['name'] === 'create'.$group;}))[0]["checked"] ? "checked" : false}}>
                                    <span></span>
                                </label>
                            @endif
                    </td>
                    <td>
                            @if(count(array_filter($value,function($q)use($group){ return $q['name'] === 'update'.$group;})))
                                <label class="checkbox checkbox-lg">
                                    <input type="checkbox" class="{{$group}} child" name="{{ 'update'.$group }}" {{array_values(array_filter($value,function($q)use($group){ return $q['name'] === 'update'.$group;}))[0]["checked"] ? "checked" : false}}>
                                    <span></span>
                                </label>
                            @endif
                    </td>
                    <td>
                            @if(count(array_filter($value,function($q)use($group){ return $q['name'] === 'delete'.$group;})))
                                <label class="checkbox checkbox-lg">
                                    <input type="checkbox" class="{{$group}} child" name="{{ 'delete'.$group }}" {{array_values(array_filter($value,function($q)use($group){ return $q['name'] === 'delete'.$group;}))[0]["checked"] ? "checked" : false}}>
                                    <span></span>
                                </label>
                            @endif
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script>

$(document).ready(function () {

$(".littleParent").each(function (e, i) {

    let myElement = $(i).closest("tr").find(".child");
    let countChild = myElement.length;
    let checkerCount = 0;

    myElement.each(function (e2, i2) {

        let checkedChild = $(i2).is(":checked");

        if ( checkedChild ) {
            checkerCount++;
        }

    });

    if ( countChild === checkerCount ) {

        $(this).prop("checked", true);

    }

    });
});


        $(document).on("change", ".child", function () {

            let countChild = $(this).closest("tr").find(".child").length;
            let checkedChild = $(this).closest("tr").find(".child:checked");
            let parent = $(this).closest("tr").find(".littleParent");

            if ( !parent.is(":checked") && countChild === checkedChild.length ) {
                parent.prop("checked", true).trigger("change");
            }
            else if ( parent.is(":checked") && countChild !== checkedChild.length ) {
                parent.prop("checked", false).trigger("change");
            }

        });
        $(document).on("change", ".littleParent", function () {

            let allLittleParents = $(this).closest(".card-columns").find(".littleParent").length;
            let allCheckedLittleParents = $(this).closest(".card-columns").find(".littleParent:checked");
            let bigParent = $("#bigParent");

            if ( !bigParent.is(":checked") && allCheckedLittleParents.length === allLittleParents ) {
                bigParent.prop("checked", true);
            }
            else if ( bigParent.is(":checked") && allCheckedLittleParents.length !== allLittleParents ) {
                bigParent.prop("checked", false);
            }

        });
        let checkCard = (name) => {

            let parent = $("#" + name + "Parent").is(":checked");
            $("." + name).each(function (e, i)  {
                $(this).prop("checked", parent);
            });

        };
        let checkAllCards = () => {

            let bigParent = $("#bigParent").is(":checked");

            $(".littleParent, .child").each(function (e, i)  {
                $(this).prop("checked", bigParent);
            });
        };
</script>
@endpush
