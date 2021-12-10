<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function home(){
        return view('main.pages.index');
    }

    public function register(){
        return view('main.pages.register');
    }
    public function registerSubmit(Request $request){

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
        ]);

        $data=$request->all();
        $data['password']=Hash::make($request->password);
        $data['role']='admin';
        $data['status']='inactive';
        $status=User::create($data);
        Session::put('user',$data['email']);
        if($status){
            request()->session()->flash('success','تم التسجيل في الموقع بنجاح, في انتظار تفعيل الحساب');
            return redirect()->route('main.home');
        }
        else{
            request()->session()->flash('error',' ! حدث خطأ في التسجيل');
            return back();
        }
    }
}
