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
      <br><br>
      <form action="{{ URL('login/doLogin') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">      
        <fieldset style="width:300px">
          <legend>携程会员登录</legend>  
        @if(session('msg'))
         <p class="login-box-msg" style="color:red;">{{ session('msg') }}</p>
        @else
        <label for="" class="control-label">欢迎会员登录</label><br>
        @endif

        <div class="form-group">
            <label for="" class="control-label">用户名</label>
            <input type="text" class="form-control" name="uname">
        </div>

        <div class="form-group">
            <label for="" class="control-label">密码</label>
            <input type="password" class="form-control " name="upwd">
        </div>
		
        <div class="form-group">
            <label for="" class="control-label">验证码</label>
            <img src="{{ URL('/login/captcha/'.time()) }}" onclick="this.src='{{ URL('/login/captcha') }}/'+Math.random() ">
            <input type="text" name="code" class="form-control ">
        </div>
          

          <button type="submit" class="btn btn-control">登录</button>
          <button class="btn btn-control">取消</button>
        </fieldset>
      </form>
    </center>
</div>
</div>
</body>
</html>