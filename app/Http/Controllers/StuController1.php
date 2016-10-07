<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StuController extends Controller
{
    //1 查看
    public function index()
    {
        // return "1 我是查看";
        $list = \DB::table("stu")->get();
        //dd($list);
        return view("stu.index",["list"=>$list]);

        // $smarty->assign("list",$list);
        // $smarty->display("stu/index.html");

    }

    //查看学生信息搜索分页
    public function index2(Request $request )
    {
       // echo "我是index2";
       // echo $request->input('name');
       //  $list = \DB::table("stu")->where("sex","=","m")->paginate(10);
        $db = \DB::table("stu");
        //判断并封装搜索条件
        $where = [];
        if($request->has("name")){
            $name = $request->input("name");
            $db->where("name","like","%{$name}%");
            $where['name'] = $name;
        }
        if($request->has("sex")){
            $sex = $request->input("sex");
            $db->where("sex","=",$sex);
            $where['sex'] = $sex;
        }

        $list = $db->paginate(10);
        return view("stu.index2",["list"=>$list,"where"=>$where]);

    }
    

    //2 单条查看
    public function show($uid)
    {
        return "2 查看的单条数据为".$uid;
    }

    //3 添加表单
    public function create()
    {
        // return "3 我是添加表单";
        return view("stu.add");

    }

    //4 执行添加
    public function store(Request $request)
    {
        //1 获得数据
        // return "4 我是执行添加";
        // $info = $request->input('name');
        // $info = $request->all();
        // unset($info['_token']);
        
        //表单验证
        $this->validate($request, [
            'name' => 'required|max:5',
            'age' => 'required|numeric|max:100|min:10',
        ]);

        $data = $request->only("name","age","sex","classid");

        //2 添加到数据库
        $id = \DB::table("stu")->insertGetId($data); 
        if($id>0){
            return "添加成功";
        }else{
            return "添加失败";
        }
    }

    //5 修改表单
    public function edit($uid)
    {
        // return "5 我是修改表单".$id;
        //1 数据库查询 
        $stu = \DB::table("stu")->where("uid",$uid)->first();
        // dd($stu);
        //2 输出到模板
        return view("stu.edit",["vo"=>$stu]);


    }

    //6 执行修改
    public function update($uid,Request $request)
    {
        // return "6 我是执行修改".$uid;
        //1 获得表单提交的数据 
        $data = $request->only("name","age","sex","classid");

        //2 执行修改
        $info = \DB::table("stu")->where("uid",$uid)->update($data);

        if($info>0){
            return "修改成功";
        }else{
            return "修改失败";
        }


    }

    //7 销毁
    public function destroy($uid)
    {
        // return "7 我是执行删除".$uid;
        //执行删除
        $info = \DB::table("stu")->where("uid",$uid)->delete();

        //页面跳转 
        return $this->index();


    }

    //8 文件上传
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
