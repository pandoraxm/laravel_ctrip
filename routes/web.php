<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*****************************************林文康*******************************************/
Route::get('/wel', function () {
    return view('/home.wel');
});
Route::get("/wel","SpotController@show");
Route::get("/home/class/{id}","ClassController@skip");

Route::get('home/detail/{id}','DetailController@index');

Route::post('admin/lbt/{id}/update','admin\LbtController@update');
Route::get('/admin/lbt/create','admin\LbtController@create');
Route::get("/admin/sx","admin\LbtController@index");
Route::post("/admin/sx","admin\LbtController@index");
Route::get("admin/lbt/{id}","admin\LbtController@ed");
Route::resource("admin/lbt","admin\LbtController");

// Route::get("/admin/show","admin\ShowController@index");
Route::get('/admin/show/create','admin\ShowController@create');
Route::get("admin/show/{id}","admin\ShowController@change");
Route::resource("admin/show","admin\ShowController");
Route::post('admin/show/{id}/update','admin\ShowController@update');
Route::get("/admin/show123","admin\ShowController@index");
Route::post("/admin/show123","admin\ShowController@index");
// Route::get("/show","admin\ShowController@add");

// Route::resource("admin/class","admin\ClassifyController");
Route::post("/admin/class/add","admin\ClassifyController@store");
Route::get("/admin/class/{id?}","admin\ClassifyController@index");
Route::get("/admin/class/{id}/change","admin\ClassifyController@change");
Route::get('/admin/class/create/{id}','admin\ClassifyController@create');
Route::get('/admin/class/edit/{id}','admin\ClassifyController@edit');
Route::post('admin/class/{id}/update','admin\ClassifyController@update');
Route::get('admin/class/del/{id}','admin\ClassifyController@del');


Route::get("/admin/scenic/","admin\ScenicController@index");
Route::get("/admin/scenic/create","admin\ScenicController@create");
Route::post("/admin/scenic/add","admin\ScenicController@store");
Route::post("/admin/scenic/{id}/update","admin\ScenicController@update");
Route::get("/admin/scenic/editx/{id}","admin\ScenicController@editx");
Route::get("/admin/scenic/editt/{id}","admin\ScenicController@editt");
Route::get("/admin/scenic/{id}/change","admin\ScenicController@change");
Route::get("/admin/scenic/{id}/del","admin\ScenicController@del");
Route::get("/admin/scenic123","admin\ScenicController@index");
Route::post("/admin/scenic123","admin\ScenicController@index");

Route::get("/admin/scenic/trip/{id}","admin\TripController@index");
Route::get("/admin/scenic/trip_create/{id}","admin\TripController@trip_create");
Route::post("/admin/scenic/trip_add","admin\TripController@trip_add");
Route::post("/admin/scenic/{id}/trip_update","admin\TripController@trip_update");
Route::get("/admin/scenic/trip_edit/{id}","admin\TripController@trip_edit");
Route::get("/admin/scenic/{id}/trip_change","admin\TripController@trip_change");
Route::get("/admin/scenic/{id}/trip_del/","admin\TripController@trip_del");

Route::get("/admin/scenic/trip_img/{id}","admin\TripController@trip_img");
Route::get("/admin/scenic/img_create/{id}","admin\TripController@img_create");
Route::post("/admin/scenic/img_add","admin\TripController@img_add");
Route::get("/admin/scenic/{id}/img_change","admin\TripController@img_change");
Route::get("/admin/scenic/img_edit/{id}","admin\TripController@img_edit");
Route::post("/admin/scenic/{id}/img_update","admin\TripController@img_update");
Route::get("/admin/scenic/{id}/img_del/","admin\TripController@img_del");

