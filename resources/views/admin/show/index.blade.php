@extends('admin.base.base')

@section('content')
<head>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
    <script type="text/javascript">
        function doDel(id){
            if(confirm("确定要删除吗？")){
                var form = document.myform;
                form.action = '/admin/show/'+id;
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container" style="width:95%;">
        <div class="row">
            <div style="font-size:30px;text-align:center;"><span class="glyphicon glyphicon-th-list"></span>展示页管理</div>
            <div style="float:left;"><a href="/admin/show/create" class="btn btn-warning">添加</a></div>
            <form action="/admin/show123" class="form-inline" method="post" style="float:right;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="text" name="name" size="10" class="form-control" placeholder="请输入图片名称">
                <select name="class" class="form-control">
                    <option value="">-请选择-</option>
                    <option value="1">-精选-</option>
                    <option value="2">-热门-</option>
                    <option value="3">-酒店-</option>
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
                    <th class="col-md-1">图片名</th>
                    <th class="col-md-1">一级标题</th>
                    <th class="col-md-1">标题说明</th>
                    <th class="col-md-1">归类</th>
                    <th class="col-md-1">展示</th>
                    <th class="col-md-4">操作</th>
                </tr>

                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->pic_name }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->name_er }}</td>
                    <td>
                        @if($v->class == 1)
                        精选
                        @elseif($v->class == 2)
                        热门
                        @elseif($v->class == 3)
                        酒店
                        @endif
                    </td>
                    <td>
                        <a href="show/{{ $v->id }}">
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
                            <a href="/admin/show/{{ $v->id }}/edit" class="btn btn-success btn-block">编辑</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><img src="../../picture/{{$v->pic_name}}" style="width:150px;height:80px;"></td>
                    <td colspan="4">
                        <div>{{ $v->title }}</div>
                        <div>{{ $v->title_er }}</div>
                        <div>{{ $v->title_san }}</div>
                        <div>{{ $v->title_si }}</div>
                    </td>
                </tr>
            </table>
            @endforeach
            @endif
            {!! $list->appends($where)->render() !!}
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
@endsection