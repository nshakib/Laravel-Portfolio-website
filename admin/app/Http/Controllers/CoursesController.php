<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-01 22:58:12
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-10 12:26:06
 */

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses');
    }

    //get course data
    public function getCourseData(){
        $result = json_encode(Course::orderBy('id','desc')->get());
        return $result;
    }

    //course details
    public function getCourseDetails(Request $request){
        $id = $request->input('id');
        $result = Course::where('id', '=', $id)->get();
        return $result;
    }

    //course delete
    public function CourseDelete(Request $request){
        $id = $request->input('id');
        $result = Course::where('id','=',$id)->delete();

        if($result == true){
            return 1;
        }else{
            return 0;
        }
    }
//course update
    public function CourseUpdate(Request $request){
        $id = $request->input('id');

        $course_name = $request->input('course_name');
        $course_des = $request->input('course_des');
        $course_fee = $request->input('course_fee');
        $course_totalenroll = $request->input('course_totalenroll');
        $course_totalclass = $request->input('course_totalclass');
        $course_link = $request->input('course_link');
        $course_img = $request->input('course_img');
        
        $result = Course::where('id','=',$id)->update([
            'course_name'=>$course_name,
            'course_des'=>$course_des,
            'course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'course_img'=>$course_img,

        ]);

        if($result == true){
            return 1;
        }else{
            return 0;
        }
    }

    //course add
    public function CourseAdd(Request $request){

        $course_name = $request->input('course_name');
        $course_des = $request->input('course_des');
        $course_fee = $request->input('course_fee');
        $course_totalenroll = $request->input('course_totalenroll');
        $course_totalclass = $request->input('course_totalclass');
        $course_link = $request->input('course_link');
        $course_img = $request->input('course_img');

        $result = Course::insert([
            'course_name'=>$course_name,
            'course_des'=>$course_des,
            'course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'course_img'=>$course_img,

        ]);

        if($result ==true){
            return 1;
        }else{
            return 0;
        }
    }
}
