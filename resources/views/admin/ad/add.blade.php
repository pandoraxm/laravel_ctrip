@extends('admin.base.base')


@section('content')

<div id="content" class="col-lg-10 col-sm-10">

    <div class="row">
		<div class="box col-md-12">
    	    <div class="box-inner">
    	        <div class="box-header well" data-original-title="">
                	<h2><i class="glyphicon glyphicon-edit"></i> 广告添加</h2>

    	        </div>
    	        <div class="box-content col-md-6">

                	<form role="form" action="{{ URL('admin/add') }}" method="post" enctype="multipart/form-data">
                	    <div class="form-group">
                	        <label class="control-label" for="Name">广告名称</label>
                	        &nbsp;&nbsp;&nbsp;
                	        <input type="text" class="form-control" id="Name" name="aname" placeholder="请输入广告名称">
                	    </div>

						<div class="form-group">
							<label class="control-label checkbox-iniline" for="#">是否展示</label>
								&nbsp;&nbsp;&nbsp;
							<input type="radio" name="status" value="0">不展示 &nbsp;&nbsp;
                			<input type="radio" name="status" value="1" checked>展示
						</div>

                	    <div class="form-group form-inline">
                	        <label class="control-label" for="InputPicture">上传广告图片</label>
                	        &nbsp;&nbsp;&nbsp;
                	        <input type="file" name="file" class="form-control" id="InputPicture">
                    	</div>

						<div class="form-group form-inline">
							<label class="control-label chckbox-iniline">广告描述</label>
							&nbsp;&nbsp;&nbsp;
							<textarea name="msg" class="form-control" cols="55" rows="3" placeholder="请输入200字以内的描述"></textarea>
						</div>

                    	{{ csrf_field() }}
                    	<input type='hidden' name='name' value="advert">
                        <button type="submit" class="btn btn-success"><b>提&nbsp;交</b></button> 
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="reset" class="btn btn-default"><b>清&nbsp;空</b></button>
                	</form>
	
    	        </div>
    	    </div>
    	</div>
    </div>
</div> 

@endsection