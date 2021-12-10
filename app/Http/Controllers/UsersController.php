<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','ASC')->paginate(10);
        return view('backend.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        $authRoles = $user->roles->pluck("locked")->toArray();
        $roles = Role::where(function ($query) use ($authRoles) {
            in_array(1, $authRoles) ? $query :
                $query->where("locked", 0);
        })->get();
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        $display_roles = [];
        foreach ($roles as $role) {
            $rolePermissions = $role->getAllPermissions()->pluck('name')->toArray();
            $lengthPermissions = count(array_diff($rolePermissions, $userPermissions));
            if ($lengthPermissions === 0) {
                $display_roles[] = $role;
            }
        }
        return view('backend.users.create')->with('roles',$display_roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required|unique:users',
            'password'=>'string|required',
            'governorate'=>'string|required',
            'city'=>'string|required',
            'region'=>'string|required',
            'building'=>'string|required',
            'stage'=>'string|required',
            'apartment_number'=>'string|required',
            'user_type'=>'required|in:tenant,owner,owners_association_president',
            'role'=>'required',
            'status'=>'required|in:active,inactive',
        ],[],[
            'name'=> __('user.name'),
            'email'=> __('user.mail'),
            'password'=> __('user.password'),
            'governorate'=> __('user.governorate'),
            'city'=> __('user.city'),
            'region'=> __('user.region'),
            'building'=> __('user.building'),
            'stage'=> __('user.stage'),
            'apartment_number'=> __('user.apartment_number'),
            'user_type'=> __('user.user_type'),
            'status'=> __('global.status'),
        ]);
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        $data['role']='admin';
        $status=User::create($data);
        if($status){
            $user = Auth::user();
            $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
            $roles = $request->role;

           foreach ($roles as $role) {
                try {
                    $role = Role::find($role);
                } catch (\Exception $e) {
                    request()->session()->flash('error',__('user.error_added'));
                }
                $rolePermissions = $role->getAllPermissions()->pluck('name')->toArray();
                $lengthPermissions = count(array_diff($rolePermissions, $userPermissions));
                if ($lengthPermissions === 0) {

                    $status->assignRole($role);
                }
            }

            request()->session()->flash('success',__('user.success_added'));
        }
        else{
            request()->session()->flash('error',__('user.error_added'));
        }
        return redirect()->route('users.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_edit=User::findOrFail($id);
        $user_roles = $user_edit->roles->pluck('id')->toArray();
        $user = Auth::user();
        $authRoles = $user->roles->pluck("locked")->toArray();
        $roles = Role::where(function ($query) use ($authRoles) {
            in_array(1, $authRoles) ? $query :
                $query->where("locked", 0);
        })->get();
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        $display_roles = [];
        foreach ($roles as $role) {
            $rolePermissions = $role->getAllPermissions()->pluck('name')->toArray();
            $lengthPermissions = count(array_diff($rolePermissions, $userPermissions));
            if ($lengthPermissions === 0) {
                $display_roles[] = $role;
            }
        }
        return view('backend.users.edit')->with('user',$user_edit)->with('roles',$display_roles)->with('user_roles',$user_roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userToEdit=User::findOrFail($id);
        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required|unique:users,id,'.$userToEdit->id,
            'password'=>'string|nullable',
            'governorate'=>'string|required',
            'city'=>'string|required',
            'region'=>'string|required',
            'building'=>'string|required',
            'stage'=>'string|required',
            'apartment_number'=>'string|required',
            'user_type'=>'required|in:tenant,owner,owners_association_president',
            'role'=>'required',
            'status'=>'required|in:active,inactive',
        ],[],[
            'name'=> __('user.name'),
            'email'=> __('user.mail'),
            'password'=> __('user.password'),
            'governorate'=> __('user.governorate'),
            'city'=> __('user.city'),
            'region'=> __('user.region'),
            'building'=> __('user.building'),
            'stage'=> __('user.stage'),
            'apartment_number'=> __('user.apartment_number'),
            'user_type'=> __('user.user_type'),
            'status'=> __('global.status'),
        ]);
        $data=$request->all();
        $data['role']='admin';
        $data['password']=$request->password==""?$userToEdit->password:Hash::make($request->password);
        $status=$userToEdit->fill($data)->save();

        if($status){
            $authUser = Auth::user();
            $userPermissions = $authUser->getAllPermissions()->pluck('name')->toArray();
            $roles = $request->role;
            $rolesToBeAssinged = array_diff($userToEdit->roles->pluck("id")->toArray(), $authUser->roles->pluck("id")->toArray());

            if (in_array(1, $userToEdit->roles->pluck("locked")->toArray()) && in_array(1, $authUser->roles->pluck("locked")->toArray()) == false) {
                request()->session()->flash('error',__('user.error_update'));
            }

            if ($rolesToBeAssinged) {
                foreach ($rolesToBeAssinged as $role) {
                    try {
                        $role = Role::find($role);
                    } catch (\Exception $e) {
                        request()->session()->flash('error',__('user.error_update'));
                    }
                    $rolePermissions = $role->getAllPermissions()->pluck('name')->toArray();
                    $lengthPermissions = count(array_diff($rolePermissions, $userPermissions));
                    if ($lengthPermissions === 0 && in_array($role->id, $roles == true ? $roles : []) === false) {
                        $rolesToBeAssinged = array_diff($rolesToBeAssinged, [$role->id]);
                    }
                }
            }

            if ($roles) {
                foreach ($roles as $role) {
                    try {
                        $role = Role::find($role);
                    } catch (\Exception $e) {
                        request()->session()->flash('error',__('user.error_update'));
                    }
                    $rolePermissions = $role->getAllPermissions()->pluck('name')->toArray();
                    $lengthPermissions = count(array_diff($rolePermissions, $userPermissions));

                    if ($lengthPermissions === 0) {
                        $rolesToBeAssinged[] = $role->id;
                    }
                }
            }
            $userToEdit->syncRoles([]);
            if ($rolesToBeAssinged) {
                $rolesToBeAssinged = array_unique($rolesToBeAssinged);
                foreach ($rolesToBeAssinged as $role) {
                    $role = Role::find($role);
                    $userToEdit->assignRole($role);
                }
            }
            request()->session()->flash('success',__('user.success_update'));
        }
        else{
            request()->session()->flash('error',__('user.error_update'));
        }
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=User::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success',__('user.success_delete'));
        }
        else{
            request()->session()->flash('error',__('user.error_delete'));
        }
        return redirect()->route('users.index');
    }
}
