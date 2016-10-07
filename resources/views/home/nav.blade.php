    <div class="header">
        <div class="top_info index_top">
			@if(session('uname'))
            <a href="">{{ session('uname')->uname }}</a>
            <a href="/login/logout">注销</a>
            <a href="/personal/personal" target="">个人中心</a>
			@else
            <span id="userName"><a href='/login/login' target=''>登录</a></span>
            <a  id="headerMyHHcenter" href='/enroll/enroll' target=''>注册</a>                   
			@endif
           
            <!-- <span id="userSlash" style="display:none;">&nbsp;/&nbsp;</span> -->
            <!-- <a id="loginLink" style="cursor: pointer"></a> -->
           
           
            
        </div>
    </div>

    <div class="nav_wrap">
        <div class="nav_box">
            <div class="search"></div>
            <a href="/"><img src="{{asset('images/2-1.jpg')}}" style="margin-button: 0px;width:220px;"></a>
            <div class="nav_list" id="divNavList">
                <a id="nav_destn" class="current" href="" onclick="headNavTraceLogClick('1','旅游');" data-navindex="1" data-kewords="旅游" data-tracelogkey="hht_pc_home_basic_navbar_click">
                    <span class="arrow_down">
                        <b class="arrow_1">&#9670;</b>
                        <b class="arrow_2">&#9670;</b>
                    </span>旅游
                    <span class="arrow_new"></span>
                </a>
                <a id="nav_brand" href="" onclick="headNavTraceLogClick('3', '机票');" data-navindex="3" data-kewords="机票" data-tracelogkey="hht_pc_home_basic_navbar_click">
                    <span class="arrow_down">
                        <b class="arrow_1">&#9670;</b><b class="arrow_2">&#9670;</b>
                    </span>机票
                </a>
                <a id="nav_theme" href="{{asset('home/hcp')}}" onclick="headNavTraceLogClick('2','火车票');" data-navindex="2" data-kewords="火车票" data-tracelogkey="hht_pc_home_basic_navbar_click">
                    <span class="arrow_down">
                        <b class="arrow_1">&#9670;</b>
                        <b class="arrow_2">&#9670;</b>
                    </span>火车票
                </a>
                <a id="nav_hotel" href="" onclick="headNavTraceLogClick('8', '奢华酒店');" data-navindex="8" data-kewords="奢华酒店" data-tracelogkey="hht_pc_home_basic_navbar_click">
                    <span class="arrow_down">
                    <b class="arrow_1">&#9670;</b>
                    <b class="arrow_2">&#9670;</b>
                    </span>奢华酒店
                    <span class="arrow_new"></span>
                </a>

                <span class="hover_bar"></span>
            </div>
        </div>
    </div>

    <!--目的地弹出框-->
    <div class="pop_panel" id="pop_panel_destn" style="display: none; !important; z-index: 999;">
        <div class="pop_panel_hd">
            <div class="headline">
                <em class="globe_icon"></em>
                <a class="close" href="javascript:;">&times;</a>
                <a href="">
                    所有旅游地点<em class="icon_go">&nbsp;&gt;</em>
                </a>
            </div>
        </div>

        <div class="pop_panel_bd">
        @include("home.pull")
        </div>
    </div>

    <div class="pop_panel pop_panel_brand" id="pop_panel_brand" style="display: none;">
        <div class="pop_panel_bd">
            <dl class="dest_detail">
                <dt>
                    <a href=""></a>
                </dt>
                <dd>

                </dd>
            </dl>
        </div>
    </div>

    <div class="pop_panel pop_panel_themes" id="pop_panel_theme" style="display: none;">
        <div class="pop_panel_bd">
            <dl class="dest_detail">
                <dt>
                    <a href=""></a>
                </dt>
                <dd>
                    <a href="" target="_blank"></a>
                    <a href="" target="_blank"></a>
                </dd>
            </dl>
        </div>
    </div>

    <div class="pop_panel pop_panel_hotel" id="pop_panel_hotel" style="display:none;">
        <div class="pop_panel_bd">
            <div class="pop_panel_hotel_brand_container">
                <div class="pop_panel_hotel_brand_title">品牌</div>
                <a class="pop_panel_hotel_brand_icon " href="">四季</a>
                <a class="pop_panel_hotel_brand_icon " href="">安缦</a>
            </div>
            <dl class="dest_detail">
                <dt><a href="">东南亚&amp;南亚</a></dt>
                <dd>
                    <a href="">巴厘岛</a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="pop_panel pop_panel_school" id="pop_panel_school" onclick="">
        <a href="">
            <div class="pop_panel_bd"></div>
        </a>
    </div>
</div>