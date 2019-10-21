<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        return view('work.index');
    }

    public function upload(Request $request)
    {
       
    }

    public function add()
    {

    }
}
