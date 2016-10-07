<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>携程旅游,没钱玩NMB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <link rel="icon" href="{{asset('images/1.jpg')}}" type="image/png" sizes="16x16">
    <link href="{{asset('css/base.b0a7e43d_1.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/index_1.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('jq/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/cquery_110421.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/shared.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/checkuseragent.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/index.js')}}" type="text/javascript"></script>

    <!--[if lt IE 9]><script type="text/javascript">
        j(document).ready(function () {
            function addIeCss(){
                var link = document.createElement('link');
                link.rel = "stylesheet";
                link.type = "text/css";
                link.href = "http://webresource.c-ctrip.com/ResHHtravelOnline/R3/Booking/CSS/ie_index.css?2016_08_26_15_48";
                link.className = "Booking_IE_Index";
                document.getElementsByTagName('head')[0].appendChild(link);
            }
            if (j(window).width() <= "1200" && !cQuery.browser.isIPad) {
                addIeCss();
            }
            j(window).resize(function(){
                if(j(window).width() <= "1200"){
                    if(j(".Booking_IE_Index").length<1)
                    {
                        addIeCss();
                    }
                }
                else if(j(".Booking_IE_Index").length>0){
                    j(".Booking_IE_Index").remove();
                }
            });
        });
    </script>    <![endif]-->
</head>
<body>
<div class="head_box_v2">
@include("home.nav")

    <div class="banner_box">
        <div class="chose" id="banner_chose">
        @include("home.lbt")

        </div>
    </div>

<div class="container_box">
    <div class="section">
        甄选目的地
        <p class="sub_title"><b>&#9670;</b>Destinations</p>
    </div>

    <ul class="goods_list">
@include("home.choice")
    </ul>

    <div class="section">
        热门推荐
        <p class="sub_title">
        <b>&#9670;</b>Recommended</p>
    </div>
    <ul class="goods_list theme_list">
    @include("home.hot")
    </ul>

    <div class="section">
        奢华酒店
        <p class="sub_title">
            <b>&#9670;</b>Luxury Hotels & Resorts</p>
    </div>
    <ul class="goods_list theme_list">
    @include("home.hotel")
    </ul>
</div>
<div class="foot_box_v2">
    <div class="concept_wrap">
        <div class="index_slogan">
            <em class="slogan_line"></em>
            <img alt="high to heart 高端体验触动你心" src="picture/index_footer_slogan.png"
                class="slogan_pic"/>
        </div>
        <ul class="brand_concept">
            <li><a href="http://pages.hhtravel.com/event/standard980w/standard_cn.html"><strong>
                公务舱</strong>国际航线搭乘公务舱</a></li>
            <li><a href="http://pages.hhtravel.com/event/standard980w/standard_cn.html"><strong>
                私家团</strong>2~6人成行</a></li>
            <li><a href="http://pages.hhtravel.com/event/standard980w/standard_cn.html"><strong>
                超越五星级酒店</strong>得奖酒店&nbsp;皇宫酒店&nbsp;城堡&nbsp;庄园</a></li>
            <li><a href="http://pages.hhtravel.com/event/standard980w/standard_cn.html"><strong>
                米其林</strong>米其林或当地经典风味</a></li>
            <li><a href="http://pages.hhtravel.com/event/standard980w/standard_cn.html"><strong>
                专业领先</strong>代表作&nbsp;“百万环游世界80天”</a></li>
            <li><a href="http://pages.hhtravel.com/event/standard980w/standard_cn.html"><strong>
                限量发行</strong>珍贵稀缺</a></li>
        </ul>
    </div>
    <div class="cooperate_box">
        <p class="co_ctrip">「呵呵哒」是<a target="_blank" href="http://www.ctrip.com/" class="ctrip_logo"></a>旗下高端旅游品牌</p>
    </div>

    <div class="foot_copy">Copyright<span class="copy">&copy;</span> 2015, hhtravel.com. All rights reserved. | 沪ICP备08023580号-15<br>
        <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010502000415"><img src="{{asset('images/guohui.png')}}">沪公网备31010502000415</a></div>
</div>

<div id="mask_bg" class="mask_wrap mask_bg" style="display:none; _display:none; position:fixed; _position:absolute; left:0; top:0; width:100%; height:100%; background:#000; z-index:98;filter:alpha(opacity = 50); opacity:0.50;">
</div>
<!-- <div id="mask_content_depart" class="pop_box pop_chose_depart" style="display:none; _display:none; position:fixed; _position:absolute; left:50%; top:50%; margin-left:-226px; margin-top:-90px; z-index:99;">
    <a href="javascript:;" class="close" id="mask_close">×</a>
    <div class="headline">
    携程旅游
     </div>
    <div class="city_detail">
        没钱玩NMB
    </div>
</div> -->


