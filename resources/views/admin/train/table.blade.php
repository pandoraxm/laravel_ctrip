@extends("admin.base.base")

@section("content")
	        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息管理系统
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">火车票信息管理</a></li>
            <li class="active">浏览火车票信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">火车票信息管理</h3>
                   <h5 class="box-title"><small>共有<font color="red">{{ $ob->total() }}</font>趟 车次信息</small></h5>
                </div>
                <div class="box-header with-border">
                 
                  <div style="float:left">
                  <form action="/admin/train" method="post" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      车&nbsp;&nbsp;型:<a class="text-primary">不限</a>&nbsp;&nbsp;
                      G/高铁<input type="checkbox" class="checkboxClass" value="高速动车" name="trainGrade[]">&nbsp;&nbsp;
                      D/动车<input type="checkbox" class="checkboxClass" value="动车组" name="trainGrade[]">&nbsp;&nbsp;
                      普通<input type="checkbox" class="checkboxClass" value="空调快速" name="trainGrade[]">&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>&nbsp;&nbsp;
                      车次  <input type="text" name="trainCode" class="form-control" size="8">&nbsp;&nbsp;
                      出发站 <input type="text" name="startStation" class="form-control" size="8">&nbsp;&nbsp;
                      终点站 <input type="text" name="arriveStation" class="form-control" size="8">&nbsp;&nbsp;
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
                      <th style="width: 50px">车次</th>
                      <th>类型</th>
                      <th>发站</th>
                      <th>到站</th>
                      <th>发时</th>
                      <th>到时</th>
                      <th>运行时长</th>
                      <th>天数</th>
                      <th>价格</th>
                      <th>余票</th>
                      <th style="width: 200px">操作</th>
                    </tr>
                     @foreach($ob as $obj)
                    <tr>
                      <td>{{$obj->trainCode}}</td>
                      <td>{{$obj->trainGrade}}</td>
                      <td>{{$obj->startStation}}</td>
                      <td>{{$obj->arriveStation}}</td>
                      <td>{{$obj->startTime}}</td>
                      <td>{{$obj->endTime}}</td>
                      <td>{{$obj->takeTime}}</td>
                      <td>{{$obj->day_diff}}</td>
                      <td>一等座<div><font color="orangered">&yen;{{$obj->two_prc}}</font></div>
                       二等座<div><font color="orangered">&yen;{{$obj->one_prc}}</font></div></td>
                      <td>一等座<div>{{$obj->one_seat_cnt}}</div> 二等座<div>{{$obj->two_seat_cnt}}</div></td>
                      <td>
                          <a href="/admin/train3?&tid={{$obj->tid}}">
                          <button class="btn btn-danger">删除</button>
                          </a>
                          <a href="/admin/train1?tid={{$obj->tid}}"><button class="btn btn-primary">修改</button></a>

                         
                             @if($obj->status=='1')
                                <button class="btn btn-success">良好</button></a>
                             @else
                                <button class="btn btn-warning">停止</button></a>
                             @endif 
                         
                      </td>      
                    </tr>

                    @endforeach
                  </table>
                  <center>{!! $ob->appends($where)->links() !!}</center>
                <script>

                </script>
                </div><!-- /.box-body -->
                     
                     
                                     
              </div><!-- /.box -->
              
         
            </div><!-- /.col -->
           
          
          </div>
        </section><!-- /.content -->
@endsection
      