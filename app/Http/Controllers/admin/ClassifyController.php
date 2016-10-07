<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClassifyController extends Controller
{

    public function index($id= 0)
    {
        $list = \DB::table("point_name")->where('pid',$id)->get();
        $lists = \DB::table("point_name")->where('id',$id)->get();
        // dd($list);
        return view("admin.class.index",["list"=>$list,"lists"=>$lists]);
    }

    public function change($id)
    {
        $sta = \DB::select("select status from point_name where id=$id");
        if ($sta[0]->status == 0) {
            $id = \DB::table("point_name")->where("id",$id)->update(array('status'=>'1'));
        }else{
            $id = \DB::table("point_name")->where("id",$id)->update(array('status'=>'0'));
        }
        if($id){
            return redirect("admin/class");
        }else{
            return back()->with('修改失败');
        }
    }

    public function create($id)
    {
        if ($id == 0) {
            $a = array('path'=>'0,','pid'=>'0');
            $aa = (object)$a;
            $da = array($aa);
        } else {
            $da = \DB::select("select path,pid from point_name where id=$id");
            foreach ($da as $k => $v) {
                $v->path = $v->path.$id.',';
                $v->pid = $id;
            }
        }
        // dd($da);
        return view("admin.class.add",["da"=>$da]);
    }

    public function store(Request $request)
    {

                $data = $request->only("name","pid","path");

                $id = \DB::table("point_name")->insertGetId($data);
                if($id>0){
                    return redirect("admin/class");
                }else{
                    return back()->with('添加失败');
                }
    }

    //加载修改
    public function edit($id)
    {
        $list = \DB::table("point_name")->where("id",$id)->first(); //获取要编辑的信息
        // dd($list);
        return view("admin.class.edit",["list"=>$list]);
    }

    //执行修改
    public function update($id,Request $request)
    {
            $data = $request->only("name","display");
            $id = \DB::table("point_name")->where("id",$id)->update($data);
            if($id){
                return redirect("admin/class");
            }else{
                return back()->with('添加失败');
            }
    }

    // 删除
    public function del($id)
    {
        $lists = \DB::select("select * from point_name where id=$id");
        // if ($lists[0]->pid != 0 && $lists[0]->path != '0,') {
            $cons = $lists[0]->path.$lists[0]->id.',';
            $list = \DB::select("select id from point_name where path like '$cons%'");
            if (!empty($list)) {
                return back()->with('添加失败,还有子类');
            }
            $list = \DB::select("select s.id from point_name p,spot s where p.id=$id and p.id=s.pid");
            if (!empty($list)) {
                return back()->with('添加失败,还有商品');
            }
            \DB::table("point_name")->where("id",$id)->delete();
            return redirect("admin/class");
        // }
        
    }
}
