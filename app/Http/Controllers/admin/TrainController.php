<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TrainController extends Controller
{
    //
    // public function index()
    // {
    // 	//$ob = \DB::select("select * from train order by startStation");
    // 	$ob = \DB::table("train")->paginate(10);
    // 	//dd($list);exit();
    // 	//dd($ob);die;
    	
    // 	return view("admin.train.table",['ob'=>$ob]);

    // }

    public function index(Request $request)
    {
    	$db = \DB::table("train");
    	$where = [];
    	//判断并封装搜索条件
    	 $arr = ($request->trainGrade);
    	if($arr==null){

    	}else{
    	 	$db->whereIn("trainGrade",$arr)->get();
           	$where['trainGrade'] = $arr;
    	}
    	
    	if($request->has('startStation')){
    		$startStation = $request->input('startStation');
            $db->where("startStation","like","%{$startStation}%")->get();
            $where['startStation'] = $startStation;
            //dd($where);die;
    	}
    	if($request->has('arriveStation')){
    		$arriveStation = $request->input('arriveStation');
            $db->where("arriveStation","like","%{$arriveStation}%")->get();
            $where['arriveStation'] = $arriveStation;
    	}
    	if($request->has('trainCode')){
    		$trainCode = $request->input('trainCode');
            $db->where("trainCode","like","%{$trainCode}%")->get();
            $where['trainCode'] = $trainCode;
    	}
    	//dd($where);die;
    	// if($request->has('startStation')){
    	// 	$startStation = $val;
    	// 	dd($startStation);
     	//      $db->where("startStation","like","%{$startStation}%");
     	//        $where['startStation'] = $startStation;
     	//        //dd($where);
    	// }
    	// //dd($where);die;
    	// //dd($startStation);
    	// if($request->has('arriveStation')){
    	// 	$arriveStation = $val;
     	//        $db->where("arriveStation","like","%{$arriveStation}%");
     	//        $where['arriveStation'] = $arriveStation;
    	// }
    	// if($request->has('trainCode')){
    	// 	$trainCode = $val;
     	//        $db->where("trainCode","like","%{$trainCode}%");
     	//        $where['trainCode'] = $trainCode;
    	// }

        $ob = $db->paginate(10);
        //dd($where);die;
        return view("admin.train.table",["ob"=>$ob,"where"=>$where]);

    }


/*************火车票信息修改**************/
    public function edit(Request $request)
    {
    	$tid = $request->tid;
    	$ob = \DB::select("select * from train where tid=$tid");
    	//dd($ob);
    	return view("admin.train.edit",["ob"=>$ob]);
    }

    public function doedit(Request $request)
    {
    	$tid = $request->tid;
    	unset($request['_token']);

    	//dd($request);die;
    	$data = $request->only("trainCode","trainGrade","startStation",
    		"arriveStation","startTime","endTime","two_prc","one_prc",
    		"one_seat_cnt","two_seat_cnt","status");
    	
    	$ob = \DB::table('train')
		->where('tid', $tid)
		->update($data);
    	//dd($ob);die;
    	if($ob>0){
    		header("refresh:3;url=train1?tid={$tid}");
			print('修改成功!!!请稍等...<br>三秒后自动跳转~~~');
 
         }else{
         	
            return back()->with("修改失败!");
         }
    }

    //添加车票信息
    public function add()
    {
    	return view('admin/train.add');
    }

    public function doadd(Request $request)
    {
    	//dd($request);
    	unset($request['_token']);
    	$data = $request->only("trainCode","trainGrade","startStation",
    		"arriveStation","startTime","endTime","two_prc","one_prc",
    		"one_seat_cnt","two_seat_cnt","status");
    	$ob = \DB::table('train')->insertGetId($data);
    	if($ob>0){
    		header("refresh:3;url=train");
			print('添加成功!!!请稍等...<br>三秒后自动跳转~~~');
 
         }else{
         	
            return back()->with("添加失败!");
         }
    }

    //删除车票信息
    public function dodel(Request $request)
    {
    	//dd($request);
    	$tid = $request->tid;
    	$ob = \DB::delete("delete from train where tid=$tid");
    	if($ob>0){
    		header("refresh:3;url=train");
			print('删除成功!!!请稍等...<br>三秒后自动跳转~~~');
 
         }else{
         	
            return back()->with('err',"删除失败!");
         }

    }
}
