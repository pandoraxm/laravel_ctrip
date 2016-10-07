@extends('admin.base.base')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body class="">
    <div class="form-group">
        <div class="col-md-4 col-md-offset-5 bt"><span class="glyphicon glyphicon-picture"></span>修改景点信息</div>
    </div>
    <div class="">
        <form action="/admin/scenic/{{ $list->id }}/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">名称:</div>
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control input-lg" placeholder="请输入景点名称" value="{{ $list->name }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">价格:</div>
                <div class="col-md-3">
                    <input type="text" name="pirce" class="form-control input-lg" placeholder="请输入价格" value="{{ $list->pirce }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">时间:</div>
                <div class="col-md-3">
                    <input type="text" name="date" class="form-control input-lg" placeholder="请输入旅游时间" value="{{ $list->date }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">天数:</div>
                <div class="col-md-3">
                    <input type="text" name="days_num" class="form-control input-lg" placeholder="请输入天数" value="{{ $list->days_num }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">状态:</div>
                <div class="col-md-3 dbt">
                    <input type="radio" name="status" value="1" {{ ($list->status == "1")?"checked":"" }}>显示&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" {{ ($list->status == "0")?"checked":"" }}>不显示
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">归类:</div>
                <div class="col-md-3 dbt">
                    <select name="pid" class="form-control input-lg">
                        @foreach( $sql as $k)
                        <option value="{{ $k->id }}" {{ ($list->pid == $k->id)? "selected" : "" }} >{{ $k->dd }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-1 col-md-offset-4 ebt">描述:</div>
                <div class="col-md-3">
                    <textarea name="scontent" class="form-control" cols="30" rows="6" placeholder="请输入景点的描述">{{ $list->scontent }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-5"><button class="input-lg btn-success">确认修改</button></div>
            </div>
        </form>
    </div>

<!-- 此处引入jQuery -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</body>
@endsection