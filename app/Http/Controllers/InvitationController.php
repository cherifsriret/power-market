<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Share;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations=Invitation::orderBy('id','ASC')->paginate(10);
        return view('backend.invitations.index')->with('invitations',$invitations);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function our_invitation()
    {
        $user_id= Auth::user()->id;
        $invitations=Invitation::where('user_id',$user_id)->orderBy('id','ASC')->paginate(10);
        return view('backend.invitations.our_invitations')->with('invitations',$invitations);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.invitations.create');
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
            'visitor_name'=>'string|required',
            'visit_from_date' => 'required|date_format:d/m/Y',
            'visit_to_date' => 'required|date_format:d/m/Y',
            'visit_from_time' => 'required|date_format:G:i',
            'visit_to_time' => 'required|date_format:G:i',
            'visit_type'=>'required|in:single,multiple',
        ],[],[
            'visitor_name'=> __('invitation.visitor_name'),
            'visit_from_date' =>  __('invitation.visit_from_date'),
            'visit_to_date' =>  __('invitation.visit_to_date'),
            'visit_from_time' =>  __('invitation.visit_from_time'),
            'visit_to_time' =>  __('invitation.visit_to_time'),
            'visit_type'=> __('invitation.visit_type'),
        ]);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->all() as $error) {
                $errors[] = $error;
            }
            request()->session()->flash('error',implode(",", $errors));
            return back();
        } else {

            $data=$request->all();
            $user_id= Auth::user()->id;
            $data['user_id']=$user_id;
            $data['code']=Invitation::generateCode();
            $status=Invitation::create($data);
            if($status){
                request()->session()->flash('success',__('invitation.success_added'));
            }
            else{
                request()->session()->flash('error',__('invitation.error_added'));
            }
        }
        if(Auth::user()->can("read_invitations")){
            return redirect()->route('invitations.read');
        }
        else
        {
            return redirect()->route('invitations.read.our');
        }


    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invitation=Invitation::findOrFail($id);
        $url=route('invitations.show.qr',$id);
        $share_links=Share::page($url, __('invitation.invitation'))->facebook()->linkedin()->twitter()->whatsapp()->getRawLinks();
       return view('backend.invitations.show')->with('invitation',$invitation)->with('share_links',$share_links);
    }

 /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQr($id)
    {
        $invitation=Invitation::findOrFail($id);
        return view('backend.invitations.show_qr')->with('invitation',$invitation);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invitation=Invitation::findOrFail($id);
        return view('backend.invitations.edit')->with('invitation',$invitation);
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
        $invitation=Invitation::findOrFail($id);
        $validator =Validator::make($request->all(),
        [
            'visitor_name'=>'string|required',
            'visit_from_date' => 'required|date_format:d/m/Y',
            'visit_to_date' => 'required|date_format:d/m/Y',
            'visit_from_time' => 'required|date_format:G:i',
            'visit_to_time' => 'required|date_format:G:i',
            'visit_type'=>'required|in:single,multiple',
        ],[],[
            'visitor_name'=> __('invitation.visitor_name'),
            'visit_from_date' =>  __('invitation.visit_from_date'),
            'visit_to_date' =>  __('invitation.visit_to_date'),
            'visit_from_time' =>  __('invitation.visit_from_time'),
            'visit_to_time' =>  __('invitation.visit_to_time'),
            'visit_type'=> __('invitation.visit_type'),
        ]);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->all() as $error) {
                $errors[] = $error;
            }
            request()->session()->flash('error',implode(",", $errors));
            return back();
        } else {

            $data=$request->all();
            $data['user_id']=$invitation->user_id;
            $data['code']=$invitation->code;
            $status=$invitation->fill($data)->save();
            if($status){
                request()->session()->flash('success',__('invitation.success_update'));
            }
            else{
                request()->session()->flash('error',__('invitation.error_update'));
            }
        }
        if(Auth::user()->can("read_invitations")){
            return redirect()->route('invitations.read');
        }
        else
        {
            return redirect()->route('invitations.read.our');
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
        $delete=Invitation::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success',__('invitation.success_delete'));
        }
        else{
            request()->session()->flash('error',__('invitation.success_delete'));
        }
        return back();
    }

}
