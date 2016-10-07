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

<body id="blog">

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        
       
    </div>
</header>

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
    <form class="am-topbar-form am-topbar-right am-form-inline" active="/home/wz" method="post" role="search">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">   
      <div class="am-form-group">
        <input type="text" name="name" class="am-form-field am-input-sm" placeholder="搜索">
       <input class="blueBtn" value="搜索" type="submit" id="searchbuttonlist">
      </div>
    </form>
  </div>
</nav>
<hr>
<!-- nav end -->
<!-- banner start -->
<div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-article-margin">
    <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}' >
    <ul class="am-slides">
      <li>
            <img src="{{asset('homes/assets/i/b1.jpg')}}">
            <div class="blog-slider-desc am-slider-desc ">
                <div class="blog-text-center blog-slider-con">
                    <span><a href="" class="blog-color">Article &nbsp;</a></span>               
                    <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                    <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                    </p>
                    <span class="blog-bor">2016/09/26</span>
                    <br><br><br><br><br><br><br>                
                </div>
            </div>
      </li>
      <li>
            <img src="{{asset('homes/assets/i/b2.jpg')}}">
            <div class="am-slider-desc blog-slider-desc">
                <div class="blog-text-center blog-slider-con">
                    <span><a href="" class="blog-color">Article &nbsp;</a></span>               
                    <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                    <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                    </p>
                    <span>2016/09/26</span>                
                </div>
            </div>
      </li>
      <li>
            <img src="{{asset('homes/assets/i/b3.jpg')}}">
            <div class="am-slider-desc blog-slider-desc">
                <div class="blog-text-center blog-slider-con">
                    <span><a href="" class="blog-color">Article &nbsp;</a></span>               
                    <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                    <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                    </p>
                    <span>2016/09/26</span>                
                </div>
            </div>
      </li>
      <li>
            <img src="{{asset('homes/assets/i/b3.jpg')}}">
            <div class="am-slider-desc blog-slider-desc">
                <div class="blog-text-center blog-slider-con">
                    <span><a href="" class="blog-color">Article &nbsp;</a></span>               
                    <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                    <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                    </p>
                    <span>2016/09/26</span>                
                </div>
            </div>
      </li>
    </ul>
    </div>
</div>
<!-- banner end -->

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">
		
		@foreach($list as $v)
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
				
                <img src="{{asset('picture')}}/{{$v->img_name}}" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span><a href="" class="blog-color">{{ $v->auth }} &nbsp;</a></span>
                <p><span> {{ $v->sulg }} &nbsp;</span></p>
                <p><span>{{ $v->create_time }}</span></p>
                <h1><a href="">{{ $v->title }}</a></h1>
                <p>{{ $v->description }}
                </p>
                <p><a href="" class="blog-continue">{{ $v->content }}</a></p>
            </div>
        </article>
		@endforeach
        {!! $list->appends($where)->render() !!}
        
    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="{{asset('homes/assets/i/f14.jpg')}}" alt="about me" class="blog-entry-img" >
            <p>妹纸</p>
            <p>
        我是妹子
        </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
        </div>
        <div class="blog-sidebar-widget blog-bor">
        
        </div>
        <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
            <h2 class="blog-title"><span>TAG cloud</span></h2>
			
            <div class="am-u-sm-12 blog-clear-padding">
            @foreach($list as $v)
            <a href="" class="blog-tag">{{$v->sulg}}</a>
            @endforeach
            </div>
			
        </div>
        
    </div>
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

<![endif]-->
<!-- <script src="{{asset('homes/assets/js/amazeui.ie8polyfill.min.js')}}"></script> -->
<script src="{{asset('homes/assets/js/amazeui.min.js')}}"></script>
</body>
</html>