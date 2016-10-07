@extends('admin.base.base')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-5 bt"><span class="glyphicon glyphicon-picture"></span>修改行程</div>
    </div>
    <div>
        <form action="/admin/scenic/{{ $list->id }}/trip_update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="sid" value="{{ $list->sid }}">
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">天数:</div>
                <div class="col-md-3">
                    <input type="text" name="days" class="form-control input-lg" placeholder="请输入第几天行程" value="{{ $list->days }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">名称:</div>
                <div class="col-md-3">
                    <input type="text" name="title" class="form-control input-lg" placeholder="请输入行程名称" value="{{ $list->title }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">餐饮:</div>
                <div class="col-md-3">
                    <input type="text" name="eat" class="form-control input-lg" placeholder="请输入餐饮说明" value="{{ $list->eat }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4"></div>
                <div class="col-md-3">
                    <input type="radio" name="status" value="1" {{ ($list->status == "1")?"checked":"" }}>显示&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" {{ ($list->status == "0")?"checked":"" }}>不显示
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">标题:</div>
                <div class="col-md-3">
                    <input type="text" name="trip_title" class="form-control input-lg" placeholder="请输入行程的标题"  value="{{ $list->trip_title }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">描述:</div>
                <div class="col-md-3">
                <textarea name="trip" class="form-control" cols="30" rows="6" placeholder="请输入行程的描述" >{{ $list->trip }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 col-md-offset-5"><button class="input-lg btn-success">确认添加</button></div>
            </div>

        </form>
    </div>

<!-- 此处引入jQuery -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</body>
@endsection