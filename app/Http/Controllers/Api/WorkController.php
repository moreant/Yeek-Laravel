<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class WorkController extends Controller
{
    public function info(Request $request)
    {
        return response()->json([
            'code' => 20000,
            'data' => [
                [
                    'name' => "第三次作业",
                    'courseName' => "Swift",
                    'start' => "2020-02-03",
                    'end' => "2020-02-06",
                    'needUpload' => true,
                    'postTime' => "2020-02-06 18:30:23",
                    'postName' => "admin",
                    'postUpdate' => "2020-02-06 18:30:23",
                ],
                [
                    'name' => "第二次作业",
                    'courseName' => "Swift",
                    'start' => "2020-02-03",
                    'end' => "2020-02-06",
                    'needUpload' => true,
                    'postTime' => "2020-02-06 18:30:23",
                    'postName' => "admin",
                    'postUpdate' => "2020-02-06 18:30:23",
                ],
                [
                    'name' => "第六次作业",
                    'courseName' => "Swift",
                    'start' => "2020-02-03",
                    'end' => "2020-02-06",
                    'needUpload' => true,
                    'postTime' => "2020-02-06 18:30:23",
                    'postName' => "admin",
                    'postUpdate' => "2020-02-06 18:30:23",
                ],
            ]
        ]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        if ($file->isValid()) {
            // 目录例子: work/42_swift
            $dir = 'work/' . 'vue';
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs($dir, $file, $fileName);
            // return response()->json(['result' => '上传成功']);
        } else {
            // return response()->json(['result' => '上传失败', 'code' => $request->file('')]);
        }
    }
}
