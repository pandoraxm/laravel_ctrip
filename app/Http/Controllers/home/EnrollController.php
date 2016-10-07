<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\demo;

use DB;


class EnrollController extends Controller
{
    //注册表单
    public function enroll()
    {
    	// return '注册表单噢';

    	return view("enroll.enroll");
    }

    public function doEnroll(Request $request)
    {

    	$upwd = md5($request->upwd);


        $data = $request->only("uname","upwd","email","tel");

        $add = [];
        foreach ($data as $k=>$v) {
  			if($k == "upwd"){
  				$v = $upwd;
  			}
  			$add[$k] = $v;
        }

        $state = \DB::table("user")->insert($add);


        // return view("login.login");
		return redirect()->action('SpotController@show');
    }


}



