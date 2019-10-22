@extends('common.layouts')

@section('link')
<link rel="stylesheet" href="{{asset('/static/fileinput/css/fileinput.css')}}">
{{-- csrf 令牌 --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
{{ $title }}
@endsection

@section('content')

<!-- 模态框 -->
<div class="container">
    <!-- 模态框 -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog" style="margin-top: 30vh;min-width:40%">
            <div class="modal-content">

                <!-- 模态框头部 -->
                <div class="modal-header">
                    <h4 class="modal-title">查询中。。。</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- 模态框主体 -->
                <div class="modal-body">
                    <div class="h3"></div>
                    <br>
                    <div class="p-3">
                        <input id="input-work" name='file' type="file">
                        <h4 id="modal-status" class="mt-3"></h4>
                    </div>
                </div>

                <!-- 模态框底部 -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">关闭</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end 模态框 -->

<div class="card">
    <div class="card-header h4">{{ $title }}</div>
    <div class="card-body table-responsive">
        <table class="table table-hover" style="min-width: 1000px">
            <thead>
                <tr>
                    <th>#</th>
                    <th>作业</th>
                    <th>开始</th>
                    <th>截止</th>
                    <th>备注</th>
                    <th>选项</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                <tr>
                    <td>{{ $work->id }}</td>
                    <td>{!! $work->course->icon !!}{{ $work->name }}</td>
                    <td>{{ $work->start }}</td>
                    <td>{{ $work->end }}</td>
                    <td>{{ $work->remarks }}</td>
                    <td>@if ($work->need_upload == 1)
                        <a href="#" onclick="modal({{ $work->id }})" data-toggle="modal" data-target="#modal">上交</a> /
                        <a href="#">未交</a>
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
    var fileinput =  $("#input-work")
    function modal(i) {
        $(".modal-title").text('');
        $(".modal-body .h3").html('');
        $.get("work/info/" + i,
            function (data) {
                $(".modal-title").text('上交');
                $(".modal-body .h3").html(data.course.icon + ' ' + data.course.name + ' - ' + data.name);
                fileinput.fileinput('refresh', {
                    uploadUrl: '{{url('work/uploadFile')}}',
                     uploadExtraData: { 'info': JSON.stringify(data)}
                }).fileinput('clear');

            });
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    fileinput.fileinput({
        theme: 'fas',
        language: 'zh',
        uploadUrl: '{{url('work/uploadFile')}}',
        uploadAsync: true, //默认异步上传
        // allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'jpg', 'rar'],
        showPreview: false, //是否显示预览
        showCaption: true, //是否显示标题
        maxFileSize: 5120, // 限制大小
        enctype: 'multipart/form-data',
        browseClass: "btn btn-primary", //按钮样式
    });

    fileinput.on("filepreajax", function () {
        $("#modal-status").text("文件上传中。。。");
    });

    fileinput.on("fileuploaded", function (event, data, previewId, index) {
        // alert(data.response.result);
        $("#modal-status").text(data.response.result);
    });

</script>
@endsection