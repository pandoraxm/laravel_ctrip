@extends('admin.base.base')

@section('content')
<head>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
    <script type="text/javascript">
        function doDel(id){
            if(confirm("确定要删除吗？")){
                var form = document.myform;
                form.action = '/admin/wz3/'+id+'/des/';
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container" style="width:95%;">
        <div class="row">
            <div style="font-size:30px;text-align:center;"><span class="glyphicon glyphicon-th-list"></span>文章管理</div>
            <div style="float:left;"><a href="/admin/wz1" class="btn btn-warning">添加</a></div>
            <form action="/admin/wz/show" class="form-inline" method="post" style="float:right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="text" name="name" size="10" class="form-control" placeholder="请输文章标题">
                <select name="type" class="form-control">
                    <option value="">-请选择-</option>
                    <option value="1">-精华-</option>
                    <option value="2">-热门-</option>
                    <option value="3">-推荐-</option>
                </select>
                <input type="submit" class="btn btn-primary" value="查询">
            </form>
            <form action="/admin/show" method="post" name="myform" style="display:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
            </form>
            @if($list == null)
            <h2 class="text-center">暂无图片</h2>
            @else
            @foreach ($list as $v)
            <table class="table table-bordered table-hover" style="margin-top:50px;">
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-1">标题</th>
                    <th class="col-md-3">描述</th>
                    <th class="col-md-1">归类</th>
                    <th class="col-md-1">状态</th>
                    <th class="col-md-1">略缩图</th>
                    <th class="col-md-4">操作</th>
                </tr>

                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->title }}</td>
                    <td>{{ $v->description }}</td>
                    <td>
                        @if($v->type == 1)
                        精华
                        @elseif($v->type == 2)
                        热门
                        @elseif($v->type == 3)
                        推荐
                        @endif
                    </td>
                    <td>
                        <p>
                            @if($v->status == 1)
                            <span class="glyphicon glyphicon-ok" style="color:greenyellow;"></span>
                            @else
                            <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                            @endif
                        <p>
                    </td>
                    <td><img src="../../picture/{{$v->img_name}}" style="width:150px;height:80px;"></td>
                    <td>
                        <div class="col-md-3">
                            <a href='javascript:doDel({{ $v->id }})' class="btn btn-danger btn-block">删除</a>
                        </div>
                        <div class="col-md-3">
                            <a href="/admin/wz/{{ $v->id }}/edit" class="btn btn-success btn-block">编辑</a>
                        </div>
                        <div class="col-md-3">
                            <a href="/home/wz?{{ $v->id }}" class="btn btn-primary btn-block">预览</a>
                        </div>
                    </td>

              
            </table>
            @endforeach
            @endif
            {!! $list->appends($where)->render() !!}
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
@endsection