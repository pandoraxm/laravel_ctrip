@extends('admin.base.base')

@section('content')
<head>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
    <script type="text/javascript">
        function doDel(id){
            if(confirm("确定要删除吗？")){
                var form = document.myform;
                form.action = '/admin/scenic/'+id+'/img_del/';
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container" style="width:95%;">
        <div class="row">
            <div style="font-size:30px;text-align:center;"><span class="glyphicon glyphicon-th-large"></span>图片管理</div>
            <div style="float:left;">
                <a href="/admin/scenic/img_create/{{ $id }}" class="btn btn-warning">添加图片</a>
            </div>
            <div style="float:rigth;">
                <a href="/admin/scenic/trip/{{ $sid }}" class="btn btn-warning">返回</a>
            </div>
            <form action="/admin/scenic/trip" method="post" name="myform" style="display:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
            </form>
            <table class="table table-bordered table-hover" style="margin-top:50px;">
                <tr>
                    <th class="col-md-1">名称</th>
                    <th class="col-md-1">预览</th>
                    <th class="col-md-2">介绍</th>
                    <th class="col-md-1">显示</th>
                    <th class="col-md-3">操作</th>
                </tr>
            @foreach( $list as $kl )
                <tr>
                    <td>{{ $kl->name }}</td>
                    <td colspan="1">
                        <img src="../../../../picture/{{ $kl->name }}" style="width:180px;height:80px;">
                    </td>
                    <td>{{ $kl->img_name }}</td>
                    <td>
                        <a href="/admin/scenic/{{ $kl->id }}/img_change">
                            @if($kl->status==1)
                            <span class="glyphicon glyphicon-ok" style="color:greenyellow;"></span>
                            @else
                            <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                            @endif
                        </a>
                    </td>
                    <td>
                        <div class="col-md-6">
                            <a href="/admin/scenic/img_edit/{{ $kl->id }}" class="btn btn-success btn-block">编辑名称</a>
                        </div>
                        <div class="col-md-6">
                            <a href='javascript:doDel({{ $kl->id }})' class="btn btn-danger btn-block">删除</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
@endsection