@extends('admin.base.base')


@section('content')
<!-- Content Header  (Page header) -->
    <section class="content-header">
      <h1>
        信息类别输出表
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">类别信息</a></li>
        <li class="active">级联操作</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form id="fid" class="form-inline">
            
        </form>
        
    </section><!-- /.content -->
    
@endsection

@section('myscript')
    <script type="text/javascript">
          function loadDistrict(upid){
             $.ajax({
                url:"{{URL('admin/district')}}/"+upid,
                type:"get",
                dataType:"json",
                async:true,
                success:function(data){
                    if(data.length<1){
                        return;
                    }
                    var select = "<select class=\"form-control\">";
                    select += "<option>-请选择-</option>";
                    for(var i=0;i<data.length;i++){
                        select += "<option value='"+data[i].id+"'>";
                        select += data[i].name;
                        select += "</option>";
                    }
                    select +="</select>";
                    //添加
                    //$("#fid").append(select);
                    $(select).change(function(){
                                $(this).nextAll("select").remove();
                                var id = $(this).find("option:selected").val();
                                loadDistrict(id);
                          }).appendTo("#fid");
                },
             });
          }
          
          loadDistrict(0);
          
          /*
          $("#fid select.form-control").change(function(){
                var id = $(this).find("option:selected").val();
                loadDistrict(id);
          });
          */
    </script>
@endsection