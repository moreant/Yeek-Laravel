@extends('layouts.work')

@section('link')
<link rel="stylesheet" href="{{asset('/static/fileinput/css/fileinput.css')}}">

{{-- csrf 令牌 --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('title')
{{ $title }}
@endsection



@section('content')

<div class="card">
    <div class="card-header h4">{{ $title }}</div>
    <div class="card-body">
        <p class="h3">为了方便我手工分类，请<span  class="text-danger"> 严格遵守 </span>下面的文件名格式</p>
        <p class="h4">学号+姓名+_+补交第某次作业 例：<span class="text-info">07180935莫奕基_14.zip</span></p>
        <p id="resp" class="h3"></p>
        <br>
        <div id="inputBox" class="p-3">
            <input id="input-work" name='file' type="file">
            <h4 id="modal-status" class="mt-3"></h4>
        </div>
        <div id="ListBox"></div>
    </div>
</div>

@endsection


@section('javasctipt')
@parent

<script src=" {{ asset("static/fileinput/js/fileinput.js") }} "></script>
<script src=" {{ asset("static/fileinput/js/zh.js") }} "></script>

<script>
    // 设置 CSRF 令牌
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // 定义上传框
    var fileinput = $("#input-work")

    // 初始化上传框
    fileinput.fileinput({
        theme: 'fas',
        language: 'zh',
        uploadUrl: '{{url('work / uploadFile')}}',
        uploadAsync: true, //默认异步上传
        // allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'jpg', 'rar'],
        uploadUrl: '{{url('work/bujiaoFile')}}',
        showPreview: false, //是否显示预览
        showCaption: true, //是否显示标题
        maxFileSize: 5120, // 限制大小
        enctype: 'multipart/form-data',
        browseClass: "btn btn-primary", //按钮样式
    });

    // ajax 上传中时
    fileinput.on("filepreajax", function () {
        $("#modal-status").text("文件上传中。。。");
    });

    // 上传完成时
    fileinput.on("fileuploaded", function (event, data, previewId, index) {
        // alert(data.response.result);
        $("#modal-status").text(data.response.result);
    });

    fileinput.on('fileselect', function(event, numFiles, label) {
        $.get("{{url('work/checkId')}}/" + label,
            function (data) {
                if(data.resp){
                    $("#resp").html("<p>失败</p><p>你选择的文件："+label+"</p>"+data.resp);
                    fileinput.fileinput('refresh');
                }else{
                    $("#resp").html("你选择的文件文件名 成功匹配 ,请上传");
                }
                
            });
    });
</script>
@endsection