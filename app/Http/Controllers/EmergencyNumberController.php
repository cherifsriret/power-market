<?php

namespace App\Http\Controllers;

use App\Models\EmergencyNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmergencyNumberController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emergencyNumbers=EmergencyNumber::orderBy('id','ASC')->paginate(10);
        return view('backend.emergency_numbers.index')->with('emergencyNumbers',$emergencyNumbers);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.emergency_numbers.create');
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
            'phone'=>'string|required',
        ],[],[
            'name'=> __('emergency_number.description'),
            'phone'=> __('emergency_number.phone'),
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
            $status=EmergencyNumber::create($data);
            if($status){
                request()->session()->flash('success',__('emergency_number.success_added'));
            }
            else{
                request()->session()->flash('error',__('emergency_number.error_added'));
            }
        }
        return redirect()->route('emergency_numbers.read');
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $emergencyNumber=EmergencyNumber::findOrFail($id);
        return view('backend.emergency_numbers.show')->with('emergencyNumbers',$emergencyNumber);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $emergencyNumber=EmergencyNumber::findOrFail($id);
        return view('backend.emergency_numbers.edit')->with('emergency_number',$emergencyNumber);
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
       $emergencyNumber=EmergencyNumber::findOrFail($id);
       $validator =Validator::make($request->all(),
       [
           'name'=>'string|required',
           'phone'=>'string|required',
       ],[],[
           'name'=> __('emergency_number.description'),
           'phone'=> __('emergency_number.phone'),
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
            $status=$emergencyNumber->fill($data)->save();
            if($status){
                request()->session()->flash('success',__('emergency_number.success_update'));
            }
            else{
                request()->session()->flash('error',__('emergency_number.error_update'));
            }
        }
        return redirect()->route('emergency_numbers.read');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=EmergencyNumber::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success',__('emergency_number.success_delete'));
        }
        else{
            request()->session()->flash('error',__('emergency_number.success_delete'));
        }
        return back();
    }
}
