@extends('admin.base.base')

@section('content')
<head>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-2.0.2.min.js')}}"></script>
    <script type="text/javascript">
        function doDel(id){
            if(confirm("确定要删除吗？")){
                var form = document.myform;
                form.action = '/admin/scenic/'+id+'/trip_del/';
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container" style="width:95%;">
        <div class="row">
            <div style="font-size:30px;text-align:center;"><span class="glyphicon glyphicon-th-large"></span>行程管理</div>
            <div style="float:left;">
                <a href="/admin/scenic/trip_create/{{ $id }}" class="btn btn-warning">添加行程</a>
            </div>
            <div style="float:rigth;">
                <a href="/admin/scenic/" class="btn btn-warning">返回</a>
            </div>
            <form action="/admin/scenic/trip" method="post" name="myform" style="display:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
            </form>
            @foreach( $list as $vb )
            <table class="table table-bordered table-hover" style="margin-top:50px;">
                <tr>
                    <th class="col-md-1">天数</th>
                    <td class="col-md-4">第{{ $vb->days }}天</td>
                    <th class="col-md-1">标题</th>
                    <td class="col-md-6">{{ $vb->title }}</td>
                </tr>

                <tr>
                    <th class="col-md-1">状态</th>
                    <td>
                        <a href="/admin/scenic/{{ $vb->id }}/trip_change">
                            @if($vb->tstatus==1)
                            <span class="glyphicon glyphicon-ok" style="color:greenyellow;"></span>
                            @else
                            <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                            @endif
                        </a>
                    </td>
                    <th class="col-md-1">餐饮</th>
                    <td>{{ $vb->eat }}</td>
                </tr>
                <tr>
                    <th>操作</th>
                    <td>
                        <div class="col-md-4">
                            <a href="/admin/scenic/trip_edit/{{ $vb->id }}" class="btn btn-success btn-block">编辑信息</a>
                        </div>
                        <div class="col-md-4">
                            <a href="/admin/scenic/trip_img/{{ $vb->id }}" class="btn btn-primary btn-block">图片管理</a>
                        </div>
                        <div class="col-md-4">
                            <a href='javascript:doDel({{ $vb->id }})' class="btn btn-danger btn-block">删除</a>
                        </div>
                    </td>
                    <th>行程标题</th>
                    <td>{{ $vb->trip_title }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        @foreach($lists as $cv)
                        @if($cv->tid == $vb->id)
                        <img src="../../../../picture/{{ $cv->name }}" style="width:180px;height:80px;">
                        @endif
                        @endforeach
                    </td>
                    <td colspan="3">{{ $vb->trip }}</td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
@endsection