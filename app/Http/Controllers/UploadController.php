<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Org\Image;

use App\Http\Requests;

class UploadController extends Controller
{
    //
    public function index()
    {
    	//echo "表单";
    	return view("upload.index");
    }

    public function upload(Request $request)
    {
    	//echo "<pre>";
    	//var_dump($request->file('mypic'));
    	 $file = $request->file('mypic');
    	// echo $file->getClientOriginalName()."<br/>";
    	// echo $file->getClientMimeType()."<br/>";
    	// echo $file->getClientSize()."<br/>";
     	// echo $file->getError()."<br/>";
    	// echo $file->isValid()."<br/>";
     	// echo $file->getClientOriginalExtension()."<br/>";
    
    	//实现移动
    	//$filename = $file->getClientOriginalName();
    	//$file->move('./uploads/',$filename);

    	//实现文件上传 并且随机文件名
    	//判断是否有上传
    		 if($request->hasFile('mypic')){
    		 	//获取上传信息
    		 	$file = $request->file("mypic");
    		 	//确定上传的文件是否成功
    		 	if($file->isValid()){
    		 		$picname = $file->getClientOriginalName();//获取上传原文件名
    		 		$ext = $file->getClientOriginalExtension();//获取上传文件的后缀名
    		 		//执行移动上传文件
    		 		$filename = time().rand(1000,9999).".".$ext;
    		 		$file->move("./uploads/",$filename);
    		 	}
    		}

    	//执行缩放
        $img = new Image();
        $img->open("./uploads/".$filename)->thumb(100,100)->save("./uploads/s_".$filename);
    }
}
