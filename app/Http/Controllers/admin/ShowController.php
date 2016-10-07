<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    // 定义查询
    public function index(Request $request)
    {
        $db = \DB::table("spot_choice");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("pic_name","like","%{$name}%");
            $where['name'] = $name;
        }
        if($request->has("class")){
            $class = $request->input("class");
            $db->where("class","=",$class);
            $where['class'] = $class;
        }
        $list = $db->paginate(2);
        // dd($list);
        return view("admin.show.index",["list"=>$list,"where"=>$where]);
    }

    // 添加
    public function create()
    {
        return view("admin.show.add");
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
                $data = $request->only("status","class","name","name_er","title","title_er","title_san","title_si");
                $data['pic_name'] = $filename;
                $id = \DB::table("spot_choice")->insertGetId($data);
                if($id>0){
                    return redirect("admin/show");
                }else{
                    return back()->with('添加失败');
                }
                exit();
            }
        }
        return view("admin.show.add");
    }

    // 状态改变
    public function change($id)
    {
        $sta = \DB::select("select status from spot_choice where id=$id");
        if ($sta[0]->status == 0) {
            $id = \DB::table("spot_choice")->where("id",$id)->update(array('status'=>'1'));
        }else{
            $id = \DB::table("spot_choice")->where("id",$id)->update(array('status'=>'0'));
        }
        // $sta = $sta[0];
        // dd($sta);
        if($id){
            return redirect("admin/show");
        }else{
            return back()->with('修改失败');
        }
    }

    //加载修改表单
    public function edit($id)
    {
        $list = \DB::table("spot_choice")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.show.edit",["list"=>$list]);
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
                $data = $request->only("status","class","name","name_er","title","title_er","title_san","title_si");
                $data['pic_name'] = $filename;
                $id = \DB::table("spot_choice")->where("id",$id)->update($data);
                if($id){
                    return redirect("admin/show");
                }else{
                    return back()->with('添加失败');
                }
            }
        }
        return back()->with('添加失败');
    }

    // 删除
    public function destroy($id)
    {
        \DB::table("spot_choice")->where("id",$id)->delete();
        //return "删除".$id;
        // return $this->index();
        return redirect("admin/show");
    }
}
