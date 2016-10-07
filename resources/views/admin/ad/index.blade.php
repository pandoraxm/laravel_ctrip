@extends('admin.base.base')


@section('content')

<div id="content" class="col-lg-12 col-sm-12 col-md-12 ch-container">

    <div class="row">
        <div class="box col-lg-12 col-sm-12 col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-th"></i> 广告列表</h2>

                </div>

                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                            <tr>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-2">图片</th>
                                <th class="col-md-2">广告名称</th>
                                <th>广告内容</th>
                                <th class="col-md-1">显示</th>
                                <th class="col-md-1" style="text-align:center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($res as $k => $v) 
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td style="text-align:center;">
                                    <img src='{{ asset($v->image) }}' width="150"; height="90";>
                                </td>
                                <td class="center">{{ $v->aname }}</td>
                                <td class="center">{{ $v->msg }}</td>
                                <td class="center col-md-1">
                                    <a href="/admin/doedit/{{ $v->id }}" class="col-md-12">
                                        @if( $v->status == 0) 
                                            <span>不展示</span>
                                        @elseif ( $v->status == 1)
                                            <span>展示</span>
                                        @endif
                                    </a>
                                </td>
                                <td class="center" style="text-align:center">                       
                                    <a class="btn btn-danger" href="/admin/dodel/{{ $v->id }}">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                        删除
                                    </a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

    <!-- content ends -->
</div><!--/#content.col-md-0-->

@endsection