<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaintenanceCompanyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenanceCompanies=MaintenanceCompany::orderBy('id','ASC')->paginate(10);
        return view('backend.maintenance_companies.index')->with('maintenanceCompanies',$maintenanceCompanies);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.maintenance_companies.create');
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
            'address'=>'string|required',
            'phone'=>'string|required',
            'responsable'=>'string|required',
            'maps'=>'string|required',
            'photo'=>'string|required',
        ],[],[
            'name'=> __('maintenance_company.description'),
            'address'=> __('maintenance_company.address'),
            'phone'=> __('maintenance_company.phone'),
            'responsable'=> __('maintenance_company.responsable'),
            'maps'=> __('maintenance_company.maps'),
            'photo'=> __('maintenance_company.photo'),
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
            $status=MaintenanceCompany::create($data);
            if($status){
                request()->session()->flash('success',__('maintenance_company.success_added'));
            }
            else{
                request()->session()->flash('error',__('maintenance_company.error_added'));
            }
        }
        return redirect()->route('maintenance_companies.read');
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $maintenanceCompany=MaintenanceCompany::findOrFail($id);
        return view('backend.maintenance_companies.show')->with('maintenanceCompanies',$maintenanceCompany);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $maintenanceCompany=MaintenanceCompany::findOrFail($id);
        return view('backend.maintenance_companies.edit')->with('maintenance_company',$maintenanceCompany);
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
       $maintenanceCompany=MaintenanceCompany::findOrFail($id);
       $validator =Validator::make($request->all(),
       [
           'name'=>'string|required',
           'address'=>'string|required',
           'phone'=>'string|required',
           'responsable'=>'string|required',
           'maps'=>'string|required',
           'photo'=>'string|required',
       ],[],[
           'name'=> __('maintenance_company.description'),
           'address'=> __('maintenance_company.address'),
           'phone'=> __('maintenance_company.phone'),
           'responsable'=> __('maintenance_company.responsable'),
           'maps'=> __('maintenance_company.maps'),
           'photo'=> __('maintenance_company.photo'),
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
            $status=$maintenanceCompany->fill($data)->save();
            if($status){
                request()->session()->flash('success',__('maintenance_company.success_update'));
            }
            else{
                request()->session()->flash('error',__('maintenance_company.error_update'));
            }
        }
        return redirect()->route('maintenance_companies.read');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=MaintenanceCompany::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success',__('maintenance_company.success_delete'));
        }
        else{
            request()->session()->flash('error',__('maintenance_company.success_delete'));
        }
        return back();
    }
}
