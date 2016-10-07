<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class LoginController extends Controller
{
	public function login()
	{

		//登录页面
	    return view("login.login");
	}

	//执行登录
	public function doLogin(Request $request)
	{
		// return "执行登录";
		 // echo $request->input('code');
		 
		 $mycode = Session::get("mycode");

		 if($request->input('code')!==$mycode){
		 	return back()->with("msg","警告! 您输入的验证码错误,请重新输入");
		 }

		 //获得用户名和密码
		 $uname = $request->input("uname");
		 $upwd = md5($request->input("upwd"));
		 $ob = \DB::table("user")->where("uname",$uname)->first();


		 if($ob){
		 	//验证
		 	if( $ob->upwd == $upwd ){
		 		//登录成功  写入到session 		
		 		Session::set("uname",$ob);

		 		return redirect()->action('SpotController@show');

		 	}else{
		 		return back()->with("msg","警告!您输入的密码有误请重新输入");
		 	}
		 }
		 		return back()->with("msg","警告!您输入的用户有误请重新输入");
	}

	//执行退出
	public function logout()
	{
		// return "执行退出";
		session::forget("uname");
		//跳转
		return view("welcome");
	}

	public function captcha($tmp)
	{
		//生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        // dd($phrase);//输出随机字符串的值 
        // echo $phrase;
        //把内容存入session
        Session::flash('mycode', $phrase);//通过静态方法的方式使用flash
        // session()->flash('mycode',$phrase);//使用对象和方法的方式使用flash方法
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
 
	}

}