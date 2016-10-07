//页头左边出发城市
j(document).ready(function () {
    // getLoginInfo();
    if (cQuery.browser.isIPad) {
        j(".top_info .depart_city .chose").click(function () {
            if (j(".pop_depart_city").is(":visible")) {
                j(".pop_depart_city").hide();
            } else {
                j(".pop_depart_city").show();
            }
            return false;
        });
    }
    else {
        j(".top_info .depart_city .chose").mouseover(function () {
            j(".pop_depart_city").show();
        });
        j(".top_info .depart_city .chose").mouseout(function () {
            j(".pop_depart_city").hide();
        });
    }

    j(".pop_depart_city > b").click(function () {
        j(".pop_depart_city").hide();
        return false;
    });

    j("body>div").click(function () {
        //出发城市浮层
        j(".pop_depart_city").hide();
        //旅客信息填写下拉框
        j("#formc .mod_option").hide();
    });

    j("#pop_panel_brand").click(function() {
        window.location.href = "http://pages.hhtravel.com/event/standard980w/standard_cn.html";
    });
    
    //j("#detail_departure_city_contact_me").click(function() {
    //    window.location.href = "http://pages.hhtravel.com/event/standard980w/standard_cn.html";
    //});
    





    j("#loginLink").click(login_click);
    //初始化埋点相关数据
    initUbtValue();
    menu();

    //添加ctm 
    addCTM();
});

