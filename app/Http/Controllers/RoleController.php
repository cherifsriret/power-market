<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $authRoles = $user->roles->pluck("locked")->toArray();
        $roles = Role::where(function ($query) use($authRoles) {
            in_array(1, $authRoles) ? $query :
                $query->where("locked", 0);
        })->get();
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();

            $display_roles = [];
            foreach ($roles as $role) {
                $rolePermissions = $role->getAllPermissions()->pluck('name')->toArray();
                $lengthPermissions = count(array_diff($rolePermissions, $userPermissions));
                if ($lengthPermissions === 0) {

                    $display_roles[] = [
                        "name" => $role->display_name,
                        "usersCount" =>  User::whereHas("roles", function($query) use($role) { $query->where("id", $role->id); })->count(),
                        "slug" => $role->name,
                        "id" => $role->id,
                        "locked" => $role->locked
                    ];
                }
            }
        return view('backend.roles.index')->with('roles',$display_roles);;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $user = Auth::user();
            $subset = $user->getAllPermissions()->map(function ($user) {
                return collect($user->toArray())
                    ->only(['id', 'name','display_name'])
                    ->all();
            });
            $display_permissions = [];
            foreach ($subset as $permission) {
                $nameGroup = substr($permission["name"],strpos($permission["name"],"_"));
                if(!array_key_exists($nameGroup,$display_permissions))
                {
                    $display_permissions[$nameGroup] = [];
                    $parent_permission = Permission::findOrCreate("*".$nameGroup);
                    $display_permissions[$nameGroup][] = ["id" => $parent_permission->id, "name" => $parent_permission->name, "display_name" => $parent_permission->display_name];
                }
                if($permission["name"] !== "*".$nameGroup)
                $display_permissions[$nameGroup][] = ["id" => $permission["id"], "name" => $permission["name"], "display_name" => $permission["display_name"]];

            }
            return view('backend.roles.create', compact('display_permissions'));
        }
        catch (\Exception $e) {

            request()->session()->flash('error','Error occurred while adding role');
            return redirect()->route('roles.index');

        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),
        [
            'name'=>'string|required',
        ],[],[
            'visitor_name'=> __('role.role_name'),
        ]);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->all() as $error) {
                $errors[] = $error;
            }
            request()->session()->flash('error',implode(",", $errors));
            return back()->withInput($request->all());
        } else {

            try {
                $user = Auth::user();
                $roleSlug = Str::slug($request->name, '_');
                $newRole = Role::create(['name' => $roleSlug, 'display_name' => $request->name]);
                $userPermissions = $user->getPermissionsViaRoles()->pluck("name")->toArray();
                $arrayPermissions = array_diff_key($request->all(), array_flip((array) ["_token", "name"]));
                $newRole->syncPermissions(array_intersect($userPermissions , array_keys($arrayPermissions)));
                if ($newRole) {
                    request()->session()->flash('success',__('role.create_success'));
                    return redirect()->route('roles.index');
                } else {
                    request()->session()->flash('error',__('role.create_error'));
                    return redirect()->route('roles.index');
                }

        }
        catch (\Exception $e) {
            request()->session()->flash('error',__('role.create_error'));
            return redirect()->route('roles.index');
        }

        }



    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (Auth::user()->hasRole($role)) {
            abort(403);
        }
        try {
            $rolePermissions = $role->getAllPermissions()->pluck("name")->toArray();
            $user = Auth::user();
            $subset = $user->getAllPermissions()->map(function ($user) {
                return collect($user->toArray())
                    ->only(['id', 'name','display_name'])
                    ->all();
            });
            $display_permissions = [];
            foreach ($subset as $permission) {
                $nameGroup = substr($permission["name"],strpos($permission["name"],"_"));
                if(!array_key_exists($nameGroup,$display_permissions))
                {
                    $display_permissions[$nameGroup] = [];
                    $parent_permission = Permission::findOrCreate("*".$nameGroup);
                    $display_permissions[$nameGroup][] = ["id" => $parent_permission->id, "name" => $parent_permission->name, "display_name" => $parent_permission->display_name];
                }
                if($permission["name"] !== "*".$nameGroup)
                {
                    $checked = in_array($permission["name"], $rolePermissions) ? true : false;
                    $display_permissions[$nameGroup][] = ["id" => $permission["id"], "name" => $permission["name"], "display_name" => $permission["display_name"], "checked" => $checked];
                }
            }
            return view("backend.roles.edit", compact( 'display_permissions', 'role'));
        }
        catch (\Exception $e) {
            request()->session()->flash('error','Error occured while updating');
            return redirect()->route('roles.index');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator =Validator::make($request->all(),
        [
            'display_name'=>'string|required',
        ],[],[
            'visitor_name'=> __('role.role_name'),
        ]);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->all() as $error) {
                $errors[] = $error;
            }
            request()->session()->flash('error',implode(",", $errors));
            return back()->withInput($request->all());
        } else {
            try {
                $user = Auth::user();
                $roleSlug = Str::slug($request->name, '_');
                $role = Role::find($id);
                if (Auth::user()->hasRole($role)) {
                    request()->session()->flash('error',__('role.locked_role'));
                    return redirect()->route('roles.index');
                }

                $rolePermissions = $role->getAllPermissions()->pluck("name")->toArray();
                $userPermissions = $user->getPermissionsViaRoles()->pluck("name")->toArray();
                $role->update(["name" => $role->name, "display_name" => $request->display_name]);
                $arrayPermissions = array_diff_key($request->all(), array_flip((array) ["_method", "_token", "name", "oldUid"]));
                $role->syncPermissions(array_intersect($userPermissions , array_keys($arrayPermissions)));
                request()->session()->flash('success',__('role.update_success'));
                return redirect()->route('roles.index');
            }
            catch (\Exception $e) {
                request()->session()->flash('error',__('role.update_error'));
                return redirect()->route('roles.index');
            }
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::findorFail($id);
        $countPermissions = User::whereHas("roles", function ($query) use ($role) {
            $query->where("id", $role->id);
        })->count();

        if ($countPermissions === 0 && (int) $role->locked === 0) {
            $status=$role->delete();
            if($status){
                request()->session()->flash('success',__('role.delete_success'));
            }
            else{
                request()->session()->flash('error',__('role.delete_fail'));
            }
        }
        else {
            request()->session()->flash('error',__('role.delete_fail'));
        }
        return redirect()->route('roles.index');

    }

}
