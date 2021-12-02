<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 22:57:01
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-29 23:16:35
 */


namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Service;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$userIP = $_SERVER['REMOTE_ADDR'];//get ip address
        $userIP = request()->ip();
        date_default_timezone_set('Asia/Dhaka');//get timezone
        $timeDate = date('Y-m-d h:i:sa'); // time date
        Visitor::insert(['ip_address'=>$userIP, 'visit_time'=>$timeDate]);

        //service
        $servicesData = json_decode(Service::all());

        //course
        $coursesData = json_decode(Course::orderBy('id','desc')->limit(6)->get());

        return view('home',compact('servicesData', 'coursesData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
