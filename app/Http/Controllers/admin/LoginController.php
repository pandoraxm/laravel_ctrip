<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Session;

class LoginController extends Controller
{
    //1 登录表单
    public function login()
    {
    	return view("admin.login.login");
    }

    //2 执行登录
    public function doLogin(Request $request)
    {
    	//return "执行登录";
    	// echo $request->input('code');
    	// echo "<hr>";
    	// dd(session::get('mycode'));
    	// 1 验证验证码
    	$mycode = Session::get('mycode');

    	if($request->input('code')!== $mycode){

    		return back()->with("msg","验证码错误");
    			//跳转方式1
    			//session::flash("msg","验证码错误!");
    			//return redirect("admin/login");	
    	}

    	//获得邮箱和密码信息
    	$email = $request->input("email");
    	$password = $request->input("password");
    	//2 验证账号
    	//验证邮箱是否存在
    	$ob = \DB::table("users")->where("email",$email)->first();
    	//dd($ob);
        //验证邮箱是否存在
        if($ob){
            //验证密码是否正确
            if($ob->password==$password){
                //登录成功写入到session
                Session::set("username",$ob);
                return redirect("admin/index");
            }else{
                return back()->with("msg","用户名或密码错误");
            }
        }
        return back()->with("msg","用户名或密码错误");
    }


    //3 执行退出
    public function logout()
    {
    	//删除session值
        session::forget("username");
        //跳转
        return redirect("admin/login");
    }

    //4 验证码
    public function captcha($tmp)
    {
                //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 34, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //echo $phrase;

        //把内容存入session
        Session::flash('mycode', $phrase);
        //Session()->flash('mycode',$phrase);
        //echo "<hr>";
        //dd(Session::get('mycode'));
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
}
