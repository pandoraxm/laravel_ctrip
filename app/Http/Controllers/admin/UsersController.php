<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

class UsersController extends CommonController
{
    //分页浏览信息 
    public function index(Request $request)
    {
		
        $db = \DB::table("users");
        //判断并封装搜索条件
        $where = [];
        if($request->has("keyword")){
            $kw = $request->input("keyword");
            $db->where("name","like","%{$kw}%")->orwhere("email","like","%{$kw}%");
            $where['keyword'] = $kw;
        }

        $list = $db->paginate(5); //获取所有信息
        return view("admin.users.index",["list"=>$list,"where"=>$where]);
    }
    
    //浏览详情信息
    public function show($id)
    {
        return "详情".$id;
    }
    
    //添加表单
    public function create()
    {
        return view("admin.users.add");
    }
    
    //执行添加
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
            'email' => 'required|email',
            'password' => 'required|max:20|min:3',
        ]);
        //判断重复密码
        if($request->input("password")!=$request->input("repassword")){
            return back()->with("err","密码和重复密码不一致!");
        }
        
        //获取指定的部分数据
        $data = $request->only("name","email","password");
        $email = $request->email;
        $data['password'] = $data['password'];
        $data['created_at'] = time();
        $data['updated_at'] = time();
        $db = \DB::select("select * from users where email='$email'");
        
        if(!empty($db)){
            return redirect()->back()->withErrors('邮箱已存在,请重新填写!!!');
        }
        $id = \DB::table("users")->insertGetId($data);
        
        if($id>0){
            header("refresh:3;url='users'");
            print('修改成功!!!请稍等...<br>三秒后自动跳转~~~');
            
        }else{
           return back()->with("err","添加失败!");
        }
    }
    
    //执行删除
    public function destroy($id)
    {
        \DB::table("users")->where("id",$id)->delete();

        return redirect('admin/users');
    }
    
    //加载修改表单
    public function edit($id)
    {
        $users = \DB::table("users")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.users.edit",["vo"=>$users]);
    }
    
    //执行修改
    public function update($id,Request $request)
    {
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:16',
            'email' => 'required|email',
        ]);
        $data = $request->only("name","email");
        $data['updated_at'] = time();
        $id = \DB::table("users")->where("id",$id)->update($data);
        
        if($id>0){
            return redirect('admin/users');
        }else{
            return back()->with("err","修改失败!");
        }
        
    }
    
    //为当前用户准备分配角色信息
    public function loadRole($uid=0)
    {
        //获取所有角色信息
        // $rolelist = \DB::table("role")->get();

        $rolelist = \DB::select('select * from role');
        //获取当前用户的角色id
        // $rids = \DB::table("user_role")->where("uid",$uid)->pluck("rid");
        $rids = \DB::select('select rid from user_role where uid='.$uid);
        $rid = [];
        foreach($rids as $k=>$v){
            $rid[$k] = $v->rid;
        }

     


        //加载模板
        return view("admin.users.rolelist",["uid"=>$uid,"rolelist"=>$rolelist,"rids"=>$rid]);
    }
    
    public function saveRole(Request $request){
        $uid = $request->input("uid");
        //清除数据
        \DB::table("user_role")->where("uid",$uid)->delete();
        
        $rids = $request->input("rids");
        if(!empty($rids)){
            //处理添加数据
            $data = [];
            foreach($rids as $v){
                $data[] = ["uid"=>$uid,"rid"=>$v];
            }
            //添加数据
            \DB::table("user_role")->insert($data);
        }
        return "角色保存成功!";
    }
}
