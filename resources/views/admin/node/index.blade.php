@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            节点操作表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">管理信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 操作节点信息管理</h3>
                  <button class="btn btn-primary" onclick="window.location='{{URL('admin/node/create')}}'">发布信息</button
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>节点名称</th>
                      <th>请求方式</th>
                      <th>请求地址</th>
                      <th>状态</th>
                      <th>添加时间</th>
                      <th>最后修改时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $vo)
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->name }}</td>
                            <td>{{ $vo->method }}</td>
                            <td>{{ $vo->url }}</td>
                            <td>{{ $vo->state }}</td>
                            <td>{{ date("Y-m-d",$vo->created_at) }}</td>
                            <td>{{ date("Y-m-d",$vo->updated_at) }}</td>
                            <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button> 
                               <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/node')}}/{{ $vo->id }}/edit'">编辑</button> </td>
                        </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $list->appends($where)->render() !!}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <form action="/node/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "{{URL('/admin/node')}}/"+id;
                    form.submit(); 
                }
              });
        }
    </script>
    @endsection