/*****************************************林文康*******************************************/

 	Route::get('/', function () {
     	return view('welcome');
	});


 	//注册用户
	Route::get("admin/register","admin\RegisterController@index");
	Route::post("admin/doRegister","admin\RegisterController@register");
	//管理后台登录 不需要登录
	Route::get("admin/login","admin\LoginController@login");
	Route::post("admin/doLogin","admin\LoginController@doLogin");
	Route::get("admin/captcha/{tmp}","admin\LoginController@captcha");

	//需要登录
	Route::group(["prefix"=>"admin","middleware"=>"myauth"],function(){
	Route::get("/logout","admin\LoginController@logout");
	Route::get("/index","admin\IndexController@index");

    });
	// //学生信息查询
	// Route::resource("/stu","admin\StuController");
	

	// //执行文件上传操作
	// Route::post('stu/upload',"Admin\StuController@doUpload");



	//Chart.js数据报表显示实例
    Route::get('/admin/chart',"admin\ChartController@index");
    
    //前台火车票管理
    Route::get('/home/hcp',"home\HcpController@index");
    Route::post('/home/TrainList',"home\TrainListController@index");
    Route::post('/home/show',"home\TrainListController@show");
	/*********************前台飞机票管理***************************/
    //前台机票管理
   Route::get('/home/fly',"home\FlyController@index");
   Route::post('/home/FlyList',"home\FlyListController@index");
    
    Route::get('/home/show2',"home\FlyListController@show");
    Route::post('/home/show2',"home\FlyListController@show");

    //用户角色
    Route::get('/admin/users', "Admin\UsersController@index");
    Route::get('/admin/users/create',"Admin\UsersController@create");
    Route::post('/admin/users',"Admin\UsersController@store");
    //角色管理
    Route::get('/admin/role', 'Admin\RoleController@index');
    Route::get('/admin/role/create', 'Admin\RoleController@create');
    Route::post('/admin/role', 'Admin\RoleController@store');
    Route::get('/admin/role/edit','Admin\RoleController@edit');
    
    Route::post('/admin/role?{$vo->id}','Admin\RoleController@doedit');
    //权限节点管理
    Route::resource('/admin/node', 'Admin\NodeController');
    
    Route::get('users/loadRole/{uid}',"Admin\UsersController@loadRole");
    Route::post('users/saveRole',"Admin\UsersController@saveRole");
    
    Route::get('role/loadNode/{rid}',"Admin\RoleController@loadNode");
    Route::post('role/saveNode',"Admin\RoleController@saveNode");




    //Route::get('/admin/train',"admin\TrainController@index");
    //Route::post('/admin/train',"admin\TrainController@index");
	/*****************火车票信息管理******************/
    Route::get('/admin/train',"admin\TrainController@index");
    Route::post('/admin/train',"admin\TrainController@index");
    Route::get('/admin/train1',"admin\TrainController@edit");
    Route::post('/admin/train1',"admin\TrainController@doedit");
    Route::get('/admin/train2',"admin\TrainController@add");
    Route::post('/admin/train2',"admin\TrainController@doadd");
    Route::get('/admin/train3',"admin\TrainController@dodel");

    /******************机票信息管理****************/
    Route::get('/admin/air',"admin\AirController@index");
    Route::post('/admin/air',"admin\AirController@index");
    Route::get('/admin/air1',"admin\AirController@edit");
    Route::post('/admin/air1',"admin\AirController@doedit");
    Route::get('/admin/air2',"admin\AirController@add");
    Route::post('/admin/air2',"admin\AirController@doadd");
    Route::get('/admin/air3',"admin\AirController@dodel");

	 Route::get('/admin/wz',"admin\WzController@index");
     Route::post('/admin/wz/show',"admin\WzController@index");
     Route::get('/admin/wz/show',"admin\WzController@index");
     Route::get('/admin/wz1',"admin\WzController@create");
     Route::post('/admin/wz',"admin\WzController@store");
    Route::get('/admin/wz/{id}/edit',"admin\WzController@edit");
    Route::get('/admin/wz3/{id}/des/',"admin\WzController@destroy");
   
   /*******************前台文章**********************/
    Route::get('/home/wz',"home\WzController@index");
    Route::post('/home/wz',"home\WzController@index");
    Route::get('/home/wz1',"home\WzController@index1");
    Route::get('/home/wz2',"home\WzController@index2");
/***************************************杨帆******************************************/
 //    Route::get('ajax',function(){
 //  	 return view('message');
	// });
	// Route::get('/getmsg','AjaxController@index');

 // 	Route::get("/admin",function(){
 // 		return view("admin.stu.table");
 // 	});

	// Route::get("/add",function(){
 // 		return view("admin.stu.add");
 // 	});

	//输出验证码
	//Route::get("/captcha/{tmp}","admin\CodeController@captcha");
/******************************************叶世昌*************************************************/
	//注册页面
Route::get('/enroll/enroll',"Home\EnrollController@enroll");
Route::post('/enroll/enroll',"Home\EnrollController@doEnroll");

//登录页面
Route::get('/login/login',"Home\LoginController@login");
Route::post('/login/doLogin',"Home\LoginController@doLogin");
Route::get('/login/captcha/{tmp}',"Home\LoginController@captcha");
Route::get('/login/logout',"Home\LoginController@logout");

//个人中心
Route::get('/personal/personal',"Home\PersonalController@personal");

//个人中心修改
Route::get('/personal/revise',"Home\PersonalController@revise");

//跳转首页
Route::get('/personal/welcome',"Home\PersonalController@welcome");

//执行修改
Route::post('/personal/dorevise/{id}',"home\PersonalController@dorevise");

//天气
Route::get('/tianqia', function(){
        $json = file_get_contents('https://api.thinkpage.cn/v3/weather/now.json?key=yjfwsn87ggfmojel&location=ip&language=zh-Hans&unit=c');

        return $json;
    });

//修改密码
Route::get('reupwd/reupwd',"Home\PersonalController@reupwd");

//执行修改
Route::post('reupwd/doreupwd',"Home\PersonalController@doreupwd");



//后台注册用户
	Route::get("admin/register","admin\RegisterController@index");
	Route::post("admin/doRegister","admin\RegisterController@register");
	//管理后台登录 不需要登录
	Route::get("admin/login","admin\LoginController@login");
	Route::post("admin/doLogin","admin\LoginController@doLogin");
	Route::get("admin/captcha/{tmp}","admin\LoginController@captcha");


// //中间件
// 	Route::group(["middleware"=>"myauth"],function(){
// 	Route::get("/logout","admin\LoginController@logout");
// 	Route::get("/index","admin\IndexController@index");
// });

	Route::resource("/stu","admin\StuController");

//广告
	Route::get("admin/ad","admin\AdController@index");

//添加广告
	Route::get("admin/add","admin\AdController@add");

// 执行添加
	Route::post("admin/add","admin\AdController@doadd");

// 修改状态
   	Route::get("admin/doedit/{id}","admin\AdController@edit");

// 删除广告
   	Route::get("admin/dodel/{id}","admin\AdController@del");


// 客服首页
    Route::resource("/admin/service","admin\ServiceController");
// 添加客服
    Route::get("/admin/service/{id}/destroy","admin\ServiceController@destroy");
//调用客服
	Route::get('/kefu', function(){
		$data = DB::table('service')
			->inRandomOrder()
			->take(1)
			->get();

		return $data;
	});
/********************************************ysc*************************************************/
	
	