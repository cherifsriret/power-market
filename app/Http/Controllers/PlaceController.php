<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places=Place::orderBy('id','ASC')->paginate(10);
        return view('backend.places.index')->with('places',$places);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.places.create');
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
            'place_date' => 'required|date_format:d/m/Y',
            'place_time' => 'required|date_format:G:i',
        ],[],[
            'description'=> __('place.description'),
            'place_date' =>  __('place.place_date'),
            'place_time' =>  __('place.place_time'),
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
            $status=Place::create($data);
            if($status){
                request()->session()->flash('success',__('place.success_added'));
            }
            else{
                request()->session()->flash('error',__('place.error_added'));
            }
        }
        return redirect()->route('places.read');
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place=Place::findOrFail($id);
        return view('backend.places.show')->with('place',$place);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place=Place::findOrFail($id);
        return view('backend.places.edit')->with('place',$place);
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
        $place=Place::findOrFail($id);
        $validator =Validator::make($request->all(),
        [
            'description'=>'string|required',
            'place_date' => 'required|date_format:d/m/Y',
            'place_time' => 'required|date_format:G:i',
        ],[],[
            'description'=> __('place.description'),
            'place_date' =>  __('place.place_date'),
            'place_time' =>  __('place.place_time'),
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
            $status=$place->fill($data)->save();
            if($status){
                request()->session()->flash('success',__('place.success_update'));
            }
            else{
                request()->session()->flash('error',__('place.error_update'));
            }
        }
        return redirect()->route('places.read');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Place::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success',__('place.success_delete'));
        }
        else{
            request()->session()->flash('error',__('place.success_delete'));
        }
        return back();
    }
}
