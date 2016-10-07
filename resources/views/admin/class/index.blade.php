@extends('admin.base.base')

@section('content')
<body>
    <div class="container" style="width:100%;">
        <div class="row">
            <div class="" style="font-size:50px;text-align:center">分类管理</div>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>分类名</th>
                        <th>pid</th>
                        <th>path</th>
                        <th>是否显示</th>
                        <th>相关操作
                            @foreach( $lists as $vs )
                            <a href="/admin/class/{{ $vs->pid }}" class="btn btn-warning btn-sm" style="margin-left:150px;">返回父类</a>
                            @endforeach()
                        </th>
                    </tr>
                    @foreach($list as $vl)
                    <tr>
                        <td>{{ $vl->id }}</td>
                        <td>{{ $vl->name }}</td>
                        <td>{{ $vl->pid }}</td>
                        <td>{{ $vl->path }}</td>
                        <td>
                            <a href="/admin/class/{{ $vl->id }}/change">
                                @if($vl->status == 1)
                                <span class="glyphicon glyphicon-ok" style="color:greenyellow;"></span>
                                @else
                                <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                                @endif
                            </a>
                        </td>
                        <td>
                            <a href="/admin/class/{{ $vl->id }}" class="btn btn-info">查看子类</a>
                            <a href="/admin/class/create/{{ $vl->id }}" class="btn btn-success">添加子类</a>
                            <a href="/admin/class/edit/{{ $vl->id }}" class="btn btn-primary">编辑</a>
                            <a href="/admin/class/del/{{ $vl->id }}" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
        </div>
    </div>
</body>
@endsection