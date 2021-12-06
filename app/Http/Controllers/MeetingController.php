<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings=Meeting::orderBy('id','ASC')->paginate(10);
        return view('backend.meetings.index')->with('meetings',$meetings);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.meetings.create');
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
            'description'=>'string|required',
            'meeting_date' => 'required|date_format:d/m/Y',
            'meeting_time' => 'required|date_format:G:i',
        ],[],[
            'description'=> __('meeting.description'),
            'meeting_date' =>  __('meeting.meeting_date'),
            'meeting_time' =>  __('meeting.meeting_time'),
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
            $status=Meeting::create($data);
            if($status){
                request()->session()->flash('success',__('meeting.success_added'));
            }
            else{
                request()->session()->flash('error',__('meeting.error_added'));
            }
        }
        return redirect()->route('meetings.read');
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting=Meeting::findOrFail($id);
        return view('backend.meetings.show')->with('meeting',$meeting);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meeting=Meeting::findOrFail($id);
        return view('backend.meetings.edit')->with('meeting',$meeting);
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
        $meeting=Meeting::findOrFail($id);
        $validator =Validator::make($request->all(),
        [
            'description'=>'string|required',
            'meeting_date' => 'required|date_format:d/m/Y',
            'meeting_time' => 'required|date_format:G:i',
        ],[],[
            'description'=> __('meeting.description'),
            'meeting_date' =>  __('meeting.meeting_date'),
            'meeting_time' =>  __('meeting.meeting_time'),
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
            $status=$meeting->fill($data)->save();
            if($status){
                request()->session()->flash('success',__('meeting.success_update'));
            }
            else{
                request()->session()->flash('error',__('meeting.error_update'));
            }
        }
        return redirect()->route('meetings.read');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Meeting::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success',__('meeting.success_delete'));
        }
        else{
            request()->session()->flash('error',__('meeting.success_delete'));
        }
        return back();
    }
}
