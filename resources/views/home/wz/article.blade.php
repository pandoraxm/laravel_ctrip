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
    <div class="am-u-md-8 am-u-sm-12">
    @foreach($list as $v)
      <article class="am-article blog-article-p">
        <h1>{{ $v->title }}</h1>
        引用blockquote：
        <blockquote><p>People think focus means saying yes to the thing you’ve got to focus on. But that’s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I’m actually as proud of the things we haven’t done as the things I have done. Innovation is saying no to 1,000 things.</p> <footer><cite>Steve Jobs</cite> – Apple Worldwide Developers’ Conference, 1997</footer></blockquote>
        <div class="am-article-hd">
          <h1 class="am-article-title blog-text-center">{{ $v->title }}</h1>
          <p class="am-article-meta blog-text-center">
              <span><a href="#" class="blog-color">article &nbsp;</a></span>-
              <span><a href="#">{{ $v->auth }} &nbsp;</a></span>-
              <span><a href="#">{{ $v->create_time }}</a></span>
          </p>
        </div>        
        <div class="am-article-bd">
        <img src="{{asset('picture')}}/{{$v->img_name}}" alt="" class="blog-entry-img blog-article-margin">          
        <p class="class="am-article-lead"">
        
        
         
       
        <hr>

        <ul class="am-list am-list-border">

        </ul>
       
        <h1>文章内容：</h1>
        <p>{{$v->content}}</p>
       
        </div>
      </article>
      <div class="am-g blog-author blog-article-margin">
          <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
            <img src="{{asset('homes/assets/i/f15.jpg')}}" alt="" class="blog-author-img am-circle">
          </div>
          <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
          <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">{{ $v->auth }}</span></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <hr>
         --------------------------------------------------分割线---------------------------------------------------
      @endforeach
      {!! $list->appends($where)->render() !!}


    </div>

    <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="{{asset('homes/assets/i/f161.jpg')}}" alt="about me" class="blog-entry-img" >
            <p>妹纸</p>
            <p>
        我是妹子
        </p><p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
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
<script src="homes/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="{{asset('homes/assets/js/amazeui.min.js')}}"></script>
<!-- <script src="homes/assets/js/app.js"></script> -->
</body>
</html>