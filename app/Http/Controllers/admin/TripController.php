<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function index($id)
    {
        // dd($id);
        $list = \DB::select("select id,days,title,eat,trip,t.trip_title,t.status tstatus
            from spot_trip t
            where sid=$id
            ");
        $lists = \DB::table("spot_timg")->where("status",1)->get();
        return view("admin.scenic.trip",["list"=>$list,"lists"=>$lists,"id"=>$id]);
    }

    // 添加
    public function trip_create($id)
    {
        return view("admin.scenic.trip_add",["id"=>$id]);
    }

    // 执行添加
    public function trip_add(Request $request)
    {
        $data = $request->only("sid","days","title","eat","status","trip_title","trip");
        $sid = $data['sid'];
        // dd($sid);
        $id = \DB::table("spot_trip")->insertGetId($data);
        if($id>0){
            return redirect("admin/scenic/trip/$sid");
        }else{
            return back()->with('添加失败');
        }
    }

    //加载修改表单
    public function trip_edit($id)
    {
        $list = \DB::table("spot_trip")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.scenic.trip_edit",["list"=>$list]);
    }

    //执行修改
    public function trip_update($id,Request $request)
    {
        $data = $request->all();
        $sid = $data['sid'];
        // dd($sid);
        $data = $request->only("days","title","eat","status","trip_title","trip");
        // dd($data);
        $id = \DB::table("spot_trip")->where("id",$id)->update($data);
        if($id){
            return redirect("admin/scenic/trip/$sid");
        }else{
            return back()->with('添加失败');
        }
    }

    // 状态改变
    public function trip_change($id)
    {
        $sta = \DB::select("select status,sid from spot_trip where id=$id");
        if ($sta[0]->status == 0) {
            $id = \DB::table("spot_trip")->where("id",$id)->update(array('status'=>'1'));
        }else{
            $id = \DB::table("spot_trip")->where("id",$id)->update(array('status'=>'0'));
        }
        $sid = $sta['0']->sid;
        // dd($sid);
        if($id){
            return redirect("admin/scenic/trip/$sid");
        }else{
            return back()->with('修改失败');
        }
    }

    // 删除
    public function trip_del($id)
    {

        $sta = \DB::select("select sid,id from spot_trip where id=$id");
        $sid=$sta['0']->sid;
        $tid=$sta['0']->id;
        \DB::table("spot_timg")->where("tid",$tid)->delete();
        \DB::table("spot_trip")->where("id",$id)->delete();
        return redirect("admin/scenic/trip/$sid");
    }

    // 以下是图片
    public function trip_img($id)
    {
        $list = \DB::table("spot_timg")->where("tid",$id)->get();
        // dd($list);


        $li = \DB::select("select sid from spot_trip where id=$id");
        $sid = $li['0']->sid;

        return view("admin.scenic.trip_img",["list"=>$list,"id"=>$id,"sid"=>$sid]);

    }

    // 添加
    public function img_create($id)
    {
        return view("admin.scenic.img_add",["id"=>$id]);
    }

    // 执行添加
    public function img_add(Request $request)
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
                $data = $request->only("tid","img_name");
                $data['name'] = $filename;
                $tid = $data['tid'];
                // dd($tid);
                $id = \DB::table("spot_timg")->insertGetId($data);
                if($id>0){
                    return redirect("admin/scenic/trip_img/$tid");
                }else{
                    return back()->with('添加失败');
                }
                exit();
            }
        }
        return view("admin.scenic.img_add");
    }

    // 状态改变
    public function img_change($id)
    {
        $sta = \DB::select("select status from spot_timg where id=$id");
        if ($sta[0]->status == 0) {
            $id = \DB::table("spot_timg")->where("id",$id)->update(array('status'=>'1'));
        }else{
            $id = \DB::table("spot_timg")->where("id",$id)->update(array('status'=>'0'));
        }
        // $sta = $sta[0];
        // dd($sta);
        if($id){
            return back()->with('修改成功');
        }else{
            return back()->with('修改失败');
        }
    }

    //加载修改表单
    public function img_edit($id)
    {
        $list = \DB::table("spot_timg")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.scenic.img_edit",["list"=>$list]);
    }

    //执行修改
    public function img_update($id,Request $request)
    {
        if($request->hasFile("file")){
            $data = $request->all();
            $file = $request->file("file");
            if($file->isValid()){
                // dd($file);
                $ext = $request->file->getClientOriginalExtension(); //获取上传文件名的后缀名
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./picture",$filename);
                $data = $request->all();
                $ss = \DB::select("select tid from spot_timg where id=$id");
                $sid = $ss['0']->tid;
                $data = $request->only("img_name");
                $data['name'] = $filename;
                // dd($data);
                $id = \DB::table("spot_timg")->where("id",$id)->update($data);
                if($id){
                    return redirect("admin/scenic/trip_img/$sid");
                }else{
                    return back()->with('添加失败');
                }
            }
        }
        return back()->with('添加失败');
    }

    // 删除
    public function img_del($id)
    {
        // dd($id);
        \DB::table("spot_timg")->where("id",$id)->delete();
        return back()->with('添加失败');
    }

}
