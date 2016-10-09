#携程旅游网项目说明
[toc]

#项目名称:携程旅游网

##1.本项目是基于laravel框架开发的类似携程网站的一个旅游网站.
###1.1前台主要功能有:前台用户登录注册,个人中心,用户资料修改,景点浏览,景点详情,线路规划,机票查询订购,火车票查询订购,首页广告轮播,攻略推荐,图片上墙,客服,天气等功能模块,.
###1.2后台主要功能有:后台商家登录,商家用户权限管理,首页轮播图管理,景点分类管理,景点管理,飞机票管理,火车票管理,数据分析生成统计图,文章管理,客服管理,前台用户管理.

##2.数据字典库设计(举例)
	机票字段
	
	CREATE TABLE `air` (
	  `aid` int(255) UNSIGNED NOT NULL,
	  `carrierCom` varchar(255) DEFAULT NULL,
	  `flightCode` varchar(255) NOT NULL,
	  `planeType` varchar(255) DEFAULT NULL,
	  `departureTime` char(16) NOT NULL DEFAULT '' COMMENT 'aid',
	  `arrivalTime` char(16) NOT NULL,
	  `departureAirport` varchar(255) NOT NULL,
	  `arrivalAirport` char(16) NOT NULL,
	  `costTime` char(16) DEFAULT NULL,
	  `planeMemo` decimal(6,2) NOT NULL,
	  `correctness` varchar(255) DEFAULT NULL,
	  `status` enum('1','2') NOT NULL DEFAULT '1',
	  `startCity` varchar(255) NOT NULL,
	  `endCity` varchar(255) NOT NULL,
	  `cnt` int(32) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;    


	火车票字段
	
	CREATE TABLE `train` (
	  `tid` int(11) NOT NULL,
	  `trainCode` varchar(32) NOT NULL,
	  `trainGrade` varchar(32) DEFAULT ' 动车组',
	  `startStation` varchar(32) NOT NULL,
	  `arriveStation` varchar(32) NOT NULL,
	  `startTime` char(16) NOT NULL,
	  `endTime` char(16) NOT NULL,
	  `takeTime` char(16) DEFAULT NULL,
	  `day_diff` varchar(32) DEFAULT NULL,
	  `two_prc` int(6) NOT NULL,
	  `one_prc` int(6) NOT NULL,
	  `one_seat_cnt` int(6) NOT NULL,
	  `two_seat_cnt` int(6) NOT NULL,
	  `status` enum('1','2') NOT NULL DEFAULT '1'
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##3.项目截图

###前台首页
![前台首页](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qr0porsj210y1omni1.jpg"前台首页")

###景点列表页
![景点列表页](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89qqynomhj210y0pwwp1.jpg"景点列表页")


###景点详情页及行程安排
![景点详情页及行程安排](http://ww2.sinaimg.cn/mw690/658dc60bgw1f89qsdiqqyj210y1huawy.jpg"景点详情页及行程安排")

###前台登录注册
![前台登录注册](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qseuoz9j20xw0fuaaw.jpg"前台登录注册")

###客服
![客服](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89qqtofcnj20b50680tf.jpg"客服")

###天气预报
![天气预报](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qrdjphjj20cs07pwfa.jpg"天气预报")



###个人中心及广告播放
![个人中心及广告播放](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qq9l4ulj21050hvn3z.jpg"个人中心及广告播放")

###火车票及机票首页
![火车票及机票首页](http://ww2.sinaimg.cn/mw690/658dc60bgw1f89qqhhk4lj210y1tlnmi.jpg"火车票及机票首页")

###火车票及机票查询列表页
![火车票及机票首页](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qqd8vb1j210y0x6n4g.jpg"火车票解机票查询列表页")

###火车票及机票订购
![火车票及机票订购](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qqbxfigj211y0fdwi7.jpg"火车票及机票订购")

###攻略标准文章列表页
![攻略标准文章列表页](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qqbxfigj211y0fdwi7.jpg"攻略标准文章列表页")

###攻略首页广告轮播及文章列表展示
![攻略首页广告轮播及文章列表展示](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qqbxfigj211y0fdwi7.jpg"攻略首页广告轮播及文章列表展示")

###照片墙
![照片墙](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89qsirwfhj210y1ftqic.jpg"照片墙")


_________________________________________________________________________________________

##后台

###商家登录
![商家登录](http://ww1.sinaimg.cn/mw690/658dc60bgw1f89qqvr1grj211y0lcwiu.jpg"商家登录")


###首页轮播图管理
![轮播图](http://ww1.sinaimg.cn/mw690/658dc60bgw1f89syzkcd6j211g0j5gqg.jpg")

###首页展示管理
![首页展示管理](http://ww2.sinaimg.cn/mw690/658dc60bgw1f89qr47uomj210y0lyn2x.jpg"首页展示管理")

###分类管理
![分类管理](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89qqrj8haj210y0j5tdc.jpg"分类管理")

###景点管理
![景点管理](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89qqsujgcj210y0p7qbs.jpg"景点管理")

###线路管理
![线路管理](http://ww1.sinaimg.cn/mw690/658dc60bgw1f89qqao72yj210y0yvnau.jpg"线路管理")

###数据统计图
![数据统计图](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qr4ya1bj210y0u5wk3.jpg"数据统计图")

###机票管理
![机票管理](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qqnizh5j210y0s9k1k.jpg"机票管理")

###火车票管理
![火车票管理](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qqd0au1j210y12t7ee.jpg"火车票管理")

###商家用户角色管理
![商家用户角色管理](http://ww3.sinaimg.cn/mw690/658dc60bgw1f89qqpgow1j211f0hpwik.jpg"商家用户角色管理")

###商家用户权限管理
![商家用户权限管理](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89qqq8idyj210y0mf7ao.jpg"商家用户权限管理")

###文章管理
![文章管理](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89qrq3ve6j210y0m4dlb.jpg"文章管理")


###前台用户管理
![前台用户管理](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89syxi4e8j211g0j5wk7.jpg"前台用户管理")

###用户中心轮播图管理
![用户中心轮播图管理](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89sywt4z2j211g0mgafj.jpg"用户中心轮播图管理")

###客服管理
![客服管理](http://ww4.sinaimg.cn/mw690/658dc60bgw1f89sywhvrxj211g0j5juu.jpg"客服管理")

