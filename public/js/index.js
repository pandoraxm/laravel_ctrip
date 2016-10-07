j(document).ready(function () {

    if (typeof window['__bfi'] == 'undefined') window['__bfi'] = [];
    j('#mask_content_depart #mask_close').bind('click',function () { tracePageElementClick('fromclose_click') });
    j('#mask_content_depart .city_list  a').bind('click',function () { tracePageElementClick('from0choose_click') });
    j('.head_box_v2 .header .logo a').bind('click',function () { tracePageElementClick('hhlogo_click') });
    j('.head_box_v2 .header .pop_depart_city a').bind('click', function () { tracePageElementClick('fromcity_click') });

    j('#headerMyHHcenter').bind('click', function () {
        tracePageElementClick('myhh_click');
    });
    j('#banner_pic a').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('banner_click', { index: j(e.currentTarget).data('index') });
    });
    //search();
    j('#banner_pic a').hhSlide({
        thumbObj: '#banner_chose a'
    });
    j("#dest_list a").each(function (index, elem) {
        j(elem).data('index', index);
      
    }).bind('click', function (e) {
        tracePageElementClick('dest0icon_click', { index: j(e.currentTarget).data('index') });
    });
    j("#dest_pre").bind('click', function () {
        tracePageElementClick('dest0left_click');
    });
    j("#dest_next").bind('click', function () {
        tracePageElementClick('dest0right_click');
    });
    ///目的地产品点击
    j('.goods_list ').eq(0).children('li').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('dest0prd_click', { index: j(e.currentTarget).data('index') });
    });
    j("#inte_list a").each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('theme0icon_click', { index: j(e.currentTarget).data('index') });
    });
    j("#inte_pre").bind('click', function () {
        tracePageElementClick('theme0left_click');
    });
    j("#inte_next").bind('click', function () {
        tracePageElementClick('theme0right_click');
    });
    ///热门推荐产品点击
    j('.goods_list ').eq(2).children('li').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('recom0prd_click', { index: j(e.currentTarget).data('index') });
    });
    ///主题产品点击
    j('.goods_list ').eq(1).children('li').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('theme0prd_click', { index: j(e.currentTarget).data('index') });
    });
    ///顶级自驾产品点击
    ///变更为当季精选点击
    j('.goods_list ').eq(3).children('li').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('seasonal0prd_click', { index: j(e.currentTarget).data('index') });
    });
    ///一生必游产品点击
    ///变更为奢华酒店点击
    j('.goods_list ').eq(4).children('li').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('hotel0prd_click', { index: j(e.currentTarget).data('index') });
    });
    ///品牌介绍点击
    j('.brand_concept li').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('brand_click', { index: j(e.currentTarget).data('index') });
    });
    ///合作专区点击
    j('.cooperate_box').eq(1).children('a').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('cooper_click', { index: j(e.currentTarget).data('index') });
    });
    //底部footer的点击打点
    j('.foot_link .link_list a').each(function (index, elem) {
        j(elem).data('index', index);
    }).bind('click', function (e) {
        tracePageElementClick('bottom_click', { index: j(e.currentTarget).data('index'), name: j(e.currentTarget).text() });
    });
    //关闭二维码
    j("#div1").click(function () {
        if (j("#hdnStatus").val() == "0") {
            tracePageElementClick('ewm0close_click');
        }
    });
    j('#div2').bind('click', function () { tracePageElementClick('backtotop_click'); });
    j("#dest_list").hhScroll({ listChildObj: j("#dest_list a"), preObj: j("#dest_pre"), nextObj: j("#dest_next") });
    j("#inte_list").hhScroll({ listChildObj: j("#inte_list a"), preObj: j("#inte_pre"), nextObj: j("#inte_next") });
});
var tracePageElementClick= function (traceKey, extralTraceValObj) {
    var self = this;
    try {
        if (typeof window['__bfi'] == 'undefined') window['__bfi'] = [];
        var tracelog_CityName = j.cookie("DepartureCityName");
        var tracelog_cityId = j.cookie("DepartureCity");
        var traceValue = {
            from: { "cityname": tracelog_CityName, "cityid": tracelog_cityId }
        };
        if (extralTraceValObj && (typeof extralTraceValObj) == "object") {
            traceValue = $.extend({}, traceValue, extralTraceValObj);
        }
        traceKey = "hht_pc_home_basic_" + traceKey;
        window['__bfi'].push(['_tracklog', traceKey, JSON.stringify(traceValue)]);
    } catch (e) {
    }
};
function search() {
    j(".pop_search").hide();
    j(".banner_box .search input").focus(function () {
        j(".pop_search").show();
    });

    j(".banner_box .search input").blur(function () {
        j(".pop_search").hide();
    });

    j("#banner_box .search input").blur(function () {
        j(".pop_search").hide();
    });
}
(function ($) {
    $.fn.extend({
        hhSlide: function (o) {
            o = $.extend({
                thumbObj: null, //导航对象
                botPrev: null, //按钮上一个
                botNext: null, //按钮下一个
                changeType: 'fade', //切换方式，可选：fade,slide
                thumbCurClass: 'current', //导航对象当前的class
                thumbOverEvent: true, //鼠标经过thumbObj时是否切换对象，默认为true，为false时，只有鼠标点击thumbObj才切换对象
                slideTime: 1000, //平滑过渡时间，默认为1000ms，为0或负值时，忽略changeType方式，切换效果为直接显示隐藏
                autoChange: true, //是否自动切换
                clickFalse: true, //导航对象如果有链接，点击是否链接无效，即是否返回return false，默认是return false链接无效，当thumbOverEvent为false时，此项必须为true，否则鼠标点击事件冲突
                overStop: true, //鼠标经过切换对象时，切换对象是否停止切换，并于鼠标离开后重启自动切换，前提是已开启自动切换
                changeTime: 5000, //自动切换时间
                delayTime: 300//鼠标经过时对象切换迟滞时间，推荐值为300ms
            }, o || {});

            var _self = $(this);
            var thumbObj;
            var size = _self.size();
            var nowIndex = 0;
            var index;
            var startRun;
            var delayRun;
            var slideFinish = true;
            _init();
            _start();

            //初始化
            function _init() {
                _self.hide().eq(0).show();
                //导航对象
                if (o.thumbObj != null) {
                    //初始化thumbObj
                    thumbObj = $(o.thumbObj);
                    thumbObj.removeClass(o.thumbCurClass).eq(0).addClass(o.thumbCurClass);

                    //导航对象click事件
                    thumbObj.click(function () {
                        index = thumbObj.index($(this));
                        _run();
                        if (o.clickFalse == true) {
                            return false;
                        }
                    });
                    //导航对象hover事件
                    if (o.thumbOverEvent == true) {
                        thumbObj.mouseenter(function () {
                            clearInterval(startRun);
                            clearTimeout(delayRun);
                            index = thumbObj.index($(this));
                            delayRun = setTimeout(function () { _run(); clearInterval(startRun); }, slideFinish ? o.delayTime : o.slideTime);
                        });
                        thumbObj.mouseleave(function () {
                            clearTimeout(delayRun);
                            if (o.autoChange == true) {
                                delayRun = setTimeout(_next, o.changeTime);
                            }
                        });
                    }
                }

                //点击 按钮上一个
                if (o.botPrev != null) {
                    $(o.botPrev).click(function () {
                        if (_self.queue().length < 1) {//防止短时间连续点击
                            index = (nowIndex + size - 1) % size;
                            _run();
                        }
                        return false;
                    });
                }

                //点击 按钮下一个
                if (o.botNext != null) {
                    $(o.botNext).click(function () {
                        if (_self.queue().length < 1) {
                            _next();
                        }
                        return false;
                    });
                }
            }

            function _start() {
                //自动运行
                if (o.autoChange == true) {
                    startRun = setInterval(_next, o.changeTime);
                    if (o.overStop == true) {
                        _self.mouseenter(function () {
                            clearTimeout(delayRun);
                            clearInterval(startRun);
                        });
                        _self.mouseleave(function () {
                            startRun = setInterval(_next, o.changeTime);
                        });
                    }
                }
            }

            //下一个
            function _next() {
                index = (nowIndex + 1) % size;
                _run();
            }

            //切换	
            function _run() {
                if (nowIndex == index || !slideFinish) {
                    return;
                }
                slideFinish = false;
                if (o.thumbObj != null) {
                    $(o.thumbObj).removeClass(o.thumbCurClass).eq(index).addClass(o.thumbCurClass);
                }
                if (o.slideTime <= 0) {
                    _self.eq(nowIndex).hide();
                    _self.eq(index).show(function () { slideFinish = true; });
                }
                else if (o.changeType == 'fade') {
                    _self.eq(nowIndex).fadeOut(o.slideTime);
                    _self.eq(index).fadeIn(o.slideTime, function () { slideFinish = true; });
                }
                else {
                    _self.eq(nowIndex).slideUp(o.slideTime);
                    _self.eq(index).slideDown(o.slideTime, function () { slideFinish = true; });
                }
                nowIndex = index;
                if (o.autoChange == true) {
                    clearInterval(startRun); //重置自动切换函数
                    startRun = setInterval(_next, o.changeTime);
                }
                recoredPos();
            }
            function recoredPos() {
                tracePageElementClick('banner_show', { index: nowIndex });
            }
        }
    })
})(jQuery);
(function ($) {
    $.fn.extend({
        hhScroll: function (o) {
            o = $.extend({
                listObj: $(this),
                listChildObj: null,
                preObj: null,
                nextObj: null,
                elementWith: null, //元素宽度
                groupNum: 4, //组个数，每次移动4个元素
				timer: null,
				interval: 5000,
				action: 'next'
            }, o || {});

            var offsetCurrent = 0;
            if(!o.elementWith){
                o.elementWith=o.listChildObj.eq(0).outerWidth()+parseInt(o.listChildObj.eq(0).css("margin-left"))+parseInt(o.listChildObj.eq(0).css("margin-right"));
            }
            var offsetMax = (o.listChildObj.size() - o.groupNum) * o.elementWith;
            init();

            function init(){
                if (o.listChildObj.size() <= o.groupNum) {
                    o.preObj.hide();
                    o.nextObj.hide();
                }
                else {
                    updateUI();
                }
				interval();
            };
            function preHandler() {
                offsetCurrent = offsetCurrent - o.elementWith * o.groupNum;
                if (offsetCurrent < 0) {
                    offsetCurrent = 0;
                }
                o.listObj.stop().animate({
                    marginLeft: -offsetCurrent
                }, 'fast');
                updateUI();
				interval('prev');
            };
            function nextHandler() {
                offsetCurrent = offsetCurrent + o.elementWith * o.groupNum;
                if (offsetCurrent > offsetMax) {
                    offsetCurrent = offsetMax;
                }
                o.listObj.stop().animate({
                    marginLeft: -offsetCurrent
                }, 'fast');
                updateUI();
				interval('next');
            };
            function updateUI() {
                o.preObj.removeClass('pre').removeClass('pre_disable').unbind("click", preHandler);
                o.nextObj.removeClass('next').removeClass('next_disable').unbind("click", nextHandler);
                if (offsetCurrent <= 0) {
                    o.preObj.addClass('pre_disable');
                }
                else {
                    o.preObj.addClass('pre').bind("click", preHandler);
                }
                if (offsetCurrent >= offsetMax) {
                    o.nextObj.addClass('next_disable');
                }
                else {
                    o.nextObj.addClass('next').bind("click", nextHandler);
                }
            };
			function interval(actionType, now) {
				if (actionType) o.action = actionType;
				var inter = now != void 0 ? now: o.interval;
				clearTimeout(o.timer);
				o.timer = setTimeout(function () {
					if( o.action === 'next' ) {
					    if (!o.nextObj.hasClass('next_disable')) nextHandler();
						else {
							o.action = 'prev';
							interval(null, 0);
						}
					} else if ( o.action === 'prev' ) {
					    if (!o.preObj.hasClass('pre_disable')) preHandler();
						else {
							o.action = 'next';
							interval(null, 0);
						}
					}
				}, inter);
			}
        }
    })
})(jQuery);