j(function () {

    var agent = navigator.userAgent.toLowerCase();
    //var ipad = agent.match(/ipad/);
    var iphone = agent.match(/iphone/);
    var windowsPhone = agent.match(/windows phone/);
    var android = agent.match(/android/);

    //判断是否手机
    if ( iphone != null || windowsPhone != null || android != null) {
        var list = location.href.split(/product/);
        if (list.length == 2) {
            var productID = list[1].split(/d/)[0];
            if (!isNaN(productID))//如果ID是数字
            {
                var id = j.cookie("DepartureCity"); //$(".header").find(".current").attr("onclick").replace("changeCity(", "").replace(")", "");
                checkUrlGotoH5(1, productID, id);
                return;
            }

        }
        checkUrlGotoH5(2, 0, 0);
        return
    }

});

function checkUrlGotoH5(type,productID,id) {
    var url = "";
    //FAT环境
    if (location.href.match(/fat.qa.nt/) != null) {
        url = "http://w-hhtravel-m.fat8.qa.nt.ctripcorp.com/webapp/hhtravel";
    }
    //UAT环境
    else if (location.href.match(/uat.qa.nt/) != null) {
        url = "http://m.uat.qa.nt.ctripcorp.com/webapp/hhtravel";
    }
    //本地
    else if (location.href.match(/localhost/) != null) {
        url = "http://localhost/webapp/hhtravel";
    } else {
        url = "http://m.ctrip.com/webapp/hhtravel";
    }
    if (type == 1) {
        location.href = url + "/Detail/" + productID + "/" + id + "/nopage";
    } else
        location.href = url;
}