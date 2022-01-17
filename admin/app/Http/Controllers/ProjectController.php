<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-07 21:36:06
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-12 23:19:09
 */

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function projectIndex()
    {

        return view('projects');
    }

    public function getProjectData()
    {

        $result = json_encode(Project::orderBy('id','desc')->get());
        return $result;
    }

    public function getProjectDetails(Request $request)
    {
        $id = $request->input('id');
        $result = json_encode(Project::where('id', '=', $id)->get());
        return $result;
    }


    //project add
    public function projectAdd(Request $request){

        $name = $request->input('project_name');
        $des = $request->input('project_des');
        $link = $request->input('project_link');
        $img = $request->input('project_img');
        $result = Project::insert(['project_name'=>$name, 'project_des'=>$des,'project_link'=>$link,'project_img'=>$img]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    public function projectUpdate(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('project_name');
        $des = $request->input('project_des');
        $link = $request->input('project_link');
        $img = $request->input('project_img');
        $result = Project::where('id', '=', $id)->update(['project_name'=>$name, 'project_des'=>$des,'project_link'=>$link,'project_img'=>$img]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }


      //project delete
      public function projectDelete(Request $request){
        $id = $request->input('id');
        $result = Project::where('id','=',$id)->delete();

        if($result == true){
            return 1;
        }else{
            return 0;
        }
    }
}