function traceNavbar (traceKey, extralTraceValObj) {
    var self = this;
    try {
        if (typeof window['__bfi'] == 'undefined') window['__bfi'] = [];
        var tracelog_CityName = j("#hideDepartureCityName").val();
        var tracelog_cityId = j.cookie("DepartureCity");
        var traceValue = {
            from: { "cityname": tracelog_CityName, "cityid": tracelog_cityId }
        };
        if (extralTraceValObj && (typeof extralTraceValObj) == "object") {
            traceValue = $.extend({}, traceValue, extralTraceValObj);
        }
        window['__bfi'].push(['_tracklog', traceKey, JSON.stringify(traceValue)]);
    } catch (e) {
    }
};
function menu() {
    traceNavbar('hht_pc_navbar_show');
    j('#divNavList a').mouseenter(function (e) {
        traceNavbar('hht_pc_navbar_hover', { name: j(e.currentTarget).data('kewords') });
    });
    j('#divNavList a').click(function (e) {
        traceNavbar('hht_pc_navbar_click', { name: j(e.currentTarget).data('kewords') });
    });
    j('#pop_panel_destn .pop_panel_bd a').bind('click', function (e) {
        traceNavbar('hht_pc_navbar0dest_click', { name: j(e.currentTarget).text() });
    });
    j('#pop_panel_brand').bind('click', function (e) {
        traceNavbar('hht_pc_navbar0brand_click', { name: ''});
    });
    j('#pop_panel_school').bind('click', function (e) {
        traceNavbar('hht_pc_navbar0school_click', { name: ''});
    });
    j('#pop_panel_theme .pop_panel_bd a').bind('click', function (e) {
        traceNavbar('hht_pc_navbar0themes_click', { name: j(e.currentTarget).text() });
    });
    j('#pop_panel_hotel .pop_panel_bd a').bind('click', function (e) {
        traceNavbar('hht_pc_navbar0hotels_click', { name: j(e.currentTarget).text() });
    });
    j('#pop_panel_customize .pop_panel_bd a').bind('click', function (e) {
        traceNavbar('hht_pc_navbar0personal_click');
    });
    
    var nav_destn_timeout;
    j("#nav_destn").mouseenter(function () {
        clearTimeout(nav_destn_timeout);
        nav_theme_close();
        nav_brand_close();
        nav_hotel_close();
        nav_customize_close();
        nav_school_close();
        nav_destn_open();
    });
    j("#nav_destn").mouseleave(function () {
        nav_destn_timeout = setTimeout(function () {
            nav_destn_close();
        }, 500);
    });
    j("#pop_panel_destn").mouseenter(function () {
        clearTimeout(nav_destn_timeout);
    });
    j("#pop_panel_destn").mouseleave(function () {
        nav_destn_close();
    });

    var nav_brand_timeout;
    j("#nav_brand").mouseenter(function () {
        clearTimeout(nav_brand_timeout);
        nav_theme_close();
        nav_destn_close();
        nav_hotel_close();
        nav_customize_close();
        nav_school_close();
        nav_brand_open();
    });
    j("#nav_brand").mouseleave(function () {
        nav_brand_timeout = setTimeout(function () {
            nav_brand_close();
        }, 500);
    });
    j("#pop_panel_brand").mouseenter(function () {
        clearTimeout(nav_brand_timeout);
    });
    j("#pop_panel_brand").mouseleave(function () {
        nav_brand_close();
    });

    var nav_school_timeout;
    j("#nav_school").mouseenter(function () {
        clearTimeout(nav_school_timeout);
        nav_theme_close();
        nav_destn_close();
        nav_hotel_close();
        nav_customize_close();
        nav_brand_close();
        nav_school_open();
    });
    j("#nav_school").mouseleave(function () {
        nav_school_timeout = setTimeout(function () {
            nav_school_close();
        }, 500);
    });
    j("#pop_panel_school").mouseenter(function () {
        clearTimeout(nav_school_timeout);
    });
    j("#pop_panel_school").mouseleave(function () {
        nav_school_close();
    });

    var nav_theme_timeout;
    var pop_panel_theme;
    if (j("#pop_panel_theme").hasClass("disable")) {
        pop_panel_theme = j("#pop_panel_theme_single");
    }
    else {
        pop_panel_theme = j("#pop_panel_theme");
    }
    j("#nav_theme").mouseenter(function () {
        clearTimeout(nav_theme_timeout);
        nav_destn_close();
        nav_brand_close();
        nav_hotel_close();
        nav_customize_close();
        nav_theme_open();
    });
    j("#nav_theme").mouseleave(function () {
        nav_theme_timeout = setTimeout(function () {
            nav_theme_close();
        }, 200);
    });
    pop_panel_theme.mouseenter(function () {
        clearTimeout(nav_theme_timeout);
    });
    pop_panel_theme.mouseleave(function () {
        nav_theme_close();
    });

    var nav_hotel_timeout;
    j("#nav_hotel").mouseenter(function () {
        clearTimeout(nav_hotel_timeout);
        nav_theme_close();
        nav_destn_close();
        nav_brand_close();
        nav_customize_close();
        nav_hotel_open();
    });
    j("#nav_hotel").mouseleave(function () {
        nav_hotel_timeout = setTimeout(function () {
            nav_hotel_close();
        }, 500);
    });
    j("#pop_panel_hotel").mouseenter(function () {
        clearTimeout(nav_hotel_timeout);
    });
    j("#pop_panel_hotel").mouseleave(function () {
        nav_hotel_close();
    });

    j(".pop_panel .close").click(navclose);

    function nav_destn_open() {
        j("#nav_destn").addClass('active_nav_link');
        j("#nav_destn .arrow_down").removeClass('arrow_down').addClass('arrow_up');
        j("#pop_panel_destn").show();
    };
    function nav_destn_close() {
        j("#nav_destn").removeClass('active_nav_link');
        j("#nav_destn .arrow_up").removeClass('arrow_up').addClass('arrow_down');
        j("#pop_panel_destn").hide();
    };
        
    function nav_brand_open() {
        j("#nav_brand").addClass('active_nav_link');
        j("#nav_brand .arrow_down").removeClass('arrow_down').addClass('arrow_up');
        j("#pop_panel_brand").show();
    };
    function nav_brand_close() {
        j("#nav_brand").removeClass('active_nav_link');
        j("#nav_brand .arrow_up").removeClass('arrow_up').addClass('arrow_down');
        j("#pop_panel_brand").hide();
    };

    function nav_school_open() {
        j("#nav_school").addClass('active_nav_link');
        j("#nav_school .arrow_down").removeClass('arrow_down').addClass('arrow_up');
        j("#pop_panel_school").show();
    };
    function nav_school_close() {
        j("#nav_school").removeClass('active_nav_link');
        j("#nav_school .arrow_up").removeClass('arrow_up').addClass('arrow_down');
        j("#pop_panel_school").hide();
    };
    function nav_theme_open() {
        j("#nav_theme").addClass('active_nav_link');
        j("#nav_theme .arrow_down").removeClass('arrow_down').addClass('arrow_up');
         pop_panel_theme.show();
    };
    function nav_theme_close() {
        j("#nav_theme").removeClass('active_nav_link');
        j("#nav_theme .arrow_up").removeClass('arrow_up').addClass('arrow_down');
         pop_panel_theme.hide();
    };

    function nav_hotel_open() {
        j("#nav_hotel").addClass('active_nav_link');
        j("#nav_hotel .arrow_down").removeClass('arrow_down').addClass('arrow_up');
         j("#pop_panel_hotel").show();
    };
    function nav_hotel_close() {
        j("#nav_hotel").removeClass('active_nav_link');
        j("#nav_hotel .arrow_up").removeClass('arrow_up').addClass('arrow_down');
         j("#pop_panel_hotel").hide();
    };

    function navclose() {
        j("#nav_list a").removeClass('active_nav_link');
        j(".nav_list a span").removeClass('arrow_up').addClass('arrow_down');
        j(".pop_panel").hide();
    };
    

    var nav_customize_timeout;
    j("#nav_customize").mouseenter(function () {
        clearTimeout(nav_customize_timeout);
        nav_theme_close();
        nav_destn_close();
        nav_brand_close();
        nav_hotel_close();
        nav_customize_open();
    });
    j("#nav_customize").mouseleave(function () {
        nav_customize_timeout = setTimeout(function () {
            nav_customize_close();
        }, 500);
    });
    j("#pop_panel_customize").mouseenter(function () {
        clearTimeout(nav_customize_timeout);
    });
    j("#pop_panel_customize").mouseleave(function () {
        nav_customize_close();
    });
        
    function nav_customize_open() {
        j("#nav_customize").addClass('active_nav_link');
        j("#nav_customize .arrow_down").removeClass('arrow_down').addClass('arrow_up');
        j("#pop_panel_customize").show();
    };
    function nav_customize_close() {
        j("#nav_customize").removeClass('active_nav_link');
        j("#nav_customize .arrow_up").removeClass('arrow_up').addClass('arrow_down');
        j("#pop_panel_customize").hide();
    };

    //j("#nav_customize").hover(function() { j("#pop_panel_customize").show() }, function() { j("#pop_panel_customize").hide() });
}

