@extends("admin.base.base")

@section("content")
	        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            机票信息管理
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">机票信息管理</a></li>
            <li class="active">浏览机票信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">机票信息管理</h3>
                   <h5 class="box-title"><small>共有<font color="red">{{ $ob->total() }}</font>次 航班信息</small></h5>
                </div>
                <div class="box-header with-border">
                 
                  <div style="float:left">
                  <form action="/admin/air" method="post" class="form-inline">
  
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>&nbsp;&nbsp;
                      <b>航班号&nbsp;&nbsp;</b> <input type="text" name="flightCode" class="form-control" size="12">&nbsp;&nbsp;&nbsp;&nbsp;
                      <b>出发城市&nbsp;&nbsp;</b> <input type="text" name="startCity" class="form-control" size="12">&nbsp;&nbsp;&nbsp;&nbsp;
                     <b>抵达城市&nbsp;&nbsp;</b> <input type="text" name="endCity" class="form-control" size="12">&nbsp;&nbsp;&nbsp;&nbsp;
                    <div style="float:right;margin-left:50px">
                      <button type="button" class="btn btn-warning btn-sm">
                        <i class="fa fa-arrow-up"></i>升序
                      </button>
                      <button type="button" class="btn btn-info btn-sm" >
                        <i class="fa fa-arrow-down"></i>降序
                      </button>&nbsp;&nbsp;
                      <input type="submit" class="btn btn-primary" >
                    </div>
                  </form>
                  </div>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <table class="table table-bordered">
                 
                    <tr>
                      <th>航空公司</th>
                      <th>航班号</th>
                      <th>机型</th>
                      <th>起飞时间</th>
                      <th>降落时间</th>
                      <th>起飞机场</th>
                      <th>降落机场</th>
                      <th>飞行时间</th>
                      <th>标准价格</th>
                      <th>准点率</th>
                      <th style="width: 200px">操作</th>
                    </tr>
                     @foreach($ob as $obj)
                    <tr>
                      <td>{{$obj->carrierCom}}</td>
                      <td>{{$obj->flightCode}}</td>
                      <td>{{$obj->planeType}}</td>
                      <td>{{$obj->departureTime}}</td>
                      <td>{{$obj->arrivalTime}}</td>
                      <td>{{$obj->departureAirport}}</td>
                      <td>{{$obj->arrivalAirport}}</td>
                      <td>{{$obj->costTime}}</td>
                      <td>{{$obj->planeMemo}}</td>
                      <td>{{$obj->correctness}}</td>
                      <td>
                          <a href="/admin/air3?&aid={{$obj->aid}}">
                          <button class="btn btn-danger">删除</button>
                          </a>
                          <a href="/admin/air1?aid={{$obj->aid}}"><button class="btn btn-primary">修改</button></a>

                         
                             @if($obj->status=='1')
                                <button class="btn btn-success">良好</button></a>
                             @else
                                <button class="btn btn-warning">停止</button></a>
                             @endif 
                         
                      </td>      
                    </tr>

                    @endforeach
                  </table>
                 {!! $ob->appends($where)->links() !!}
                </div><!-- /.box-body -->
               
                     
                     
                                     
              </div><!-- /.box -->
              
         
            </div><!-- /.col -->
           
          
          </div>
        </section><!-- /.content -->
@endsection
      