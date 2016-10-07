<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use Hash;
use DB;
class PersonalController extends Controller
{
    //显示个人中心
    public function personal()
    {
        $uid = Session('uname')->uid;
        $users = \DB::table("user")->where("uid",$uid)->first();

        $kefu = \DB::table("service")->get();
        return view("personal/personal",['users'=>$users,'kefu'=>$kefu]);

    }

    //修改
    public function revise()
    {   
        $ad = \DB::table("xcad")->where("status",1)->get();
    	return view("personal/revise",['ad'=>$ad]);
    }

    //去主页
    public function welcome()
    {
    	return view("/welcome");
    }

    //修改个人信息
    public function dorevise(Request $request,$id)
    {

    	$data = $request->only("uname","age","sex","tel","email");

    	$state = \DB::table("user")->where("uid",$id)->update($data);

    	return redirect()->action('Home\PersonalController@personal');
    }



    //修改密码
    public function reupwd()
    {
        return view("personal/erupwd");
    }

    //执行修改
    public function doreupwd(Request $request)
    {
        $username = Session::get('name');

        $upwd = md5($request->upwd);

        $data = $request->only("upwd");

        $add = [];
        foreach ($data as $k=>$v) {
            if($k == "upwd"){
                $v = $upwd;
            }
            $add[$k] = $v;
        }

        $state = \DB::table("user")->where("uname",$username)->update($add);
		
        return view("/welcome");
    }


}
