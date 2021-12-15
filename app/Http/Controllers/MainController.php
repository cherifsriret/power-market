<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'name'=>'string|required|max:30|unique:users',
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



        $building_nbr = trim($request->building);
        $building = Building::where('name',$building_nbr)->first();
        //check if owners_association_president && building exist
        if($request->user_type == 'owners_association_president' && $building != null)
        {
            request()->session()->flash('error',' ! المبنى مسجل سابقا. اما ان تسجل كمالك أو مستأجر في هذا المبنى أو تغير رقم العمارة');
            return back()->withInput($request->all());
        }

        //check if tenant owner,owners &&  building not exist
        if( ($request->user_type == 'tenant' || $request->user_type == 'owner' ) && $building == null)
        {
            request()->session()->flash('error',' ! المبنى غير مسجل سابقا. اما ان تسجل كرئيس اتحاد ملاك في هذا المبنى أو تغير رقم العمارة');
            return back()->withInput($request->all());
        }
        if($building == null)
        {
            $building=new  Building();
            $building->name=$building_nbr;
            $building->save();
        }

        $data=$request->all();
        $data['password']=Hash::make($request->password);
        $data['role']='admin';
        $data['status']='inactive';
        $data['building_id']=$building->id;
        $status=User::create($data);
        Session::put('user',$data['email']);
        if($status){

            //associer le role
            $status->assignRole($request->user_type);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $auth = Auth::user();
                $request->session()->regenerate();
            }
            request()->session()->flash('success','تم التسجيل في الموقع بنجاح, في انتظار تفعيل الحساب');
            return redirect()->route('main.home');
        }
        else{
            request()->session()->flash('error',' ! حدث خطأ في التسجيل');
            return back()->withInput($request->all());
        }
    }
}
