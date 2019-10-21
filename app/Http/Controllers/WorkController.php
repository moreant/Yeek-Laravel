<?php

namespace App\Http\Controllers;

use App\Course;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::orderBy('id', 'abs')->with('course')->paginate(10);
        // dd($works);
        return view('work.index', [
            'title' => '全部作业',
            'works' => $works,
        ]);
    }

    public function create()
    {
        $courses = Course::get();
        return view('work.create', [
            'title' => '新增作业',
            'courses' => $courses,
        ]);
    }

    public function upload(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file('work');
            if ($file->isValid()) {
                $ori = $file->getClientOriginalName();
                // 扩展名
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();
                Storage::disk('public')->put($ori, file_get_contents($realPath));
                return redirect('work/upload/')->with([
                    'type' => 'success',
                    'title' => '成功',
                    'msg' => '文件上传成功',
                ]);;
                $fileName = Storage::putFile('photos', $file);
                echo $fileName;
                return Storage::download($fileName, 'download');
            }
        }

        return view('work.upload', [
            'title' => '上传作业',
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->input('work');
        $work = new Work();
        $work->name = $data['name'];
        $work->course_id = $data['course'];
        $work->start = $data['start'];
        $work->end = $data['end'];
        $work->need_upload = $data['upload'];
        $work->remarks = $data['remarks'];
        if ($work->save()) {
            return redirect('work/')->with([
                'type' => 'success',
                'title' => '成功',
                'msg' => '作业添加成功',
            ]);;
        } else {
            return redirect()->back();
        }
    }


    public function test()
    {


        // return Storage::download('');
    }

    public function info($id)
    {
        // dd($request);
        return response()->json(Work::with('course')->find($id));
    }
}
