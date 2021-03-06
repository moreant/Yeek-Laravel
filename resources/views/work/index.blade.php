@extends('layouts.work')

@section('link')
<link rel="stylesheet" href="{{asset('/static/fileinput/css/fileinput.css')}}">

{{-- csrf 令牌 --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
{{ $title }}
@endsection

{{-- 模态框 --}}
@section('modal')
@component('common.modal')

@slot('header')
<h4 class="modal-title">查询中。。。</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
@endslot

@slot('body')
<div class="h3"></div>
<br>
<div id="inputBox" class="p-3">
    <input id="input-work" name='file' type="file">
    <h4 id="modal-status" class="mt-3"></h4>
</div>
<div id="ListBox"></div>
@endslot

@slot('footer')
<button type="button" class="btn btn-outline-danger" data-dismiss="modal">关闭</button>
@endslot

@endcomponent
@endsection

{{-- 正文 --}}
@section('content')

<div class="card shadow">
    <div class="card-header h4">{{ $title }}</div>
    <div class="card-body table-responsive">
        <table class="table table-hover" style="min-width: 900px">
            <thead>
                <tr>
                    <th>#</th>
                    <th>科目</th>
                    <th>作业</th>
                    <th>开始</th>
                    <th>截止</th>
                    <th>备注</th>
                    <th class="text-center">操作</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                <tr>
                    <td>{{ $work->id }}</td>
                    <td>{!! $work->course->icon !!}{{$work->course->name}}</td>
                    <td>{{$work->name}}</td>
                    <td style="min-width:5em">{{ substr($work->start,5) }}</td>
                    <td style="min-width:5em">{{ substr($work->end,5) }}</td>
                    <td>{!! $work->remarks !!}</td>
                    <td class="text-center" style="min-width:8em">@if ($work->upload == 1)
                        <div class="btn-group btn-group-sm">
                            @if (strtotime($work->end)>strtotime(date("y-m-d")))
                            <a href="#" onclick="modal(true,{{ $work->id }})" data-toggle="modal" data-target="#modal">
                                上交</a>
                            <span class="ml-1 mr-1 text-black-50"> | </span>
                            @endif
                            <a href="#" onclick="modal(false,{{ $work->id }})" data-toggle="modal" data-target="#modal">
                                未交</a>
                            @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- 分页 -->
<div class="flex d-flex flex-row-reverse mt-3">
    {{ $works->onEachSide(5)->links() }}
</div>
<!-- end分页 -->

@endsection

@section('javasctipt')
@parent

<script src=" {{ asset("static/fileinput/js/fileinput.js") }} "></script>
<script src=" {{ asset("static/fileinput/js/zh.js") }} "></script>

<script>
    $("[role=navigation]").addClass("shadow")

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
        uploadUrl: '{{url("work/uploadFile")}}',
        uploadAsync: true, //默认异步上传
        // allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'jpg', 'rar'],
        showPreview: false, //是否显示预览
        showCaption: true, //是否显示标题
        maxFileSize: 204800, // 限制大小
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

    // 处理 上交 / 查询 
    function modal(type, id) {
        $(".modal-title").text('');
        $(".modal-body .h3").html('');
        $('#ListBox').html('');
        $("#modal-status").text('');
        if (type) {
            $(".modal-title").text('上交文件');
            $("#inputBox").show();
        } else {
            $(".modal-title").text('未交列表');
            $("#inputBox").hide();
        }
        $.get("{{url('work/info')}}/" + id,
            function (data) {
                $(".modal-body .h3").html(data.course.icon + ' ' + data.course.name + ' - ' + data.name);
                if (type) {
                    fileinput.fileinput('refresh', {
                        uploadUrl: '{{url("work/uploadFile")}}',
                        uploadExtraData: {
                            'info': JSON.stringify(data)
                        }
                    }).fileinput('clear');
                } else {
                    $.post("{{url('work/fileList')}}/", {
                            'info': JSON.stringify(data)
                        },
                        function (data) {
                            $.each(data.fileList, function (i, val) {
                                $('#ListBox').append('<p>' + val + '</p>')
                            });
                        });
                }
            });
    }

</script>
@endsection
