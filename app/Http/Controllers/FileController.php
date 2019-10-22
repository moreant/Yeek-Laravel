<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    /**
     * 处理文件上传
     */
    public function input(Request $request)
    {
        // 接收传进来 json 类型的 Work 信息
        $info = json_decode($request->input('info'));
        $file = $request->file('file');
        if ($file->isValid()) {
            // 目录例子: work/42_swift
            $dir = 'work/' . $info->id . '_' . $info->course->call_name;
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs($dir, $file, $fileName);
            return response()->json(['result' => '上传成功']);
        } else {
            return response()->json(['result' => '上传失败', 'code' => $request->file('')]);
        }
    }
}
