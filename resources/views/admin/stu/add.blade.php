@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			类别信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">类别信息管理</a></li>
            <li class="active">添加类别信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加类别信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="/stu" method="post" onsubmit="return onck();">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputEmail3" name="uname" placeholder="username" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                      <div class="col-sm-4">
                        <input type="password" class="form-control"  name="upwd" id="upwd" placeholder="Password" value="">
                      </div>
                    </div>

					         <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                      <div class="col-sm-4">
                        <input type="password" class="form-control"  name="reupwd" id="reupwd" placeholder="Password" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
                      <div class="col-sm-4">
                        <input class="sex" id="radioSexMan" type="radio" name="sex" value="m">男 <input class="sex" id="radioSexWoman" type="radio" name="sex" value="w">女
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">年龄</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" name="age" placeholder="age" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
                      <div class="col-sm-4">
                        <input type="email" class="form-control" id="inputPassword3" name="email" placeholder="email" value="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">电话</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" name="tel"placeholder="tel" value="">
                      </div>
                    </div>

      				    
                  <div class="col-sm-offset-2 col-sm-1">
      						<input type="submit" class="btn btn-primary" value="添加">
                  </div>
        					
                  <div class="col-sm-1">
        						<button type="submit" class="btn btn-primary">重置</button>
        					</div>

            </form>
				      
              <div class="row"><div class="col-sm-12">&nbsp;</div></div>
              
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

        <script>

          function onck()
          {
            var aa = document.getElementById("upwd").value;
            var bb = document.getElementById("reupwd").value;

            if(aa == bb){
              return true;
            }
            alert("两次密码不一致");
            return false;
          }
        </script>
        
    @endsection
    