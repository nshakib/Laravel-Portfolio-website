<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 22:57:01
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-17 23:55:48
 */


namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Course;
use App\Models\Project;
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

        //project
        $projectData = json_decode(Project::orderBy('id', 'desc')->limit(5)->get());

        return view('home',compact('servicesData', 'coursesData','projectData'));
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

    public function ContactSend(Request $request)
    {
        $contact_name = $request->input('contact_name');
        $contact_mobile = $request->input('contact_mobile');
        $contact_email = $request->input('contact_email');
        $contact_msg = $request->input('contact_msg');

        $result = Contact::insert([
            'contact_name' => $contact_name,
            'contact_mobile' => $contact_mobile,
            'contact_email' => $contact_email,
            'contact_msg' => $contact_msg
        ]);

        if($result==true)
        {
            return 1;
        }else{
            return 0;
        }
    }
}
