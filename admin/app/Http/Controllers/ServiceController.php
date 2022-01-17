<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-18 06:01:17
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-07 13:01:26
 */

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $des = $request->input('des');
        $img = $request->input('img');
        $result = Service::insert(['service_name'=>$name, 'service_des'=>$des,'service_img'=>$img]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $result = json_encode(Service::orderBy('id','desc')->get());
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $result = Service::where('id', '=', $id)->get();
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $service = new Service();
        // $service->name = $request->name;
        $id = $request->input('id');
        $name = $request->input('name');
        $des = $request->input('des');
        $img = $request->input('img');
        $result = Service::where('id', '=', $id)->update(['service_name'=>$name, 'service_des'=>$des,'service_img'=>$img]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
        // $service->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $result = Service::where('id', '=', $id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
