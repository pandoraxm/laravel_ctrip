<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LbtController extends Controller
{
    // 查看
    public function index(Request $request)
    {
        $db = \DB::table("image");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("pname","like","%{$name}%");
            $where['name'] = $name;
        // dd($where);
        }
        $ilist = $db->paginate(5); //获取所有图片信息
        // dd($ilist);
        return view("admin.lbt.pic",["ilist"=>$ilist,"where"=>$where]);
    }

    // 执行删除
    public function destroy($id)
    {
        \DB::table("image")->where("id",$id)->delete();
        //return "删除".$id;
        // return $this->index();
        return redirect("admin/lbt");
    }

    //添加表单
    public function create()
    {
        return view("admin.lbt.adlbt");
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
                $data = $request->only("status");
                $data['pname'] = $filename;
                $id = \DB::table("image")->insertGetId($data);
                if($id>0){

                    return redirect("admin/lbt");
                }else{
                    return back()->with('添加失败');
                }
            }
        }
        return back()->with('添加失败');
    }

    public function ed($id)
    {
        // $sta = \DB::table("image")->where("id",$id);
        $sta = \DB::select("select status from image where id=$id");
        if ($sta[0]->status == 0) {
            $id = \DB::table("image")->where("id",$id)->update(array('status'=>'1'));
        }else{
            $id = \DB::table("image")->where("id",$id)->update(array('status'=>'0'));
        }
        // $sta = $sta[0];
        // dd($sta);
        if($id){
            return redirect("admin/lbt");
        }else{
            return back()->with('修改失败');
        }
    }

    //加载修改表单
    public function edit($id)
    {
        $ima = \DB::table("image")->where("id",$id)->first(); //获取要编辑的图片信息
        return view("admin.lbt.lbtbj",["ima"=>$ima]);
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
                $data = $request->only("status");
                $data['pname'] = $filename;
                $id = \DB::table("image")->where("id",$id)->update($data);
                if($id){
                    return redirect("admin/lbt");
                }else{
                    return back()->with('添加失败');
                }
            }
        }
        return view("admin.lbt.lbtbj");
    }
}
