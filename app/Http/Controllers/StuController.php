<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;


class StuController extends CommonController
{
    //1 添加表单
	public function create()
	{
		return view("admin.stu.add");
	}
    //2 执行添加

    //3 修改表单 

    //4 执行修改 

    //5 执行删除

    //6 执行查询 
	public function show()
	{
		return view("admin.stu.table");
	}

    //7 查询单条数据

	//8 执行上传
    public function doUpload(Request $request)
    {
        
        //判断是否有上传
        if($request->hasFile("upload")){
            //获取上传信息
            $file = $request->file("upload");
			
            //确认上传的文件是否成功
            if($file->isValid()){
                //$picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                //执行移动上传文件
                $filename = time().rand(1000,9999).".".$ext;
                $file->move("./upload/",$filename);
                
       			//ckeditor文本编辑 上传需要返回一个js代码
                $str = "<script type=\"text/javascript\">
                            window.parent.CKEDITOR.tools.callFunction(".$request->input("CKEditorFuncNum").",'".URL("/")."/upload/".$filename."', '上传成功');
                        </script>";
                
                return response($str); //输出
                exit();
            }
        }
    }

}
