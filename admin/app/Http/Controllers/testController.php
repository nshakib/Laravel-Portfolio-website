<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2022-01-12 06:53:50
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-12 07:43:34
 */

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function getTestData()
    {
        $result = json_encode(Test::orderBy('id','desc')->get());
        return $result;
    }
}