//跳转登录，并写下回来的url进入cookie

function login_click() {
    //read cookie
    var isLogin = j.cookie("ticket_hhtravel") != null;

    if (isLogin) {

        if (isOfflineOrder) {
            deleteCookie("ticket_hhtravel", { "domain": cookieDomain, "expires": -1 });
            deleteCookie("client_hhtravel", { "domain": cookieDomain, "expires": -1 });
            j("#loginLink").html("登录");
            j("#userName").html("");
            j("#userSlash").hide();
            window.location.href = App_Root;
        } else {
            j.ajax({ url: App_Root + 'Shared/Logout',
                type: "post",
                success: function (data) {
                    if (data == "True") {
                        deleteCookie("ticket_hhtravel", { "domain": cookieDomain, "expires": -1 });
                        deleteCookie("client_hhtravel", { "domain": cookieDomain, "expires": -1 });
                        j("#loginLink").html("登录");
                        j("#userName").html("");
                        j("#userSlash").hide();
                        window.location.href = App_Root;
                    }
                },
                error: function () {
                }
            });
        }
        try {//傲梅埋点代码
            window._CWiQ = window._CWiQ || [];
            window.BX_CLIENT_ID = 37540; // 帐号ID
            _CWiQ.push(['_trackPdmp', "登出", 1]);
        } catch (e) { }
    } else {
        deleteCookie("client_hhtravel", { "domain": cookieDomain, "expires": -1 });
        j.cookie("login_backurl", window.location.href);
        j.cookie("login_method", "Get");
        //redirect to login page
        window.location.href = loginUrl;
        try {//傲梅埋点代码
            window._CWiQ = window._CWiQ || [];
            window.BX_CLIENT_ID = 37540; // 帐号ID
            _CWiQ.push(['_trackPdmp', "登录", 1]);
            _CWiQ.push(['_trackLogin', 1]); // 加于登录事件触发时（登录注册有专门的埋点代码）
        } catch (e) { }
    }
}

