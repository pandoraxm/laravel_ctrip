<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="../css/cui110425.css" type="text/css" rel="stylesheet">
	<link href="../css/myctrip_sinfo.css" type="text/css" rel="stylesheet">

    <script src="../css/jquery-1.8.3.min.js"></script>

    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        #guanggao{
            width:780px;
            height:200px;
            border: 1px solid #999;
            margin: 0 auto;
            overflow: hidden;
            margin-left:380px;
            margin-top: -60px;
        }
        #imglist{float: left;}
        #imglist img{
            width:280px;
            height:200px;
            float: left;
        }
        #content{
            width:10000px;
        }
    </style>
</head>
<body>
<div style="width:1366px;height:662px;background:url(../css/12.jpg);">

	  <ul id="base_wrapper">
        
    <li id="base_bd">


<div id="leftNavWrapper" menutype="0" menuid="info_myaccount"><div id="sideNavCss"><style>.sidenav{background-color:#f7f7f7;border-bottom:1px solid #ececec;font-family:microsoft yahei;color:#333}.sidenav a{position:relative;z-index:1;display:block;line-height:1;padding-left:4px;border-left:1px solid #e8e8e8;border-right:1px solid #e8e8e8;color:#333;_zoom:1}.sidenav a:hover{color:#06c;text-decoration:none}.sidenav dt a{font-size:14px}.sidenav dt a span{display:block;padding:14px 10px 14px 14px}.sidenav .ico_arr{position:absolute;border:5px solid #fcfcfc;border-top-color:#afafaf;border-bottom:0 none;font-size:0;line-height:0;overflow:hidden;-webkit-transition:-webkit-transform .3s ease-in;transition:transform .3s ease-in}.sidenav dt .ico_arr{top:18px;right:10px}.sidenav dt a:hover .ico_arr{border-top-color:#06c}.sidenav dd{overflow:hidden;position:relative;padding-bottom:5px;display:none}.sidenav dd a{border-top:1px solid #f7f7f7;border-bottom:1px solid #f7f7f7}.sidenav dd a span{display:block;padding:8px 10px 8px 24px}.sidenav dd a.more_order{position:relative;display:inline-block;margin:5px 0 10px 20px;padding:5px 28px 5px 14px;background-color:#e5f0ff;border-radius:20px}.sidenav dd a.more_order:hover{background-color:#2577e3;color:#fff}.sidenav dd a.more_order .ico_arr{top:8px;right:12px;border-color:#E5F0FF;border-top-color:#afafaf}.sidenav dd a.more_order:hover .ico_arr{border-color:#2577e3;border-top-color:#fff}.sidenav dd a.up_order .ico_arr{border:5px solid #E5F0FF;border-bottom-color:#afafaf;border-top:0 none}.sidenav dd a.up_order:hover .ico_arr{border-color:#2577e3;border-bottom-color:#fff}.ico_new2{position:absolute;z-index:3;width:24px;height:11px;top:16px;margin-left:5px;background-position:-162px -9px}.sidenav dd .ico_new2{top:9px}.hide_order{display:none}.sidenav .selected{width:auto;border-left-color:#2577e3;border-right-color:#fff;background-color:#06c;color:#06c}.sidenav dd .selected{border-color:#ececec #fff #ececec #ececec}.sidenav .selected span{background-color:#fff}.sidenav_c dt .ico_arr{border:5px solid #fcfcfc;border-bottom-color:#afafaf;border-top:0 none;-webkit-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}.sidenav_c dt a:hover .ico_arr{border-bottom-color:#06c}.aside_fixed{position:fixed;top:-10px}.sidenav_c dd{display:block;}</style></div>

	<div id="sideNav" class="aside clearfix">
		<dl class="sidenav"><dt><a id="index" href="/personal/welcome"><span>我的携程首页</span></a></dt></dl>
		<dl class="sidenav"><dt class="toggleSide"><a href=""><span>订单</span><i class="ico_arr"></i></a></dt></dl>
		<dl class="sidenav"><dt class="toggleSide"><a href="" ><span>钱包</span><i class="ico_arr"></i></a></dt></dl>
		<dl class="sidenav"><dt><a id="ticket_mypromocode" href="" ><span>优惠券</span></a></dt></dl>
		<dl class="sidenav"><dt><a id="ticket_myjifen" href="" ><span>积分</span></a></dt></dl>
		<dl class="sidenav"><dt><a id="info_hotelfavorites" href=""><span>收藏</span></a></dt></dl>

		<dl class="sidenav sidenav_c">
		<dt class="toggleSide"><a href="javascript:;"><span>个人中心</span><i class="ico_arr"></i></a></dt>

		<dd><a href="/personal/personal" class="selected" id="info_myaccount"><span>我的信息</span></a></dd>
		</dl>
        <dl class="sidenav"><dt><a id="info_hotelfavorites" href=""><span>YE</span></a></dt></dl>
        <dl class="sidenav"><dt><a id="info_hotelfavorites" href=""><span>SHI</span></a></dt></dl>
        <dl class="sidenav"><dt><a id="info_hotelfavorites" href=""><span>CHANG</span></a></dt></dl>
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
			
			
    <form action="/personal/dorevise/{{session('uname')->uid }}" method="post" onsubmit="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

        <ul style="visibility: visible;" class="view_model">
                <li class="li_edit_mobile" id="li_edit_mobile">
                    <label class="tit">xiugai</label><span>xiugaigeren xingxi</span>
                </li>

                <li id="liName" class="">
                    <label class="tit">
                        用户名<em>*</em></label><input class="m_input w01" id="name" type="text" name="uname" placeholder="" value="{{ session('uname')->uname }}">
                </li>
				
                <li id="liSex" class="li_sex">
                    <label class="tit">
                        性别<em>*</em></label><label class="base_label"><input class="sex" id="radioSexMan" type="radio" name="sex" value="m">男</label><label id="lblSexWoman" class="base_label"><input class="sex" id="radioSexWoman" type="radio" name="sex" value="w">女</label></label><label class="base_label"><input class="sex" id="radioSexMan" type="radio" name="sex" value="m">保密</label>
				</li>
                <li id="liName" class="">
                    <label class="tit">
                        年龄<em>*</em></label><input class="m_input w01" id="age" type="text" maxlength="2" name="age" value="{{ session('uname')->age }}"><span id="tipName" style="display: none;" class="tip_status">
                </li>
			
                <li id="liName" class="">
                    <label class="tit">
                        手机<em>*</em></label><input class="m_input w01" id="tel" type="text" name="tel" placeholder="" value="{{ session('uname')->tel }}">
                </li>
				

                <li>
                    <label class="tit">
                        邮箱</label><input class="m_input w01 inputSel" id="email" type="email" name="email" placeholder="" value="{{ session('uname')->email }}">
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
<div id="dv_mask" style="display:none;"></div>

  <input type="hidden" id="page_id" value="100013"> 
    </li>
    </ul>


    <div id="guanggao">
        <div id="content">
            <div class="t1" id="imglist">
                @foreach($ad as $v)
                <img src="{{asset($v->image)}}" style="width:260px;height:200px;">
                @endforeach
           </div>
        </div>
	</div>
</div>
    <script>
        $(function(){
            //图片数量
            var width = $('#imglist img').length;
            //将所有图片克隆一份 并追加图片后面
            $('#imglist').clone().appendTo('#content');

            //使用定时 滚动图片
            setInterval(scrollImage,20);
            //滚动函数
            function scrollImage(){
                if ($('#guanggao').scrollLeft() >= $('#guanggao img').width() * width) {
                    $('#guanggao').scrollLeft(0);
                };
                $('#guanggao').scrollLeft($('#guanggao').scrollLeft()+5);
            }
        });

    </script>

    <script>
            function check()
    {
      var aa = document.getElementById('age').value;

      if(aa >=100){
        alert('请输入正确的年龄');
        die();
      }

    }

    </script>

</body>
</html>