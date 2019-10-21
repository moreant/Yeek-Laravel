@extends('common.layouts')

@section('link')

@endsection

@section('title')
{{ $title }}
@endsection

@if(Session::has('type'))
@section('alert')
@component('common.message',[
'type' => Session::get('type'),
'title' => Session::get('title'),
'msg' => Session::get('msg')
])
@endcomponent
@endsection
@endif


@section('content')
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
                        <a href="#">上交</a> / 
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