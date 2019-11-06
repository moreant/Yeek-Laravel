<?php

namespace App\Http\Controllers;

use Exception;
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

    public function getFileList(Request $request)
    {
        $studentId = ["05180842", "06181248", "07180901", "07180902", "07180903", "07180904", "07180905", "07180906", "07180907", "07180908", "07180909", "07180910", "07180911", "07180912", "07180913", "07180914", "07180915", "07180916", "07180917", "07180918", "07180919", "07180920", "07180921", "07180922", "07180923", "07180924", "07180925", "07180926", "07180927", "07180928", "07180929", "07180930", "07180931", "07180932", "07180933", "07180934", "07180935", "07180936", "07180937", "07180938", "07180939", "07180940", "07180941", "07180942", "07180943", "07180944", "07180945", "07180946", "07180947", "07180948", "07180949", "07180950", "07180951", "07180952", "07180953", "07180954"];
        $info = json_decode($request->input('info'));
        $dir = 'work/' . $info->id . '_' . $info->course->call_name;

        $files = Storage::files($dir);
        if (empty($files)) {
            return response()->json(['fileList' => array('文件夹为空')]);
        }

        $i = 0;
        $list = [];
        $notUpload = [];
        foreach ($files as $fileItem) {
            preg_match("/\d{8}/", $fileItem, $match);
            // var_dump($match);
            if (!empty($match)) {
                $list[$i] = $match[0];
                $i++;
            }
        }
        if (empty($list)) {
            array_push($notUpload, '暂无合法上交');
            return response()->json(['fileList' => $notUpload]);
        }
        foreach ($studentId as $id) {
            if (!in_array($id, $list)) {
                array_push($notUpload, $id);
            }
        }
        array_push($notUpload, count($notUpload));
        return response()->json(['fileList' => $notUpload]);
    }
}
