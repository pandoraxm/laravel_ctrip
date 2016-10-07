<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class wzController extends Controller
{
    //
    // public function index(){
    // 	return view("home.wz.index");
    // }
    
    public function index(Request $request)
    {
		
        $db = \DB::table("posts")->where("status",'1');
        //判断并封装搜索条件
        $where = [];

        if($request->has("name")){
            $name = $request->input("name");
            $db->where("title","like","%{$name}%");
            $where['name'] = $name;
        }
        if($request->has("type")){
            $type = $request->input("type");
            $db->where("type","=",$type);
            $where['type'] = $type;
        }
        //dd($where);
        $list = $db->paginate(5);

        //dd($list);
        return view("home.wz.index",["list"=>$list,"where"=>$where]);
    }

    public function index1(Request $request)
    {
        
        $db = \DB::table("posts")->where("status",'1');
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("title","like","%{$name}%");
            $where['name'] = $name;
        }
        if($request->has("type")){
            $type = $request->input("type");
            $db->where("type","=",$type);
            $where['type'] = $type;
        }
        $list = $db->paginate(3);

        //dd($list);
        return view("home.wz.article",["list"=>$list,"where"=>$where]);
    }

    public function index2(Request $request)
    {
        
        $db = \DB::select("select * from posts");
 
        $list = $db;
        return view("home.wz.img",["list"=>$list]);
    }
}
