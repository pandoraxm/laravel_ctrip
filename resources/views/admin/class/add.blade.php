@extends('admin.base.base')

@section('content')
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
<body>
    <div class="row" style="width:100%">
    <div class="" style="font-size:30px;text-align:center;">添加分类</div >
        <form action="/admin/class/add" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4">分类名:</div>
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control input-lg" placeholder="请输入分类名">
                </div>
            </div>
            @foreach($da as $vb)
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4">父ID:</div>
                <div class="col-md-3">
                    <input type="text" name="pid" class="form-control input-lg" value="{{ $vb->pid }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4">路径:</div>
                <div class="col-md-3">
                    <input type="text" name="path" class="form-control input-lg" value="{{ $vb->path }}" readonly>
                </div>
            </div>
            @endforeach
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5">
                    <input type="submit" value="确认添加" class="input-lg">
                </div>
            </div>
        </form>
    </div>
@endsection