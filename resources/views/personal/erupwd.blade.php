<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="../css/cui110425.css" type="text/css" rel="stylesheet">
	<link href="../css/myctrip_sinfo.css" type="text/css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        *{
            font-family: 微软雅黑;
        }

    </style>
</head>
<body>

<div style="width:1366px;height:662px;background:url(../css/12.jpg);">
    


	<ul id="base_wrapper">    
    <li id="base_bd">


<div id="leftNavWrapper" menutype="0" menuid="info_myaccount"><div id="sideNavCss"><style>.sidenav{background-color:#f7f7f7;border-bottom:1px solid #ececec;font-family:microsoft yahei;color:#333}.sidenav a{position:relative;z-index:1;display:block;line-height:1;padding-left:4px;border-left:1px solid #e8e8e8;border-right:1px solid #e8e8e8;color:#333;_zoom:1}.sidenav a:hover{color:#06c;text-decoration:none}.sidenav dt a{font-size:14px}.sidenav dt a span{display:block;padding:14px 10px 14px 14px}.sidenav .ico_arr{position:absolute;border:5px solid #fcfcfc;border-top-color:#afafaf;border-bottom:0 none;font-size:0;line-height:0;overflow:hidden;-webkit-transition:-webkit-transform .3s ease-in;transition:transform .3s ease-in}.sidenav dt .ico_arr{top:18px;right:10px}.sidenav dt a:hover .ico_arr{border-top-color:#06c}.sidenav dd{overflow:hidden;position:relative;padding-bottom:5px;display:none}.sidenav dd a{border-top:1px solid #f7f7f7;border-bottom:1px solid #f7f7f7}.sidenav dd a span{display:block;padding:8px 10px 8px 24px}.sidenav dd a.more_order{position:relative;display:inline-block;margin:5px 0 10px 20px;padding:5px 28px 5px 14px;background-color:#e5f0ff;border-radius:20px}.sidenav dd a.more_order:hover{background-color:#2577e3;color:#fff}.sidenav dd a.more_order .ico_arr{top:8px;right:12px;border-color:#E5F0FF;border-top-color:#afafaf}.sidenav dd a.more_order:hover .ico_arr{border-color:#2577e3;border-top-color:#fff}.sidenav dd a.up_order .ico_arr{border:5px solid #E5F0FF;border-bottom-color:#afafaf;border-top:0 none}.sidenav dd a.up_order:hover .ico_arr{border-color:#2577e3;border-bottom-color:#fff}.ico_new2{position:absolute;z-index:3;width:24px;height:11px;top:16px;margin-left:5px;background-position:-162px -9px}.sidenav dd .ico_new2{top:9px}.hide_order{display:none}.sidenav .selected{width:auto;border-left-color:#2577e3;border-right-color:#fff;background-color:#06c;color:#06c}.sidenav dd .selected{border-color:#ececec #fff #ececec #ececec}.sidenav .selected span{background-color:#fff}.sidenav_c dt .ico_arr{border:5px solid #fcfcfc;border-bottom-color:#afafaf;border-top:0 none;-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}.sidenav_c dt a:hover .ico_arr{border-bottom-color:#06c}.aside_fixed{position:fixed;top:-10px}.sidenav_c dd{display:block;}</style></div>

<div id="sideNav" class="aside clearfix"><dl class="sidenav"><dt><a id="index" href=""><span>我的携程首页</span></a></dt></dl>

<dl class="sidenav"><dt class="toggleSide">
<a href="javascript:;"><span>订单</span><i></i></a></dt><dd>
<a href="" class="" id="order_hotel"><span>火车票订单</span></a>
<a href="" class="" id="order_flt"><span>机票订单</span></a>
<a href="" class="" id="order_pkg"><span>旅游票订单</span></a></dd></dl>

<dl class="sidenav"><dt><a id="ticket_mypromocode" href=""><span>优惠券</span></a></dt></dl>
<dl class="sidenav"><dt><a id="ticket_myjifen" href=""><span>积分</span></a></dt></dl>
<dl class="sidenav"><dt><a id="info_hotelfavorites" href=""><span>收藏</span></a></dt></dl>
<dl class="sidenav sidenav_c"><dt class="toggleSide"><a href="javascript:;"><span>个人中心</span><i class="ico_arr"></i></a></dt>
<dd><a href="/personal/personal" id="info_myaccount"><span>我的信息</span></a>

<a href="/reupwd/reupwd" class="selected" id="info_myaccount"><span>修改密码</span></a></dd></dl>

<dl class="sidenav"><dt><a id="myshequ" target="_blank" href=""><span>我的社区主页</span></a></dt></dl>	

<dl class="sidenav"><dt class="toggleSide"><a href="javascript:;"><span>应用中心</span><i></i></a></dt></dl>

</div>
</div>
  
    <div class="main layoutfix">
    <div id="dv_show_block">
		
	<div id="info_id" class="box01 box01_c">
		<div id="info_title_id" class="box_hd hd02">
			<h3>个人信息设置</h3>
			<span id="info_icon_id" class="hd_rt ico_up">收起</span>
		</div>
			<div class="box_bd account_form" style=" display:block;" id="info_display_id">
			
			
    <form action="/reupwd/doreupwd" method="post" onsubmit="return lsubmit()">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

        <ul style="visibility: visible;" class="view_model">
                

               @if(session('msg')) 
               <li class="li_edit_mobile" id="li_edit_mobile">
                   　　　　　　　　　　　　<span><font style="color:red;font-size:15px;">{{ session('msg') }}</font></span>
                </li>
                @else
                <li class="li_edit_mobile" id="li_edit_mobile">
                   　　　　　　　　　　　　<span><font style="color:#97CBFF;font-size:15px;">欢迎尊贵的用户修改密码</font></span>
                </li>
                @endif


                <li id="liName" class="">
                    <label class="tit">姓名</label><span class="val">{{ Session('uname')->uname }}</span>
                </li>
                <li id="liName" class="">
                    <label class="tit">
                        旧密码<em>*</em></label><input class="m_input w01" id="name" type="password" placeholder="" value="">
                </li>
				

                <li>
                    <label class="tit">
                        新密码<em>*</em></label><input class="m_input w01 inputSel" id="birth" type="password" name="upwd" placeholder="" value="">
				</li>

                <li>
                    <label class="tit">
                        确认密码<em>*</em></label><input class="m_input w01 inputSel" id="birth1" type="password" name="upwd" placeholder="" value="">
				</li>

                
                <li id="li_edit_homeCity">
                    <label class="tit">常用出发城市</label><span class="val">上海市</span>
                </li>
                <li>
                    <label class="tit">&nbsp;</label><input type="submit" style="width:195px;height:30px;border:1px solid #FFD9EC;background-color:#DDD;color:#FFF;" value="确认修改">
                </li>
        </ul>
		
	</form>
			  
            </div>
	</div>
    

    </div>
    </div>

    	</li>
    	</ul>
</div>
    <script>
    function lsubmit()
    {
        var aa = document.getElementById("birth").value;
        var bb = document.getElementById("birth1").value;


        if(aa != bb){
            alert('两次密码不一致');
            return false;
        }


    }


    </script>


</body>
</html>