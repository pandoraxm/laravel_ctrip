@extends('admin.base.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			修改机票信息
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">机票信息管理</a></li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改机票信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @foreach($ob as $obj)

                <form class="form-horizontal" action="{{URL('admin/air1')}}?aid={{$obj->aid}}" method="post" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">航空号</label>
                      <div class="col-sm-4">
                        <input type="text" name="flightCode" readonly class="form-control" id="inputEmail3" value="{{ $obj->flightCode }}" placeholder="KN5988">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">航空公司</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" required name="carrierCom" id="inputPassword3" value="{{ $obj->carrierCom }}" placeholder="中国联航">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">机型</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="planeType" id="inputPassword3" value="{{ $obj->planeType }}" placeholder="波音 737-200/200(中)">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">起飞时间</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" required name="departureTime" id="inputPassword3" value="{{ $obj->departureTime }}" placeholder="06:40">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">降落时间</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" required name="arrivalTime" id="inputPassword3" value="{{ $obj->arrivalTime }}" placeholder="08:35">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">起飞机场</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" required name="departureAirport" id="inputPassword3" value="{{ $obj->departureAirport }}" placeholder="浦东国际机场T2">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">降落机场</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" required name="arrivalAirport" id="inputPassword3" value="{{ $obj->arrivalAirport }}" placeholder="南苑机场">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">标准价格</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" required name="planeMemo" id="inputPassword3" value="{{ $obj->planeMemo }}" placeholder="2230.00">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">准点率</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="correctness" id="inputPassword3" value="{{ $obj->correctness }}" placeholder="96.61%">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
                      <div class="col-sm-4">
                      @if($obj->status=='1')
                      正常<input type="radio" id="status1" checked name="status" value="1">
                      停飞<input type="radio" id="status2" name="status" value="2">
                      @else
                     正常<input type="radio" id="status1" name="status" value="1">
                     停飞<input type="radio" id="status2" checked name="status" value="2">
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
    
   
    