//改变出发城市
function changeCity(cityId, cityName) {
    var taipei = 617;
    if (cityId == taipei) {
        document.location.href = "http://tb.hhtravel.com";
    }
    else {
        j.cookie("DepartureCity", cityId, { expires: 7 });
        j.cookie("DepartureCityName", cityName, { expires: 7 });
        window.location.reload(true);
    }
}
//改变出发城市2
function changeCity2(cityId, cityName) {
    depart_hide();
    changeCity(cityId, cityName);
}


//#region 加载tag浮动逻辑

//加载tag浮动逻辑
function initTagTip(obj) {
    if (obj.text() == "奢华酒店体验") {
        setTipEvent(obj, "奢华酒店品牌，自由假期，轻松出发");
    }
    if (obj.text() == "国内体验") {
        setTipEvent(obj, "奢华品牌酒店+地道玩法套餐，国内短假 说走就走");
    }
}

var _tplTagTips = '<div style="display: none;" class="tag_tips" id="tagTips">\
                    <em class="arrow_top"></em>\
                    <span></span>\
                </div>';
//产品相关tag:浮动 显示
function setTipEvent(obj, text) {
    var tip = j("#tagTips");
    if (tip.length == 0) {
        tip = j(_tplTagTips);
        j("body").append(tip);
    }        
    obj.mouseover(function () {
        var height = obj.offset().top + 30;
        var width = obj.offset().left - 20;
        //alert("高度"+height+"-宽度"+width);
        tip.find("span").text(text);
        tip.css("top", height).css("left", width).css("display", "inline");
    });

    //移开HH33标签
    obj.mouseout(function () {
        tip.css("display", "none");
    });
}

//#endregion

//--------------------------------CTM相关操作 begin---------------------
var _CtmName = "ctm";
//添加ctm
function addCTM() {
    var ctmObj = getStorage(_CtmName);
    //判断是否已经加载ctm
    if (ctmObj)
        return;

    var referer = getReferer();
    var ctmValue = getCtmKey(referer);
    var userAgent = navigator.userAgent;
    ctmObj = { "CTM": ctmValue, "Referer": referer, "UserAgent": userAgent, "SourceType": "PC" };
    //保存 ,不兼容，则忽略
    try {
        var ctmObjValue = JSON.stringify(ctmObj);    
        sessionStorage.setItem(_CtmName, ctmObjValue);
    }
    catch (e) { }
    //关闭浏览器，就删除
    //    j.cookie(ctmName, ctmValue);
    //    j.cookie(ctmReferName, referer);
    //    j.cookie(isCtmName, 1);         // 加载过ctm
}

function getStorage(key) {
    var val;
    try {
        val = sessionStorage.getItem(key);
    }
    catch (e) { }

    return val;
}

function getJson(value)
{
    var json;
    try {
        json = JSON.parse(value);
    }
    catch (e) { }
    return json;
}

//添加提交表单中Ubt相关数据，添加隐藏域
function addUbtInfoForm(formId, prefixId) {
    var ctmVal = getStorage(_CtmName);
    if (!ctmVal)
        return;

    var ctmObj = getJson(ctmVal);
    if (!ctmObj)
        return;
    var $form = j("#" + formId);
    var name, val;
    for (var k in ctmObj) {
        if (prefixId)
            name = prefixId + "." + k;
        else
            name = k;
        val = ctmObj[k];
        $form.append(j("<input name='" + name + "' type='hidden' value='" + val + "'>"));
    }
}
//添加提交对象的Ubt相关数据
function addUbtInfoObject(obj, prefixId) {
    var ctmVal = getStorage(_CtmName);
    if (!ctmVal)
        return;

    var ctmObj = getJson(ctmVal);
    if (!ctmObj)
        return;
    var name, val;
    for (var k in ctmObj) {
        if (prefixId)
            name = prefixId + "." + k;
        else
            name = k;
        val = ctmObj[k];
        obj[name] = val;
    }
    return obj;
}
//ctm的白名单
var _CTMKeyList = ["hh_baidu_sem0", "hh_baidu_search0", "hh_baidu_ad0", "hh_baidu_seo", "hh_direct",
                    "tti_hp_sni_top_txt_9", "ssc_hp_sni_top_txt_9", "hh_ct_hp_bottomtx", "hh_ct_thp_nav", "hh_ct_thp_floor",
                    "ctm_vacations_entry_7", "hh_ct_hp_banner", "hh_ct_push", "hh_ct_edm"
                    ];

