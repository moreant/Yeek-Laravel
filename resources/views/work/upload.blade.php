@extends('common.layouts')

@section('title','上传作业')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="card">
    <div class="card-header h4">{{ $title }}</div>
    <div class="card-body table-responsive">
        <form method="post" action="{{ url('work/upload') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input class="" type="file" name="work" id="work">
            <button type="submit" class="btn btn-primary">上交</button>
        </form>
    </div>
</div>
@endsection