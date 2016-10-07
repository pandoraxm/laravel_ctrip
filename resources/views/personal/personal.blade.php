<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="{{asset('css/cui110425.css')}}" type="text/css" rel="stylesheet">
	<link href="{{asset('css/myctrip_sinfo.css')}}" type="text/css" rel="stylesheet">
    <style>
        
        *{
            font-family: 微软雅黑;
        }

        #tianqi{
            width: 200px;
            height: 200px;
            border:1px solid #ccc;
            float: right;
            margin: 0px 100px 0px 0px;
        }
        #tianqi>p{
            text-align: center;
            margin-top: 15px;
            font-size: 14px;

        }
    
        #qq{
            
            width: 148px;
            height: 200px;
            border:1px solid #ccc;
            text-align: center;

        }

        #tupian{
            width: 148px;
            height: 120px;
            background-color: red;
        }

        #qq button{
            margin-top: 10px;
        }

        #qin{
            width: 600px;
            height: 80px;
            border:1px solid red;
            margin:-82px 0px 0px 213px;
        }

    </style>
</head>
<body>
<div style="width:1366px;height:662px;background:url(../css/12.jpg);">
	  <ul id="base_wrapper">
        
    <li id="base_bd">


<div id="leftNavWrapper" menutype="0" menuid="info_myaccount"><div id="sideNavCss"><style>.sidenav{background-color:#f7f7f7;border-bottom:1px solid #ececec;font-family:microsoft yahei;color:#333}.sidenav a{position:relative;z-index:1;display:block;line-height:1;padding-left:4px;border-left:1px solid #e8e8e8;border-right:1px solid #e8e8e8;color:#333;_zoom:1}.sidenav a:hover{color:#06c;text-decoration:none}.sidenav dt a{font-size:14px}.sidenav dt a span{display:block;padding:14px 10px 14px 14px}.sidenav .ico_arr{position:absolute;border:5px solid #fcfcfc;border-top-color:#afafaf;border-bottom:0 none;font-size:0;line-height:0;overflow:hidden;-webkit-transition:-webkit-transform .3s ease-in;transition:transform .3s ease-in}.sidenav dt .ico_arr{top:18px;right:10px}.sidenav dt a:hover .ico_arr{border-top-color:#06c}.sidenav dd{overflow:hidden;position:relative;padding-bottom:5px;display:none}.sidenav dd a{border-top:1px solid #f7f7f7;border-bottom:1px solid #f7f7f7}.sidenav dd a span{display:block;padding:8px 10px 8px 24px}.sidenav dd a.more_order{position:relative;display:inline-block;margin:5px 0 10px 20px;padding:5px 28px 5px 14px;background-color:#e5f0ff;border-radius:20px}.sidenav dd a.more_order:hover{background-color:#2577e3;color:#fff}.sidenav dd a.more_order .ico_arr{top:8px;right:12px;border-color:#E5F0FF;border-top-color:#afafaf}.sidenav dd a.more_order:hover .ico_arr{border-color:#2577e3;border-top-color:#fff}.sidenav dd a.up_order .ico_arr{border:5px solid #E5F0FF;border-bottom-color:#afafaf;border-top:0 none}.sidenav dd a.up_order:hover .ico_arr{border-color:#2577e3;border-bottom-color:#fff}.ico_new2{position:absolute;z-index:3;width:24px;height:11px;top:16px;margin-left:5px;background-position:-162px -9px}.sidenav dd .ico_new2{top:9px}.hide_order{display:none}.sidenav .selected{width:auto;border-left-color:#2577e3;border-right-color:#fff;background-color:#06c;color:#06c}.sidenav dd .selected{border-color:#ececec #fff #ececec #ececec}.sidenav .selected span{background-color:#fff}.sidenav_c dt .ico_arr{border:5px solid #fcfcfc;border-bottom-color:#afafaf;border-top:0 none;-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}.sidenav_c dt a:hover .ico_arr{border-bottom-color:#06c}.aside_fixed{position:fixed;top:-10px}.sidenav_c dd{display:block;}</style></div>

<div id="sideNav" class="aside clearfix"><dl class="sidenav"><dt><a id="index" href="/personal/welcome"><span>我的携程首页</span></a></dt></dl>

<dl class="sidenav"><dt class="toggleSide">
<a href="javascript:;"><span>订单</span><i></i></a></dt><dd>
<a href="" class="" id="order_hotel"><span>火车票订单</span></a>
<a href="" class="" id="order_flt"><span>机票订单</span></a>
<a href="" class="" id="order_pkg"><span>旅游票订单</span></a></dd></dl>

<dl class="sidenav"><dt><a id="ticket_mypromocode" href=""><span>优惠券</span></a></dt></dl>
<dl class="sidenav"><dt><a id="ticket_myjifen" href=""><span>积分</span></a></dt></dl>
<dl class="sidenav"><dt><a id="info_hotelfavorites" href=""><span>收藏</span></a></dt></dl>
<dl class="sidenav sidenav_c"><dt class="toggleSide"><a href="javascript:;"><span>个人中心</span><i class="ico_arr"></i></a></dt>
<dd><a href="/personal/personal" class="selected" id="info_myaccount"><span>我的信息</span></a>

<a href="/reupwd/reupwd" id="info_myaccount"><span>修改密码</span></a></dd></dl>

<dl class="sidenav"><dt><a id="myshequ" target="_blank" href=""><span>我的社区主页</span></a></dt></dl>	

<dl class="sidenav"><dt class="toggleSide"><a href="javascript:;"><span>应用中心</span><i></i></a></dt></dl>

</div>
</div>

<!-- <script language="javascript" charset="gb2312" type="text/javascript" src="./我的信息-携程旅行网_files/gbkloader.js.下载"></script> -->
        
        <div class="main layoutfix">
        <div id="dv_show_block">

	<div id="info_id" class="box01 box01_c">
		<div id="info_title_id" class="box_hd hd02">
			<h3>个人信息设置</h3>
			<span id="info_icon_id" class="hd_rt ico_up">收起</span>
		</div>
			<div class="box_bd account_form" style=" display:block;" id="info_display_id">
                <ul style="visibility: visible;" class="view_model">
                        <li style=" display:none">
                            <label class="tit">登录名</label><span></span><b href="#" data-role="jmp" data-params="" id="icoLoginName1" class="ico_tips1"></b>
                        </li>

                        <li id="li_edit_username">
                            <label class="tit">姓名</label><span class="val">{{ $users->uname }}</span>
                        </li>

                        <li id="li_edit_sex" class="li_sex">
                            <label class="tit">性别</label>

                            <span class="val">
                            @if( $users->sex == 'w')
                            女
                            @elseif( $users->sex == 'm')
                            男
                            @else
                            保密
                            @endif

                           <!--  {{ session('uname')->sex }} -->

                            </span>
                        
                        </li>

                        <li class="li_edit_mobile" id="li_edit_mobile">
                            <label class="tit">手机</label><span>{{ $users->tel }}</span>
                        </li>

                        <li class="li_edit_email" id="li_edit_email">
                            <label class="tit">邮箱</label><span>{{ $users->email }}</span>
                        </li>
                        <li id="li_edit_birth">
                            <label class="tit">生日</label><span class="val">{{ $users->created_at }}</span>
                        </li>

                        <li id="li_edit_homeCity">
                            <label class="tit">常用出发城市</label><span class="val">上海市</span>
                        </li>

                        <li>
                            <label class="tit">&nbsp;</label><button id="button_edit" class="btn_l3" type="button"><span><em><a href="/personal/revise" target="">编辑</a></em></span></button>
                        </li>
                </ul>

            </div>
	</div>

    </div>
    </div>
        <div id="dv_mask" style="display:none;"></div>


    </li>

<!-- 天气 -->
    <div id="tianqi">         <img src="" id="tq-img"
style="width:80px;height:80px;">         <p style="color:#00ffff;">天气:<span
id="tq"></span></p>         <p style="color:#FF44FF;">温度:<span
id="wd"></span></p>         <p style="color:#0080ff;">地区:<span
id="dq"></span></p>     </div>
	

<!-- 友情链接 -->
    
    <div id="qq">
        <b style="font-size:20px;">客服中心</b>
        <div id="tupian"><img src="../css/qq.jpg" style="width:148px;height:120px;"></div>

        <button id="kefu-btn">有问题就点击我吧</button>

    </div>

</div>


</body>

<script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/tianqi.js')}}"></script>
<script>
$('#kefu-btn').click(function(){
    $.ajax({
        url:'/kefu',
        type:'get',
        dataType:'json',
        success:function(data){
            alert(data[0].content);
        }
    });
});

</script>
</html>
