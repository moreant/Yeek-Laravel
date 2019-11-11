<?php

namespace App\Http\Controllers;

use App\Course;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::orderBy('id', 'abs')->where('end', '>=', date('Y-m-d'))->with('course')->paginate(10);
        // dd($works);
        return view('work.index', [
            'title' => '进行中',
            'works' => $works,
        ]);
    }

    public function all()
    {
        $works = Work::orderBy('id', 'abs')->with('course')->paginate(10);
        // dd($works);
        return view('work.index', [
            'title' => '全部作业',
            'works' => $works,
        ]);
    }

    public function console()
    {
        $courses = Course::get();
        $works = Work::orderBy('id', 'abs')->with('course')->paginate(10);
        return view('work.console', [
            'title' => '控制台',
            'works' => $works,
            'courses' => $courses,
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->input('work');
        $id = DB::table('works')->insertGetId(
            [
                'name' => $data['name'],
                'course_id' => $data['course'],
                'start' => $data['start'],
                'end' => $data['end'],
                'upload' => $data['upload'],
                'remarks' => $data['remarks'],
            ]
        );
        if ($id) {
            return redirect('work/console')->with([
                'type' => 'success',
                'title' => '添加',
                'msg' => 'id 为 ' . $request->id . ' 的作业',
            ]);
        } else {
            return redirect('work/console')->with([
                'type' => 'danger',
                'title' => '失败',
                'msg' => '新增',
            ]);
        }
    }

    function update(Request $request)
    {
        $data = $request->input('work');
        $result = DB::table('works')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $data['name'],
                    'course_id' => $data['course'],
                    'start' => $data['start'],
                    'end' => $data['end'],
                    'upload' => $data['upload'],
                    'remarks' => $data['remarks'],
                ]
            );
        if ($result) {
            return redirect('work/console')->with([
                'type' => 'success',
                'title' => '更新',
                'msg' => 'id 为 ' . $request->id . ' 的作业',
            ]);
        }
    }

    function delete(Request $request)
    {
        $result = DB::table('works')
            ->where('id', $request->id)
            ->delete();
        if ($result) {
            return redirect('work/console')->with([
                'type' => 'success',
                'title' => '删除',
                'msg' => ' id 为 ' . $request->id . ' 的作业',
            ]);
        } else {
            return redirect('work/console')->with([
                'type' => 'danger',
                'title' => '失败',
                'msg' => '删除',
            ]);
        }
    }

    public function test()
    {
        return redirect('work/')->with([
            'type' => 'success',
            'title' => '成功',
            'msg' => '添加',
        ]);
    }

    public function info($id)
    {
        // dd($request);
        return response()->json(Work::with('course')->find($id));
    }
}
