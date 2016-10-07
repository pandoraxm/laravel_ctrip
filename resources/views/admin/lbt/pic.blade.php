@extends('admin.base.base')

@section('content')

<head>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
    <script type="text/javascript">
        function doDel(id){
            if(confirm("确定要删除吗？")){
                var form = document.myform;
                form.action = '/admin/lbt/'+id;
                form.submit();
            }
        }
    </script>

</head>
<body>
    <div class="container" style="width:95%;">
        <div class="row">
            <div style="font-size:30px;text-align:center;"><span class="glyphicon glyphicon-th-list"></span>轮播图管理</div>
            <div style="float:left;"><a href="/admin/lbt/create" class="btn btn-warning">添加新图片</a></div>
            <form action="/admin/sx" class="form-inline" method="post" style="float:right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="text" name="name" size="10" class="form-control" placeholder="请输入图片名称">
                <input type="submit" class="btn btn-primary" value="查询">
            </form>
            <form action="/admin/lbt" method="post" name="myform" style="display:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
            </form>
            @if($ilist == null)
            <h2 class="text-center">暂无播放图</h2>
            @else
            <table class="table table-bordered table-hover" style="margin-top:50px;">
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-1">图片名</th>
                    <th class="col-md-2">预览</th>
                    <th class="col-md-1">展示</th>
                    <th class="col-md-4">操作</th>
                </tr>
                @foreach ($ilist as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->pname }}</td>
                    <td><img src="../../picture/{{$v->pname}}" style="width:100px;height:50px;"></td>
                    <td>
                        <a href="lbt/{{ $v->id }}">
                            @if($v->status == 1)
                            <span class="glyphicon glyphicon-ok" style="color:greenyellow;"></span>
                            @else
                            <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                            @endif
                        </a>
                    </td>
                    <td>
                        <div class="col-md-3">
                            <a href='javascript:doDel({{ $v->id }})' class="btn btn-danger btn-block">删除</a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/lbt/{{ $v->id }}/edit" class="btn btn-success btn-block">编辑</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            @endif
            {!! $ilist->appends($where)->render() !!}
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>

@endsection