@extends('layouts.work')

@section('title')
{{ $title }}
@endsection

{{-- 模态框 --}}
@section('modal')
@component('common.modal')

@slot('header')
<h4 class="modal-title">删除</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
@endslot

@slot('body')
<h3>确定要删除</h3>
<h4>
    <span id="delCourse"></span>
    <span id="delName" class="text-success"></span>

</h4>
@endslot

@slot('footer')
<a id="delDo" href="#"><button type="button" class="btn btn-outline-danger">删除</button></a>
@endslot

@endcomponent
@endsection

{{-- 正文 --}}
@section('content')
<div class="card">
    <div class="card-header h4"> {{ $title }}</div>
    <div class="card-body">
        <div class="">
            <h3 id="title">&nbsp新增&nbsp</h3>
            </h3>
            <form class="form-inline" action="{{ url('work/save') }}">
                {{ csrf_field() }}
                <div class="form-group col-lg-3">
                    <label>作业</label>
                    <input id="name" type="text" name="work[name]" class="form-control w-100" placeholder="作业">
                </div>
                <div class="form-group col-lg-3">
                    <label>科目</label>
                    <select id="course" name="work[course]" class="form-control w-100">
                        @forelse ($courses as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                        <option>加载出错</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label>开始</label>
                    <input id="start" type="date" name="work[start]" class="form-control w-100" placeholder="开始">
                </div>
                <div class="form-group col-lg-3">
                    <label>结束</label>
                    <input id="end" type="date" name="work[end]" class="form-control w-100" placeholder="结束">
                </div>
                <div class="form-group col-lg-3">
                    <label>上交</label>
                    <select id="upload" name="work[upload]" class="form-control w-100">
                        <option value="0">不需要</option>
                        <option value="1">需要</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>备注</label>
                    <input id="remarks" type="text" name="work[remarks]" class="form-control w-100" placeholder="备注">
                </div>
                <div class="form-group col-lg-3">
                    <label class="text-white">提交</label>
                    <button type="submit" class="btn btn-outline-primary w-100">提交</button>
                </div>
            </form>

        </div>
    </div>
</div>

<br><br>

<table class="table table-hover" style="min-width: 1000px">
    <thead>
        <tr>
            <th>#</th>
            <th>作业</th>
            <th>开始</th>
            <th>截止</th>
            <th>备注</th>
            <th>上交</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($works as $work)
        <tr>
            <td>{{ $work->id }}</td>
            <td>{!! $work->course->icon !!}{{ $work->name }}</td>
            <td>{{ substr($work->start,5) }}</td>
            <td>{{ substr($work->end,5) }}</td>
            <td>{{ $work->remarks }}</td>
            {{-- <td>{!! $work->upload == 0 ? '<div class="progress">
                    <div class="progress-bar bg-success" style="width:40%"><a class="text-light" href="#">4/56</a></div>
                  </div>' : '' !!}</td> --}}
            <td>
                @if ($work->upload)
                <a href="{{url('work/download').'/'.$work->id.'_'.$work->course->call_name}}">需要</a>
                @endif
            </td>
            <td>
                <a href="javascript:void(0)" onclick="update({{ $work->id }})">
                    修改</a>
                / <a href="#" onclick="del({{ $work->id }})" data-toggle="modal" data-target="#modal">
                    删除</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- 分页 -->
<div class="flex d-flex flex-row-reverse mt-3">
    {{ $works->onEachSide(5)->links() }}
</div>
<!-- end分页 -->
@endsection

@section('javasctipt')
@parent
<script>
    function update(id){
        $("#title").html("<span class='bg-info text-white'>&nbsp修改&nbsp</span>");
        $.get("{{ url('work/info') }}/" + id,
        function (data) {
            console.log(data)
            $("#name").val(data.name)
            $("#course").val(data.course_id)
            $("#start").val(data.start)
            $("#end").val(data.end)
            $("#upload").val(data.upload)
            $("#remarks").val(data.remarks)
            console.log($("[action='{{ url('work/save') }}']").attr('action','{{ url('work/update') }}/'+id))
        });
    }

    function del(id){
        $.get("{{ url('work/info') }}/" + id,
        function (data) {
            console.log(data)
            $("#delCourse").html(data.course.icon+data.course.name)
            $("#delName").html(data.name+"吗")
            $("#delDo").attr('href','{{ url('work/delete') }}/'+id)
        });
    }


</script>
@endsection