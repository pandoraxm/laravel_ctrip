<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
   	<link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
	<style>
		*{font-family: 微软雅黑;}
	</style>
</head>
<body>
<div style="width:1366px;height:662px;background:url(../css/12.jpg);">
<div class="container">
  <center>
      <form action="{{ URL('enroll/enroll') }}" method="post" onsubmit="return check();">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br><br>
        <fieldset style="width:300px">
          <legend>携程会员注册</legend>  

        <div class="form-group">
            <label for="" class="control-label">用户名</label>
            <input type="text" class="form-control" name="uname" id="username"placeholder="输入用户名username" value="">
        </div>

        <div class="form-group">
            <label for="" class="control-label">密码</label>
            <input type="password" class="form-control " name="upwd" id="upwd" placeholder="输入密码password" value="">
        </div>

		    <div class="form-group">
            <label for="" class="control-label">确认密码</label>
            <input type="password" class="form-control " name="reupwd" id="reupwd" placeholder="确认密码password" value="">
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="control-label">邮箱</label>
            <input type="email" class="form-control " name="email" placeholder="请输入邮箱 email" value="">
        </div>
        <div class="form-group">
            <label for="" class="control-label">电话</label>
            <input type="text" class="form-control " name="tel" id="tel" placeholder="请输入有效电话号码tel" value="">
        </div>


          <input type="submit" class="btn btn-control" value="注册">
          <button type="submit" class="btn btn-control">取消</button>

        </fieldset>
      </form>
    </center>
</div>

</div>

</body>
<script>
    function check()
    {
      var aa = document.getElementById('upwd').value;
      var bb = document.getElementById('reupwd').value;
      var name = document.getElementById('username').value;
      var tel = document.getElementById('tel').value;
   
    if (username.value.match(/^[\u4E00-\u9FA5a-zA-Z0-9_]{3,10}$/) == null) {
      alert("请输入3-10位用户名");
      return false;
    }

    if (upwd.value.match(/^\w{6,18}$/) == null) {
          alert("请输入6-18位密码");
          return false;
        }


    if(aa != bb){
      alert('两次密码不一致');
      return false;
      }
    }


</script>
</html>