@extends('common.layouts')

@section('link')

@endsection

@section('title')
{{ $title }}
@endsection




@section('content')

<!-- 模态框 -->
<div class="container">
    <!-- 模态框 -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- 模态框头部 -->
                <div class="modal-header">
                    <h4 class="modal-title">查询中。。。</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- 模态框主体 -->
                <div class="modal-body">
                    <div class="h3"></div>
                    <input type="file">
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

<div class="flex d-flex flex-row-reverse mt-3">
    {{ $works->onEachSide(5)->links() }}
</div>
@endsection

@section('javasctipt')
<script src=" {{ asset("static/fileinput/js/fileinput.min.js") }} "></script>
<script>

    function modal(i){
        $(".modal-title").text('');
        $(".modal-body .h3").html('');
        $.get("work/info/"+i,
        function(data){
            $(".modal-title").text('上交');
            $(".modal-body .h3").html(data.course.icon+' '+data.course.name+' - '+data.name);
            console.log(data);
        });
    }

    
</script>
@endsection