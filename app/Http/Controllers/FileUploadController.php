<?php

namespace App\Http\Controllers;

use App\Work;

class FileUploadController extends Controller
{

    public function index()
    {
        return view('work.index');
    }

    public function test()
    {
        $work = Work::all();
        dd($work);
    }

    public function add()
    {
        $work = Work::find(1);
        $course =  $work->course;
        $work = new Work;
        $work->name = '课堂练习';
        $work->course_id = $course->id;
        $reslut = $work->save();
    }
}