<div class="side_code">
    <div class="code_div" id="div1">
        <em class="icon_code2 code1"></em>
        <a href="javascript:;" class="code_top"></a>
    </div>
    <div class="code_div code_div2" id="div2" onclick="window.scrollTo(0,0);return false;">
        <em class="icon_code2 code2" id="em1"></em>
        <a href="javascript:;" style="display:none;" id="a" >置顶</a>
    </div>
</div>
<div class="side_code side_left" style="display:none;">
    <em id="qrCode" class="icon_code code3">

    </em>
    <span>扫微信二维码<br>进入微信公众号</span>
    <div class="icon_arrow2"></div>
</div>
<input type="hidden" id="hdnStatus" value="1" />
<input type="hidden" id="hdnURL" value="http://weixin.qq.com/q/KUjV8Tfl0QmopKa0F2Ty" />

<script type="text/javascript">
    j(function () {
        j("#div1").click(function () {
            if (j("#hdnStatus").val() == "0") {
                j(".side_code.side_left").show();
                j("#hdnStatus").val("1");
                j("#div1").css("background-color", "#36c1c2")
                setWeiXinShareCodeDisplayStatusChoice(true);
            }
            else {
                j(".side_code.side_left").hide();
                j("#hdnStatus").val("0");
                j("#div1").removeAttr("style");
                setWeiXinShareCodeDisplayStatusChoice(false);
            }
        });

        j("#div1").hover(function () {
            ControlHover1(this);
        }, function () {
            ControlNoHover1(this);
        })

        j("#div2").hover(function () {
            ControlHover2(this);
        }, function () {
            ControlNoHover2(this);
        })
    });

    j(document).ready(function () {
        var isWeixinShareCodeShow = getWeiXinShareDisplayStatusChoice();
        if (isWeixinShareCodeShow == true) {
            j(".side_code.side_left").show();
            j("#hdnStatus").val("1");
            j("#div1").css("background-color", "#36c1c2")
        }
        else {
            j(".side_code.side_left").hide();
            j("#hdnStatus").val("0");
            j("#div1").removeAttr("style");
        }
    }); 

    function ControlHover1(obj) {
        if (j("#hdnStatus").val() == "0") {
            j(".side_code.side_left").show();
        }
    }

    function ControlNoHover1(obj) {
        if (j("#hdnStatus").val() == "0") {
            j(".side_code.side_left").hide();
        }
    }

    function ControlHover2(obj) {
        j("#em1").hide();
        j("#a").show();
    }

    function ControlNoHover2(obj) {
        j("#em1").show();
        j("#a").hide();
    }

    function setWeiXinShareCodeDisplayStatusChoice(isShow) { //获得客户选择的微信分享二维码的隐藏/显示状态
        j.cookie("WeiXinShareCodeDisplayStatusChoice", isShow);
    }
    function getWeiXinShareDisplayStatusChoice() { //获得客户选择的微信分享二维码的隐藏/显示状态
        return j.cookie("WeiXinShareCodeDisplayStatusChoice") ? j.cookie("WeiXinShareCodeDisplayStatusChoice") == "true" : false;//默认为显示（true）
    }
</script>
    </div>
        <input type="hidden" id="page_id" value="106607" />
    <script type="text/javascript">
        (function () {
            var slist = document.getElementsByTagName('script') || [];
            var reg = /_bfa\.min\.js/i;
            for (var i = 0; i < slist.length; i++) {
                if (reg.test(slist[i].src)) {
                    return;
                }
            }
            if ((window.$_bf && window.$_bf.loaded) || window.$LAB || window.CtripJsLoader) {
                return;
            }
            var d = new Date();
            var v = '?v=' + d.getFullYear() + d.getMonth() + '_' + d.getDate() + '.js';
            var bf = document.createElement('script');
            bf.type = 'text/javascript';
            bf.charset = 'utf-8';
            bf.async = true;
            try {
                var p = 'https:' == document.location.protocol;
            } catch (e) {
                var p = 'https:' == document.URL.match(/[^:]+/) + ":";
            }
            bf.src = (p ? "https://s.c-ctrip.com/_bfa.min.js" + v : 'http://webresource.c-ctrip.com/code/ubt/_bfa.min.js' + v);
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(bf, s);

        })();
    </script>

    <script type="text/javascript">
    (function (d) {
        window.bd_cpro_rtid = "P1cznjR";
        var s = d.createElement("script"); s.type = "text/javascript"; s.async = true; s.src = location.protocol + "//cpro.baidu.com/cpro/ui/rt.js";
        var s0 = d.getElementsByTagName("script")[0]; s0.parentNode.insertBefore(s, s0);
    })(document);
</script>
<script type="text/javascript">
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F20b730486ab19706a05757694043685b' type='text/javascript'%3E%3C/script%3E"));
</script>

    <noscript><img src="picture/conv.gif" width="0px" style="display:none !important;"/></noscript>

</body>
</html>