function getCtmKey(referer) {
    var ctmName = "ctm_ref", ctmValue = "";
    var ctmStr = window.location.hash.toLowerCase();
    if (ctmStr.length == 0)   //没有hash
    {
        if (!referer)
            ctmValue = "hh_direct";
        else if (referer.indexOf("baidu.com") >= 0)
            ctmValue = "hh_baidu_seo";
        else
            return "";
    }
    else {
        if (ctmStr.indexOf(ctmName) < 0)    //不存在ctm_ref，则空
            return "";

        var i = ctmStr.indexOf("&");
        var s = ("#" + ctmName + "=").length;
        if (i < 0)    //没有 & ，则都取
            ctmValue = ctmStr.substr(s);
        else       //否则 取到&为止
            ctmValue = ctmStr.substr(s, i - s);

        //        var i, len = _CTMKeyList.length;
        //        for (i = 0; i < len; i++) {
        //            if (_CTMKeyList[i] == ctmValue)
        //                break;
        //        }
        //        if (i == len)   //ctmValue no exists at _CTMKeyList
        //            return "";
    }
    return ctmValue;
}

function getReferer() {
    var referrer = document.referrer;
    if (!referrer) {
        try {
            if (window.opener) {
                // ie下如果跨域则抛出权限异常 
                // safari和chrome下window.opener.location没有任何属性 
                referrer = window.opener.location.href;
            }
        }
        catch (e) { }
    }
    return referrer.toLowerCase();
};
//--------------------------------CTM相关操作 end---------------------

// 数值显示为千分位
var formatToCurrency = function (num) {
    var numStr = num.toString();
    var re = /(\d{1,3})(?=(\d{3})+(?:$|\D))/g;
    numStr = numStr.replace(re, "$1,");
    return numStr;
};
/**Parses string formatted as YYYY-MM-DD to a Date object.
* If the supplied string does not match the format, an
* invalid Date (value NaN) is returned.
* @param {string} dateStringInRange format YYYY-MM-DD, with year in
* range of 0000-9999, inclusive.
* @return {Date} Date object representing the string.
*/
function parseISO8601(dateStringInRange) {
    var isoExp = /^\s*(\d{4})-(\d\d)-(\d\d)\s*$/,
       date = new Date(NaN), month,
       parts = isoExp.exec(dateStringInRange);

    if (parts) {
        month = +parts[2];
        date.setFullYear(parts[1], month - 1, parts[3]);
        if (month != date.getMonth() + 1) {
            date.setTime(NaN);
        }
    }
    return date;
}

/**Parses string formatted as YYYY-MM-DD 或者 YYYY-M-D
*/
function parseDate(dateStringInRange) {
    var isoExp = /^\s*(\d{4})-(\d?\d)-(\d?\d)\s*$/,
       date = new Date(NaN), month,
       parts = isoExp.exec(dateStringInRange);

    if (parts) {
        month = +parts[2];
        date.setFullYear(parts[1], month - 1, parts[3]);
        if (month != date.getMonth() + 1) {
            date.setTime(NaN);
        }
    }
    return date;
}

//cookie操作,http://hi.baidu.com/bareearthling/item/51c6c3ecf45192adc00d7540
jQuery.cookie = function (name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options = $.extend({}, options);
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString();
        }
        var path = options.path ? '; path=' + (options.path) : '; path=/';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

////删除cookie
//function deleteCookie(name) {
//    deleteCookie(name, '', { expires: -1 });
//}

//cookie的操作
function cookieExt(name, value, options) {
    if (options) {
        var domain = options.domain;
        if (!domain)
            options.domain = cookieDomain;   //默认值cookieDomain（来自_Header.cshtml定义)
    }
    else
        options = { domain: cookieDomain };
    j.cookie(name, value, options);
}

//删除cookie with options
function deleteCookie(name, options) {
    options = options || { expires: -1, domain: cookieDomain };

    j.cookie(name, '', options);
}

