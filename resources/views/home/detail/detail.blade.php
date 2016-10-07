<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>携程旅游,没钱玩NMB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <link rel="icon" href="{{asset('images/1.jpg')}}" type="image/png" sizes="16x16">
    <link href="{{asset('css/base.b0a7e43d_1.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/base.b0a7e43d.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/detail.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/index_1.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('jq/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/cquery_110421.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/shared.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/checkuseragent.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/detail_journey.js')}}" type="text/javascript"></script>
</head>
<body>
    <div class="wrap">
        <div class="head_box_v2">
        @include("home.nav")

        <div class="container_box">
            <div class="crumbs">
                <a href="/wel">首页</a>&nbsp; &gt; &nbsp;
                <h1 class="current_site">国内体验</h1>
            </div>
            <div class="search_box">

                @foreach ( $row as $sp )
                <ul class="search_list">
                    <li>
                            <div class="list_box">
                                <div class="price_box">
                                    <div class="price">&yen;
                                        <strong>{{ $sp->pirce }}</strong>&nbsp;起/<span>人</span>
                                    </div>
                                    <div>
                                        <button class="" style="width: 144px;height: 48px;background-color: #6cf;border: 0 none;font: bold 16px/48px simsun;color: #fff;text-align: center;
                                        ">立即定制&nbsp;></button>
                                    </div>
                                </div>
                                <img class="pic" src="../../picture/{{ $sp->img_name }}" alt="装作有图片">
                                <div class="search_info">
                                    <h1 class="title">{{ $sp->name }}</h1>
                                    <div class="intro">{{ $sp->scontent }}</div>
                                    <div class="theme_date">
                                        <p>旅行主题：休闲度假</p>
                                        <p>出发日期：{{ $sp->date }}</p>
                                    </div>
                                </div>
                            </div>
                    </li>
                </ul>
                @endforeach

                <script type="text/javascript">
                    j(function () {
                        j('a.cross_day').hover(
                        function (e) {
                            j(".pop_cross_day").css({
                                "top": (e.pageY + 8) + "px",
                                "left": (e.pageX + 8) + "px"
                            }).fadeIn(300);
                        },
                        function () {
                            j('.pop_cross_day').fadeOut(300);
                        });
                        position(j("#journey_date"));
                    });
                </script>

                <div class="cmd_title">推荐行程</div> 
                <div style="height: 58px">
                    <div id="journey_date" class="journey_date">
                        <a class="pre" id="jour_pre" href="javascript:;">&lt;</a> <a class="next" id="jour_next"
                            href="javascript:;">&gt;</a>
                        <div class="date_list">
                            <div class="list" id="date_list">
                                @foreach($lists as $li)
                                    <a href="javascript:">第{{ $li->days }}天</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    .journey_maodian
                    {
                        margin-top: -55px;
                        display: inline-block;
                        position: absolute;
                    }
                    .date_list .pre_disable, .date_list .next_disable
                    {
                        background-color: #CCC;
                        cursor: default;
                    }
                    .date_list .pre_disable:hover, .date_list .next_disable:hover
                    {
                        text-decoration: none;
                    }
                </style>
                @foreach($lists as $li)
                <a id="jour{{ $li->days }}" class="journey_maodian">&nbsp;</a>
                <dl class="journey_info ">
                    <dt>第{{ $li->days }}天</dt>
                    <dd class="date_bar">
                        <em class="date_icon"></em>
                    </dd>
                    <dd class="detail">
                        <p class="title">{{ $li->title }}</p>
                        <ul class="detail_info">
                            <li>
                                <span class="caption"><em class="icon_food"></em>餐饮：</span>{{ $li->eat }}
                            </li>
                            <li>
                                <span class="caption"><em class="icon_spot"></em>行程：</span><b>{{ $li->trip_title }}</b>
                                <br>{{ $li->trip }}
                            </li>
                        </ul>
                        <ul class="pic">
                            @foreach($listss as $liv)
                            @if($liv->tid == $li->id)
                            <li>
                                <img src="../../picture/{{ $liv->siname }}" alt="假装有图片" style="width:250px;height:140px">
                                <p>{{ $liv->img_name }}</p>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </dd>
                </dl>
                @endforeach
            </div>
        </div>

        <div class="foot_box_v2">
            <div class="slogan_box">
                <div class="ctrip_slogan">
                    <span class="hh_describe">「HHtravel」是携程旅行网旗下高端旅游品牌</span><img src="{{asset('picture/footer_slogan.png')}}">
                </div>
            </div>
            <div class="foot_link">
                <div class="link_list">
                    <span>服务时间：周一至周五&nbsp;9：00～18：00</span>
                    <a href="">关于HHtravel</a> <a href="/privacy">隐私政策</a>
                    <a href="">电子报订阅</a> 
                    <a href="">联络我们</a>
                    <a href="">菁英招募</a>
                    <a href="">网站地图</a>
                    <a href="">营业执照</a>
                    <a class="weibo" href="" target="_blank">关注HHtravel</a>
                </div>
            </div>
            <div class="foot_copy">Copyright<span class="copy">&copy;</span> 2015, hhtravel.com. All rights reserved. | 沪ICP备08023580号-15<br>
                <a href=""><img src="{{asset('images/guohui.png')}}">沪公网备31010502000415</a>
            </div>
        </div>

        <div class="side_code">
            <div class="code_div code_div2" id="div2" onclick="window.scrollTo(0,0);return false;">
                <em class="icon_code2 code2" id="em1"></em>
                <a href="javascript:;" style="display:none;" id="a" >置顶</a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        j(function () {

            j("#div2").hover(function () {
                ControlHover2(this);
            }, function () {
                ControlNoHover2(this);
            })
        });




        function ControlHover2(obj) {
            j("#em1").hide();
            j("#a").show();
        }

        function ControlNoHover2(obj) {
            j("#em1").show();
            j("#a").hide();
        }
    </script>
</body>
</html>