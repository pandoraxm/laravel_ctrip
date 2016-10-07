@extends('admin.base.base')

@section('content')
<head>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
    <script type="text/javascript">
        function doDel(id){
            if(confirm("确定要删除吗？")){
                var form = document.myform;
                form.action = '/admin/scenic/'+id+'/del/';
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container" style="width:95%;">
        <div class="row">
            <div style="font-size:30px;text-align:center;"><span class="glyphicon glyphicon-th-large"></span>景点管理</div>
            <div style="float:left;"><a href="/admin/scenic/create" class="btn btn-warning">添加景点</a></div>
            <form action="/admin/scenic123" class="form-inline" method="post" style="float:right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="text" name="name" size="10" class="form-control" placeholder="请输景点名称">
                    <select name="pid" class="form-control">
                        <option value="">-请选择-</option>
                        @foreach( $sql as $k)
                        <option value="{{ $k->id }}">{{ $k->dd }}</option>
                        @endforeach
                    </select>
                    </select>
                <input type="submit" class="btn btn-primary" value="查询">
            </form>
            <form action="/admin/scenic" method="post" name="myform" style="display:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
            </form>
            @foreach( $list as $k)
            <table class="table table-bordered table-hover" style="margin-top:50px;">
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-1">所属分类</th>
                    <th class="col-md-4">名称</th>
                    <th class="col-md-1">时间</th>
                    <th class="col-md-1">天数</th>
                    <th class="col-md-1">价格(¥)</th>
                    <th class="col-md-1">展示</th>
                </tr>

                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->path_name }}</td>
                    <td>{{ $k->name }}</td>
                    <td>{{ $k->date }}</td>
                    <td>{{ $k->days_num }}天</td>
                    <td>{{ $k->pirce }}</td>
                    <td>
                        <a href="/admin/scenic/{{ $k->id }}/change">
                            @if($k->status == 1)
                            <span class="glyphicon glyphicon-ok" style="color:greenyellow;"></span>
                            @else
                            <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                            @endif
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><img src="../../picture/{{ $k->img_name }}" style="width:150px;height:80px;"></td>
                    <td colspan="2">{{ $k->scontent }}</td>
                    <td colspan="3">
                        <div class="col-md-6">
                            <a href="/admin/scenic/editx/{{ $k->id }}" class="btn btn-success btn-block">编辑信息</a>
                            <a href="/admin/scenic/editt/{{ $k->id }}" class="btn btn-success btn-block">编辑图片</a>
                        </div>
                        <div class="col-md-6">
                            <a href="/admin/scenic/trip/{{ $k->id }}" class="btn btn-warning btn-block">查看行程</a>
                            <a href='javascript:doDel({{ $k->id }})' class="btn btn-danger btn-block">删除</a>
                        </div>
                    </td>
                </tr>
            </table>
            @endforeach
            {!! $list->appends($where)->render() !!}
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
@endsection