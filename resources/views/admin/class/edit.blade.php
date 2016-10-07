@extends('admin.base.base')

@section('content')
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
<body>
    <div class="row" style="width:100%">
    <div class="" style="font-size:30px;text-align:center;">修改分类</div >
        <form action="/admin/class/{{ $list->id }}/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-md-1 col-md-offset-4">分类名:</div>
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control input-lg" value="{{ $list->name }}" placeholder="请输入分类名">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4">二级状态</div>
                <div class="col-md-3">
                    <input type="radio" name="display" value="1" {{ ($list->display == "0")?"checked":"" }}>不展示&nbsp;&nbsp;
                    <input type="radio" name="display" value="2" {{ ($list->display == "1")?"checked":"" }}>展示&nbsp;&nbsp;
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5">
                    <input type="submit" value="确认添加" class="input-lg">
                </div>
            </div>
        </form>
    </div>
@endsection