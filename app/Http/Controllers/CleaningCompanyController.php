<?php

namespace App\Http\Controllers;

use App\Models\CleaningCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CleaningCompanyController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cleaningCompanies=CleaningCompany::orderBy('id','ASC')->paginate(10);
        return view('backend.cleaning_companies.index')->with('cleaningCompanies',$cleaningCompanies);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cleaning_companies.create');
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
            'cv'=>'string|nullable',
        ],[],[
            'name'=> __('cleaning_company.name'),
            'address'=> __('cleaning_company.address'),
            'phone'=> __('cleaning_company.phone'),
            'responsable'=> __('cleaning_company.responsable'),
            'maps'=> __('cleaning_company.maps'),
            'photo'=> __('cleaning_company.photo'),
            'cv'=> __('cleaning_company.cv'),
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
            $status=CleaningCompany::create($data);
            if($status){
                request()->session()->flash('success',__('cleaning_company.success_added'));
            }
            else{
                request()->session()->flash('error',__('cleaning_company.error_added'));
            }
        }
        return redirect()->route('cleaning_companies.read');
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $cleaningCompany=CleaningCompany::findOrFail($id);
        return view('backend.cleaning_companies.show')->with('cleaningCompanies',$cleaningCompany);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $cleaningCompany=CleaningCompany::findOrFail($id);
        return view('backend.cleaning_companies.edit')->with('cleaning_company',$cleaningCompany);
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
       $cleaningCompany=CleaningCompany::findOrFail($id);
       $validator =Validator::make($request->all(),
       [
           'name'=>'string|required',
           'address'=>'string|required',
           'phone'=>'string|required',
           'responsable'=>'string|required',
           'maps'=>'string|required',
           'photo'=>'string|required',
       ],[],[
           'name'=> __('cleaning_company.description'),
           'address'=> __('cleaning_company.address'),
           'phone'=> __('cleaning_company.phone'),
           'responsable'=> __('cleaning_company.responsable'),
           'maps'=> __('cleaning_company.maps'),
           'photo'=> __('cleaning_company.photo'),
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
            $status=$cleaningCompany->fill($data)->save();
            if($status){
                request()->session()->flash('success',__('cleaning_company.success_update'));
            }
            else{
                request()->session()->flash('error',__('cleaning_company.error_update'));
            }
        }
        return redirect()->route('cleaning_companies.read');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=CleaningCompany::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success',__('cleaning_company.success_delete'));
        }
        else{
            request()->session()->flash('error',__('cleaning_company.success_delete'));
        }
        return back();
    }
}