function addDate(date, days) {
    var result = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    result.setDate(result.getDate() + days);
    return result;
}

function dateToStr(date) {
    var padZero = function (i) {
        return (i < 10) ? "0" + i : "" + i;
    };
    var strDate = date.getFullYear() + '-' + padZero(date.getMonth() + 1) + '-' + padZero(date.getDate());
    return strDate;
}
var _eleTop;
var position = function (element) {
    //var top = element.position().top, pos = element.css("position");
    if (element.length == 0)
        return;
    _eleTop = element.offset().top;
    //j(window).unbind("scroll");

    j(window).scroll(function () {
        //var scrolls = j(this).scrollTop();
        //        var top1 = element.offset().top;
        //        if (_eleTop < top1)
        //            _eleTop = top1;
        setPosition(element, _eleTop);
        //            console.log("%d %d", top, scrolls);
        //            if (scrolls > top) {
        //                element.addClass("journey_date_fixed");
        //            }
        //            else {
        //                element.removeClass("journey_date_fixed");
        //            }
    });    
};

var setPosition = function (element, top) {
    if (element.length == 0)
        return;
    var scrolls = j(window).scrollTop();
    if(!top)
        _eleTop = element.offset().top;
    //console.log("%d %d", _eleTop, scrolls);
    if (scrolls > _eleTop) {
        element.addClass("journey_date_fixed");
    }
    else {
        element.removeClass("journey_date_fixed");
    }
}




// 修改按钮变成Disable
function ButtonDisable(btnId, loadText, parentCss) {
    var btn = j("#" + btnId);
    btn.attr("disabled", true);            //禁止重复点   add by luzm
    if (arguments.length == 1) {
        loadText = "正在提交中";
        parentCss = "btn_next_disable"
    }
    btn.html(loadText);
    btn.parent().removeClass();
    btn.parent().addClass(parentCss);
    btn.unbind();                    //移除所有事件
}

function ButtonDisable_B(btnId, loadText) {
    var btn = j("#" + btnId);
    btn.attr("disabled", true);            //禁止重复点   add by luzm
    btn.html(loadText);
    btn.removeClass("book_btn");
    btn.addClass("book_btn_disable");
    //btn.unbind();                    //移除所有事件
}

function ButtonEnable_B(btnId, loadText) {
    var btn = j("#" + btnId);
    btn.attr("disabled", false);            //禁止重复点   add by luzm
    btn.html(loadText);
    btn.addClass("book_btn");
    btn.removeClass("book_btn_disable")
    //btn.unbind();                    //移除所有事件
}


//#region 海外名校操作埋点

var _traceSchoolKey = ["hht_pc_list_basic_prd_click", "hht_pc_list_basic_filter_click",
                       "hht_pc_detail_basic_school_click","hht_pc_detail_basic_more_click",
                       "hht_pc_detail_school_relaprd_click", "hht_pc_detail_school_website_click"
                     ];

var _fcityname, _fcityid, _productid;
//初始化埋点相关数据
function initUbtValue() {
    _fcityname = j("#hideDepartureCityName").val();
    _fcityid = j.cookie("DepartureCity");
    _productid = j("#ProductID").val();
}
//列表页点击产品进入详情
function traceSchoolProductList()
{   
    var filter=getListFilter();
    $(".cmd_school a").each(function(index){
        index++;
        $(this).click(function(){
            var school={"CName":"","EName":"","ID":""};
            traceUbtKay(_traceSchoolKey[0],_fcityname,_fcityid,null,null,_productid,index,filter,null);
        });
    });
}

//列表页点击筛选栏
function traceSchoolProductList()
{
    var productid=$("#ProductID").val();
    var filter=getListFilter();
    
    $(".cmd_school a")(function(){
        traceUbtKay(_traceSchoolKey[1], _fcityname, _fcityid, null, null, null, null, filter, null);
    });
}

