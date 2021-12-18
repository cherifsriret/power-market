<?php

namespace App\Http\Controllers;

use App\Models\StaticComplaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticComplaintController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user =Auth::user();
        $static_complaints= $user->can('read_users')?StaticComplaint::where('user_id','!=',null)->orderBy('id','ASC')->paginate(10) : StaticComplaint::where('user_id','!=',null)->where('building_id',$user->building_id)->orderBy('id','ASC')->paginate(10);
        return view('backend.static_complaints.index')->with('static_complaints',$static_complaints);
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCustomers()
    {
        $static_complaints=StaticComplaint::where('user_id',null)->orderBy('id','ASC')->paginate(10);
        return view('backend.static_complaints.customers')->with('static_complaints',$static_complaints);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.static_complaints.create');
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
            'name'=>'string|required|max:50',
            'national_id'=>'string|required|max:50',
            'phone'=>'string|required|max:50',
            'email'=>'string|required',
            'address'=>'string|required',
            'description'=>'string|required',
        ],[],[
            'name'=> __('static_complaint.name'),
            'national_id'=> __('static_complaint.national_id'),
            'phone'=> __('static_complaint.phone'),
            'email'=> __('static_complaint.email'),
            'address'=> __('static_complaint.address'),
            'description'=> __('static_complaint.description'),
        ]);

        $user = Auth::user();
        $data=$request->all();
        $data['user_id']=$user->id;
        $data['building_id']=$user->building_id;
        $status=StaticComplaint::create($data);
        if($status){
            request()->session()->flash('success',__('static_complaint.success_added'));
            return redirect()->route('static_complaints.read');
        }
        else{
            request()->session()->flash('error',__('static_complaint.error_added'));
            return back()->withInput($request->all());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $static_complaint=StaticComplaint::findOrFail($id);
        return view('backend.static_complaints.edit')->with('static_complaint',$static_complaint);
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
        $static_complaint=StaticComplaint::findOrFail($id);

        $this->validate($request,
        [
            'name'=>'string|required|max:50',
            'national_id'=>'string|required|max:50',
            'phone'=>'string|required|max:50',
            'email'=>'string|required',
            'address'=>'string|required',
            'description'=>'string|required',
        ],[],[
            'name'=> __('static_complaint.name'),
            'national_id'=> __('static_complaint.national_id'),
            'phone'=> __('static_complaint.phone'),
            'email'=> __('static_complaint.email'),
            'address'=> __('static_complaint.address'),
            'description'=> __('static_complaint.description'),
        ]);

        $user = Auth::user();
        $data=$request->all();
        $data['user_id']=$user->id;
        $data['building_id']=$user->building_id;
        $status=$static_complaint->fill($data)->save();

        if($status){
            request()->session()->flash('success',__('static_complaint.success_update'));
            return redirect()->route('static_complaints.read');
        }
        else{
            request()->session()->flash('error',__('static_complaint.error_update'));
            return back()->withInput($request->all());
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
        $static_complaint=StaticComplaint::findOrFail($id);
        $status=$static_complaint->delete();
        if($status){
            request()->session()->flash('success',__('static_complaint.success_delete'));
        }
        else{
            request()->session()->flash('error',__('static_complaint.success_delete'));
        }
        return back();
    }
}
