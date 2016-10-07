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

                <form class="form-horizontal" action="/stu/{{$data->uid}}" method="post">

                  <input type="hidden" name="_method" value="put">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="uanme" name="uname" value="{{ $data->uname}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="sex" name="sex" value="{{ $data->sex}}">
                      </div>
                    </div>
					           <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">年龄</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="age" name="age" value="{{ $data->age}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">邮箱</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="email" name="email" value="{{ $data->email}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">电话</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="tel" name="tel" value="{{ $data->email}}">
                      </div>
                    </div>


                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">修改</button>
                    </div>
					<div class="col-sm-1">
						<button class="btn btn-primary">重置</button>
					
          </div>
          </div><!-- /.box-footer -->
               
          </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <script src="{{asset('admins/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        //处理在线编辑器
        $(function () {
            var config = new Object();
            //config.image_previewText="";
            config.filebrowserImageUploadUrl="{{URL('admin/stu/upload')}}?_token={{csrf_token()}}";
            CKEDITOR.replace("editor1",config);
        });
    </script>
    @endsection
    