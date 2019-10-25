<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use ZipArchive;

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

    public function download(Request $request)
    {
        $dir = $request->dir;
        $files = Storage::files('work/' . $dir);
        if ($files) {
            return response()->download($this->zip($dir));
        } else {
            return redirect('work/console')->with([
                'type' => 'danger',
                'title' => '失败',
                'msg' => '文件夹为空或不存在',
            ]);
        }
    }

    public function zip($path)
    {
        $zip = new ZipArchive();
        $downPath = storage_path('app/work/download/');
        if (!file_exists($downPath)) {
            mkdir($downPath);
        }
        $zip_file = $downPath . $path . '.zip';
        $path = storage_path('app/work/' . $path);
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                // 用 substr/strlen 获取文件扩展名
                $relativePath = $path . '/' . substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return $zip_file;
    }
}
