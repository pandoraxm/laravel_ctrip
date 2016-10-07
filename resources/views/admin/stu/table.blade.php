@extends("admin.base.base")

@section("content")
    <script type="text/javascript">

            function doDel(id){

                if(confirm("确定要删除吗？")){
                    $('form[name="myform"]').attr('action','/stu/'+id);
                    $('form[name="myform"]').submit();
                }
            }
    </script>


	        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息管理系统     
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">用户信息管理</a></li>
            <li class="active">浏览用户信息</li>
          </ol>
        </section>


        <form action="" method="post" name="myform" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
        </form>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">用户信息管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 50px">ID</th>
                      <th>用户名</th>
                      <th>性别</th>
                      <th>年龄</th>
                      <th>邮箱</th>
                      <th>电话</th>
                      <th>注册时间</th>
                      <th style="width: 200px">操作</th>
                    </tr>
                  
              @foreach($user as $value)
                    <tr>
                      <td>{{ $value->uid }}</td>
                      <td>{{ $value->uname }}</td>
                      <td>{{ $value->sex }}</td>
                      <td>{{ $value->age }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->tel }}</td>
                      <td>{{ $value->created_at }}</td>
                      <td><a class="btn btn-danger" href="javascript:doDel({{ $value->uid }})">删除</a>
                      <a class="btn btn-primary" href="/stu/{{ $value->uid }}/edit">修改</a></td>      
                    </tr>
              @endforeach
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->  
          </div>
        </section><!-- /.content -->

@endsection
