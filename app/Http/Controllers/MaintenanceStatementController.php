<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\MaintenanceStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaintenanceStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =Auth::user();
        $maintenance_statements  = $user->can('read_maintenance_statements')?MaintenanceStatement::orderBy('id','ASC')->paginate(10) : MaintenanceStatement::where('building_id',$user->building_id)->orderBy('id','ASC')->paginate(10);
        return view('backend.maintenance_statements.index')->with('maintenance_statements',$maintenance_statements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings =Building::get(['id','name']);
        return view('backend.maintenance_statements.create')->with('buildings',$buildings);
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
            'price'=>'required|numeric',
            'maintenance_date' => 'required|date_format:d/m/Y',
            'description'=>'string|required',
            'photo'=>'string|nullable',
            'technician_name'=>'string|required|max:100',
            'technician_phone'=>'string|required|max:30',

        ],[],[
            'price'=> __('maintenance_statement.price'),
            'maintenance_date'=> __('maintenance_statement.maintenance_date'),
            'description'=> __('maintenance_statement.description'),
            'photo'=> __('maintenance_statement.photo'),
            'technician_name'=> __('maintenance_statement.technician_name'),
            'technician_phone'=> __('maintenance_statement.technician_phone'),
        ]);
        // traitement des building
        $user = Auth::user();
        $building_id =$user->can('read_maintenance_statements')?   $request->building_id : $user->building_id;
        $data=$request->all();
        $data['building_id']=$building_id;
        $status=MaintenanceStatement::create($data);
        if($status){
            request()->session()->flash('success',__('maintenance_statement.success_added'));
        }
        else{
            request()->session()->flash('error',__('maintenance_statement.error_added'));
        }
        return redirect()->route('maintenance_statements.read');
    }


     /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance_statement=MaintenanceStatement::findOrFail($id);
        return view('backend.maintenance_statements.show')->with('maintenance_statement',$maintenance_statement);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance_statement=MaintenanceStatement::findOrFail($id);
        return view('backend.maintenance_statements.edit')->with('maintenance_statement',$maintenance_statement);
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
        $maintenance_statement=MaintenanceStatement::findOrFail($id);
        $validator =Validator::make($request->all(),
        [
            'price'=>'required|numeric',
            'maintenance_date' => 'required|date_format:d/m/Y',
            'description'=>'string|required',
            'photo'=>'string|nullable',
            'technician_name'=>'string|required|max:100',
            'technician_phone'=>'string|required|max:30',

        ],[],[
            'price'=> __('maintenance_statement.price'),
            'maintenance_date'=> __('maintenance_statement.maintenance_date'),
            'description'=> __('maintenance_statement.description'),
            'photo'=> __('maintenance_statement.photo'),
            'technician_name'=> __('maintenance_statement.technician_name'),
            'technician_phone'=> __('maintenance_statement.technician_phone'),
        ]);

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->all() as $error) {
                $errors[] = $error;
            }
            request()->session()->flash('error',implode(",", $errors));
            return back()->withInput($request->all());
        } else {

            $data=$request->all();
            $status=$maintenance_statement->fill($data)->save();
            if($status){
                request()->session()->flash('success',__('maintenance_statement.success_update'));
            }
            else{
                request()->session()->flash('error',__('maintenance_statement.error_update'));
            }
        }
        return redirect()->route('maintenance_statements.read');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance_statement=MaintenanceStatement::findOrFail($id);
        $status=$maintenance_statement->delete();
        if($status){
            request()->session()->flash('success',__('maintenance_statement.success_delete'));
        }
        else{
            request()->session()->flash('error',__('maintenance_statement.success_delete'));
        }
        return back();
    }

}
