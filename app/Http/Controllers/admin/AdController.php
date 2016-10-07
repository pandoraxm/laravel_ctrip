<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdController extends Controller
{	
	//显示广告
    public function index()
    {
    	$res = \DB::table('xcad')->get();
    	return view("admin.ad.index",['res'=>$res]);
    }

    //添加广告

    public function add()
    {
    	return view("admin.ad.add");
    }

    //执行添加

    public function doadd(Request $request)
    {
    	$file = $request->file("file");
    	if (strcmp($request['name'], 'advert') == 0) {
            $ext = $request->file->getClientOriginalExtension(); //获取上传文件名的后缀名
            $filename = time().rand(1000,9999).".".$ext;
            $img = $file->move("./ad",$filename);
            $img_path = "./ad"."/".$filename;
            // dd($img_path);
            $data = ['aname'=>$request->aname, 'image' => $img_path, 'msg'=>$request->msg, 'status'=>$request->status];
            // dd($data);
            $res = \DB::table('xcad')->insert($data);
            return redirect('/admin/ad');
    	}
	}

	//修改状态
	public function edit($id)
    {   
        $res = \DB::table('xcad')->where('id', $id)
                ->select('status')->get();
                // dd($res);
        foreach($res as $val){
            $vv = $val->status;
        }
        // dd($vv);
        if ($vv == 1) {
            $str = 0;
        }elseif($vv == 0) {
            $str = 1;
        }
        $status = \DB::table('xcad')->where('id', $id)
                ->update(array('status'=>$str));
                // dd($status);
        return redirect('admin/ad');
       
    }

    //删除广告
    public function del($id)
    {
    	$res = \DB::table('xcad')->where('id', $id)->delete();
    	if ($res) {
    		 return redirect('admin/ad');
    	} else {
    		return back();
    	}
    }

}