//产品详情页点击学校,且绑定事件
function traceSchoolProductDetail() {
    j(".cmd_school a").each(function (index, domEle) {
        j(this).unbind("click");
        index++;
        j(this).click(function () {
            //alert(index);
            var a = $(this);
            var cname = a.find(".detailSchoolChineseName").text();
            var ename = a.find(".detailSchoolEnglishName").text();
            var url = a.attr("href");
            var reg = /poiId=\d+/g;
            var poiId = url.match(reg).toString().replace("poiId=", '');
            var school = { "CName": cname, "EName": ename, "ID": poiId };
            traceUbtKay(_traceSchoolKey[2], _fcityname, _fcityid, null, null, null, index, null, school);
        });
        //alert(index + domEle);
    });
}
//产品详情页点击 展开更多
function traceSchoolMore()
{
    traceUbtKay(_traceSchoolKey[3], _fcityname, _fcityid, null, null, _productid, null, null, null);
}
//学校详情页-点击该校相关产品
function traceSchoolDetailRelateProduct() {
    var cname = $(".schoolChineseName").text();
    var ename = $(".schoolEngName").text();
    var reg = /poiId=\d+/g;
    var poiId = window.location.href.match(reg).toString().replace("poiId=", "");
    var regProduct = /product\d+/g;
    var school = { "CName": cname, "EName": ename, "ID": poiId };
    j(".goods_cmd a").each(function (index, domEle) {
        index++;
        j(this).click(function () {
            var productId = $(this).attr("href").match(regProduct).toString().replace("product", "");
            traceUbtKay(_traceSchoolKey[4], _fcityname, _fcityid, null, null, productId, index, null, school);
        });
    });
}
//学校详情页-点击学校官网
function traceSchoolWebUrl() {
    var cname = $(".schoolChineseName").text();
    var ename = $(".schoolEngName").text();
    var reg = /poiId=\d+/g;
    var poiId = window.location.href.match(reg).toString().replace("poiId=", "");
    var mpid = window.location.href.match(/pId=\d+/g);
    var productId = mpid ? mpid.toString().replace("pId=", "") : mpid;
    var school = { "CName": cname, "EName": ename, "ID": poiId };
    j(".schoolWebSite").parent().click(function () {
        if(productId)   //存在这个参数
            traceUbtKay(_traceSchoolKey[5], null, null, null, null, productId, null, null, school);
    });
}

function traceDetailFlight(traceKey, fcityname, fcityid, productid, chooseflight) {
    if (typeof window['__bfi'] == 'undefined') window['__bfi'] = [];

    var traceValue = getTraceObj(fcityname, fcityid, null, null, productid);        
    if (chooseflight!= undefined)
        traceValue.chooseflight = chooseflight;

    window['__bfi'].push(['_tracklog', traceKey, JSON.stringify(traceValue)]);
}

function traceUbtPersonCustom(traceKey, uid, city) {
    if (typeof window['__bfi'] == 'undefined') window['__bfi'] = [];
    var traceValue = {};

    if (uid)
        traceValue.uid = uid;
    if (city)
        traceValue.city = city;
    window['__bfi'].push(['_tracklog', traceKey, JSON.stringify(traceValue)]);
}

function traceUbtKay(traceKey, fcityname, fcityid, tcityname, tcityid, productid, index, filter, school) {
    if (typeof window['__bfi'] == 'undefined') window['__bfi'] = [];

    var traceValue = {};
    if (fcityname || fcityid)
        traceValue.from = { "cityname": fcityname, "cityid": fcityid };
    if (tcityname || tcityid)
        traceValue.to_dest = { "name": tcityname, "id": tcityid };
    if (productid)
        traceValue.productid = productid;
    if (index)
        traceValue.index = index;
    if (filter)
        traceValue.filter = filter;
    if (school) {
        traceValue.school = { "chnname": school.CName, "engname": school.EName, "schoolid": school.ID };
    }

    window['__bfi'].push(['_tracklog', traceKey, JSON.stringify(traceValue)]);
}

function getTraceObj(fcityname, fcityid, tcityname, tcityid, productid) {
    var traceValue = {};
    if (fcityname || fcityid)
        traceValue.from = { "cityname": fcityname, "cityid": fcityid };
    if (tcityname || tcityid)
        traceValue.to_dest = { "name": tcityname, "id": tcityid };
    if (productid)
        traceValue.productid = productid;
    return traceValue;
}

function getListFilter(vacationtype, type, dest, className,rank) {
    var filter = { "vacationtype": vacationtype, "type": type, "dest": dest, "class": className, "rank": rank };
    return filter;
}

//#endregion