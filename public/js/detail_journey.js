j(function () {
    j("#date_list a").each(function (i) {
        j(this).click(function () {
            j("html,body").stop().animate({ scrollTop: j("#jour" + Number(i + 1)).offset().top }, 0);
        });
    });
    

    var jour_datelist = j(".date_list")[0];
   
    var jour_ScrollBar = j("#date_list");
    var jour_prevGroup = j("#jour_pre");
    var jour_nextGroup = j("#jour_next");

    var jour_unit = 66;
    // jour_num = 14,
    var jour_num = jour_datelist?Math.round(jour_datelist.offsetWidth / jour_unit):0;
    var jour_groupLength = jour_unit * jour_num;

    jour_prevGroup.addClass('pre_disable').unbind('click');
    jour_nextGroup.addClass('next_disable').unbind('click');

    /* calculate the rest */
    var jour_sum = jour_ScrollBar.children().length;
    var jour_rest = jour_sum % jour_num;
    //var jour_maxGroupNum = jour_rest == 0 ? parseInt(jour_sum / 14) : parseInt(jour_sum / 14) + 1;
    var jour_maxGroupNum = jour_rest == 0 ? parseInt(jour_sum / jour_num) : parseInt(jour_sum / jour_num) + 1;
    var jour_maxOffset = -(jour_sum - jour_num) * jour_unit;

    function jour_slideTo(offset) {
        var slidefrom = jour_ScrollBar.data('offset');
        var slideToValue = offset;
        if (slidefrom == 0 && slideToValue != 0) {
            jour_prevGroup.removeClass('pre_disable').bind('click', jour_prevGroupHandler);
            jour_prevGroup.addClass('pre');
        }
        if (slidefrom == jour_maxOffset && slideToValue != jour_maxOffset) {
            jour_nextGroup.removeClass('next_disable').bind('click', jour_nextGroupHandler);
            jour_nextGroup.addClass('next');
        }
        jour_ScrollBar.stop().animate({
            marginLeft: slideToValue
        }, 'fast', function () { });
        jour_ScrollBar.data('offset', slideToValue);
        jour_updateUI();
    }

    function jour_prevGroupHandler() {
        if (jour_ScrollBar.data('offset') > -jour_groupLength) {
            jour_slideTo(0)
        } else {
            jour_slideTo(jour_ScrollBar.data('offset') + jour_groupLength);
        }
    }

    function jour_nextGroupHandler() {
        if (jour_ScrollBar.data('offset') < jour_maxOffset + jour_groupLength) {
            jour_slideTo(jour_maxOffset)
        } else {
            jour_slideTo(jour_ScrollBar.data('offset') - jour_groupLength);
        }
    }

    function jour_updateUI() {
        var offset = jour_ScrollBar.data('offset');
        if (offset == 0) {
            jour_prevGroup.addClass('pre_disable').unbind('click');
        } else if (offset == jour_maxOffset) {
            jour_nextGroup.addClass('next_disable').unbind('click');
        }
    }
    jour_ScrollBar.data('offset', 0);
    jour_updateUI();
    if (jour_sum > jour_num) {
        jour_nextGroup.removeClass('next_disable').bind('click', jour_nextGroupHandler);
    }
});