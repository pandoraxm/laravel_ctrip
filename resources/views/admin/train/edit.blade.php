@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			修改火车票信息
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">火车票信息管理</a></li>
            <li class="active">修改信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改火车票信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @foreach($ob as $obj)

                <form class="form-horizontal" action="{{URL('admin/train1')}}?tid={{$obj->tid}}" method="post" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">车次</label>
                      <div class="col-sm-4">
                        <input type="text" name="trainCode" readonly class="form-control" id="inputEmail3" value="{{ $obj->trainCode }}" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">类型</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="trainGrade" id="inputPassword3" value="{{ $obj->trainGrade }}" placeholder="Password">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">发站</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="startStation" id="inputPassword3" value="{{ $obj->startStation }}" placeholder="Password">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">到站</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="arriveStation" id="inputPassword3" value="{{ $obj->arriveStation }}" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">发时</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="startTime" id="inputPassword3" value="{{ $obj->startTime }}" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">到时</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="endTime" id="inputPassword3" value="{{ $obj->endTime }}" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">二等座价格</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="two_prc" id="inputPassword3" value="{{ $obj->two_prc }}" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">一等座价格</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="one_prc" id="inputPassword3" value="{{ $obj->one_prc }}" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">二等座余票</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="one_seat_cnt" id="inputPassword3" value="{{ $obj->one_seat_cnt }}" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">一等座余票</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="two_seat_cnt" id="inputPassword3" value="{{ $obj->two_seat_cnt }}" placeholder="Password">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
                      <div class="col-sm-4">
                      @if($obj->status=='1')
                      正常<input type="radio" id="status1" checked name="status" value="1">
                      停止<input type="radio" id="status2" name="status" value="2">
                      @else
                     正常<input type="radio" id="status1" name="status" value="1">
                     停止<input type="radio" id="status2" checked name="status" value="2">
                     @endif 
                        
                      </div>
                    </div>
                    @endforeach
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="reset" class="btn btn-danger btn-lg">重置</button>
                    </div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-primary btn-lg">确定</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
   
    