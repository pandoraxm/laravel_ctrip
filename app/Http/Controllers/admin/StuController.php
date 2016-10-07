<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hash;

class StuController extends CommonController
{   
    //显示用户
    public function index()
    {   
        $users = \DB::table('user')->get();
        return view("admin.stu.table",['user'=>$users]);
    }

    //用户删除
    public function destroy($id)
    {

        $info = \DB::table('user')->where('uid', '=', $id)->delete();
        return redirect('/stu');
    }

    //修改
    public function edit($id)
    {
    
        $data = \DB::table('user')->where('uid', $id)->first();

        return view('admin.stu.doedit',['data'=>$data]);

    }
    //执行修改
    public function update(Request $request,$id)
    {
        //1 获得表单提交的数据 
        $data = $request->only("uname","sex","age","email","tel");
        $info = \DB::table("user")->where("uid",$id)->update($data);

        if($info>0){
            return redirect('/stu');
        }else{
            return view('admin.stu.doedit',['data'=>$data]);
        }
    }


    //显示添加
    public function create()
    {
        return view("admin.stu.add");
    }


    //执行添加
    public function store(Request $request)
    {
        $upwd = md5($request->upwd);

     
        $data = $request->only("uname","upwd","sex","age","email","tel");

        $add = [];
        foreach ($data as $k=>$v) {
            if($k == "upwd"){
                $v = $upwd;
            }
            $add[$k] = $v;
        }
        $id = \DB::table("user")->insertGetId($add);

        return redirect('/stu');
    }

}



