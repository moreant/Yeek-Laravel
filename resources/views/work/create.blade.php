@extends('common.layouts')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="card">
    <div class="card-header h4"> {{ $title }}</div>
    <div class="card-body">
        <form class="form-inline" action="{{ url('work/save') }}">
            {{ csrf_field() }}
            <div class="form-group col-lg-3">
                <label>作业</label>
                <input type="text" name="work[name]" class="form-control w-100" placeholder="作业">
            </div>
            <div class="form-group col-lg-3">
                <label>科目</label>
                <select name="work[course]" class="form-control w-100">
                    @forelse ($courses as $item)
                    <option value=" {{ $item->id }} ">{{ $item->name }}</option>
                    @empty
                    <option>加载出错</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group col-lg-3">
                <label>开始</label>
                <input type="date" name="work[start]" class="form-control w-100" placeholder="开始">
            </div>
            <div class="form-group col-lg-3">
                <label>结束</label>
                <input type="date" name="work[end]" class="form-control w-100" placeholder="结束">
            </div>
            <div class="form-group col-lg-3">
                <label>上交</label>
                <select name="work[upload]" class="form-control w-100">
                    <option value="0">不需要</option>
                    <option value="1">需要</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label>备注</label>
                <input type="text" name="work[remarks]" class="form-control w-100" placeholder="备注">
            </div>
            <div class="form-group col-lg-3">
                <label class="text-white">提交</label>
                <button type="submit" class="btn btn-outline-primary w-100">提交</button>
            </div>
        </form>

    </div>

</div>
</div>
@endsection