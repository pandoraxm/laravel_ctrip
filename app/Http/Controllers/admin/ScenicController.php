<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScenicController extends Controller
{
    // 定义查询
    public function index(Request $request)
    {
        $sql = \DB::select("select id,name,path,concat(path,id,',') bpath from point_name order by bpath");
        foreach ($sql as $k=>$val) {
            $val->dd = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',substr_count($val->path,',')).'|--'.$val->name;
        }
        $db = \DB::table("spot");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where['name'] = $name;
        }
        if($request->has("pid")){
            $pid = $request->input("pid");
            $row = \DB::select("select concat(path,id,',') bpath from point_name where id=$pid");

            foreach ($row as $key => $v) {
                $bpath = ($v->bpath);
            };
            $aa = \DB::select("select id from point_name where path like '$bpath%'");
            $x = array($pid);
            foreach($aa as $k => $l) {
                $x[]=$l->id;
            };
                // dd($x);
            $db->wherein("pid",$x);

            $where['pid'] = $pid;
        }
        $list = $db->paginate(3);
        // dd($list);
        return view("admin.scenic.index",["list"=>$list,"where"=>$where,"sql"=>$sql]);
    }


    // 添加
    public function create()
    {
        $sql = \DB::select("select id,name,path,concat(path,id,',') bpath from point_name order by bpath");
        foreach ($sql as $k=>$val) {
            $val->dd = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',substr_count($val->path,',')).'|--'.$val->name;
        }
        // dd($d);
        return view("admin.scenic.add",["sql"=>$sql]);
    }

    // 执行添加
    public function store(Request $request)
    {

        if($request->hasFile("file")){
            $data = $request->all();
            $file = $request->file("file");
            if($file->isValid()){
                // dd($file);
                $ext = $request->file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./picture",$filename);
                $data = $request->only("status","pirce","name","days_num","scontent","date","pid");
                $lis = \DB::select("select name from point_name where id=$request->pid");
                $data['path_name'] = $lis[0]->name;
                $data['img_name'] = $filename;
                $id = \DB::table("spot")->insertGetId($data);
                if($id>0){
                    return redirect("admin/scenic");
                }else{
                    return back()->with('添加失败');
                }
                exit();
            }
        }
        return view("admin.scenic.add");
    }

    //加载修改表单
    public function editx($id)
    {
        $sql = \DB::select("select id,name,path,concat(path,id,',') bpath from point_name order by bpath");
        foreach ($sql as $k=>$val) {
            $val->dd = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',substr_count($val->path,',')).'|--'.$val->name;
        }
        $list = \DB::table("spot")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.scenic.editx",["list"=>$list,"sql"=>$sql]);
    }
    //加载修改表单
    public function editt($id)
    {
        $list = \DB::table("spot")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.scenic.editt",["list"=>$list]);
    }

    //执行修改
    public function update($id,Request $request)
    {
        if($request->hasFile("file")){
            $data = $request->all();
            $file = $request->file("file");
            if($file->isValid()){
                // dd($file);
                $ext = $request->file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./picture",$filename);
                $data = $request->only("img_name");
                $data['img_name'] = $filename;
                // dd($data);
                // dd($data);
                $id = \DB::table("spot")->where("id",$id)->update($data);
                if($id){
                    return redirect("admin/scenic");
                }else{
                    return back()->with('添加失败');
                }
            }
        }else{
            $data = $request->only("status","pirce","name","days_num","scontent","date","pid");
            $lis = \DB::select("select name from point_name where id=$request->pid");
            $data['path_name'] = $lis[0]->name;
            $id = \DB::table("spot")->where("id",$id)->update($data);
            if($id){
                return redirect("admin/scenic");
            }else{
                return back()->with('添加失败');
            }
        }
    }

    // 状态改变
    public function change($id)
    {
        $sta = \DB::select("select status from spot where id=$id");
        if ($sta[0]->status == 0) {
            $id = \DB::table("spot")->where("id",$id)->update(array('status'=>'1'));
        }else{
            $id = \DB::table("spot")->where("id",$id)->update(array('status'=>'0'));
        }
        // $sta = $sta[0];
        // dd($sta);
        if($id){
            return redirect("admin/scenic");
        }else{
            return back()->with('修改失败');
        }
    }

    // 删除
    public function del($id)
    {
        // dd($id);
        $ad = \DB::select("select id from spot_trip where sid=$id");
        if (!empty($ad)) {
            $sid=$ad['0']->id;
            \DB::table("spot_timg")->where("tid",$sid)->delete();
        }

        \DB::table("spot")->where("id",$id)->delete();
        \DB::table("spot_trip")->where("sid",$id)->delete();
        return redirect("admin/scenic");
    }
}
