<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>携程旅游  | 攻略推荐</title>
  <!-- <meta name="renderer" content="webkit"> -->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
	<link rel="stylesheet" href="{{asset('admins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('homes/assets/css/amazeui.min.css')}}">
  <link rel="stylesheet" href="{{asset('homes/assets/css/app.css')}}">
</head>

<body id="blog-article-sidebar">
<!-- header start -->
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">

</header>
<!-- header end -->


<!-- nav start -->
<nav class="am-g am-g-fixed blog-fixed blog-nav">
<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="blog-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li class="am-active"><a href="wz">首页</a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          首页布局 <span class="am-icon-caret-down"></span>
        </a>

      </li>
      <li><a href="wz1">标准文章</a></li>
      <li><a href="wz2">图片库</a></li>
    </ul>
    <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
   
    </form>
  </div>
</nav>
<!-- nav end -->
<hr>
<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
  <figure data-am-widget="figure" class="am am-figure am-figure-default "   data-am-figure="{  pureview: 'true' }">
      
	  <div id="container">   
		@foreach($list as $v)
          <div><img src="{{asset('picture')}}/{{$v->img_name}}"><h3>{{$v->sulg}}</h3></div>
		@endforeach
		@foreach($list as $v)
          <div><img src="{{asset('picture')}}/{{$v->img_name}}"><h3>{{$v->sulg}}</h3></div>
		@endforeach

    </div> 
	
  </figure>

</div>
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
       

    </div> 
<!-- content end -->
  <footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">
		<div class="blog-text-center">© 2016 bjxm, Inc. 携程在手,说走就走</div>
    </div>    
        
  </footer>


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{asset('homes/assets/js/jquery.min.js')}}"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="homes/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="{{asset('homes/assets/js/amazeui.min.js')}}"></script>
<script src="{{asset('homes/assets/js/pinto.min.js')}}"></script>
<script src="{{asset('homes/assets/js/img.js')}}"></script>
</body>
</html>