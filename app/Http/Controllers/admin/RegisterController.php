<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //注册表单
    public function index()
    {
    	return view("admin.register.register");
    }

    //插入到数据库
    public function register(Request $request)
    {
    	//dd($request);
    	$data = $request->only("name","email","password");
    	//2 添加到数据库
        $id = \DB::table("users")->insertGetId($data); 
         if($id>0){
         	header("refresh:3;url=login");
			print('添加成功!!!请稍等...<br>三秒后自动跳转~~~');
            // return redirect('admin/login');
         }else{
             return back()->with("err","注册失败!");
         }
    	
    }
}
