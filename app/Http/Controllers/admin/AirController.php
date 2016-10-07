<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AirController extends Controller
{
    public function index(Request $request)
    {
    	$where = [];
    	$db = \DB::table("air");
   	
    	if($request->has('flightCode')){
    		$flightCode = $request->input('flightCode');
            $db->where("flightCode","like","%{$flightCode}%")->get();
            $where['flightCode'] = $flightCode;
            //dd($where);die;
    	}
    	if($request->has('startCity')){
    		$startCity = $request->input('startCity');
            $db->where("startCity","like","%{$startCity}%")->get();
            $where['startCity'] = $startCity;
    	}
    	if($request->has('endCity')){
    		$endCity = $request->input('endCity');
            $db->where("endCity","like","%{$endCity}%")->get();
            $where['endCity'] = $endCity;
    	}

    	
    	$ob = $db->paginate(10);
    	return view("admin.air.table",["ob"=>$ob,"where"=>$where]);
    }


    public function edit(Request $request)
    {
    	$aid = $request->aid;
    	$ob = \DB::select("select * from air where aid=$aid");
    	//dd($ob);
    	return view("admin.air.edit",["ob"=>$ob]);
    }

     public function doedit(Request $request)
    {
    	$aid = $request->aid;
    	unset($request['_token']);
    	//dd($request);die;
    	$data = $request->only("flightCode","carrierCom","planeType",
    		"departureTime","arrivalTime","departureAirport","arrivalAirport",
    		"planeMemo","correctness","status");
    	
    	$ob = \DB::table('air')
		->where('aid', $aid)
		->update($data);
    	//dd($ob);die;
    	if($ob>0){
    		header("refresh:3;url=air?aid={$aid}");
			print('修改成功!!!请稍等...<br>三秒后自动跳转~~~');
 
         }else{
            return back()->with("修改失败!");
         }
    }

    public function add()
    {
    	//return "this";
    	return view('admin.air.add');
    }

    public function doadd(Request $request)
    {
    	
    	$departureAirport = $request->departureAirport;
    	$arrivalAirport = $request->arrivalAirport;
    	$str1 = substr($departureAirport,'0','6');
    	$str2 = substr($arrivalAirport,'0','6');
    	$arrivalAirport = $request->arrivalAirport;
    	//$startCity = \DB::select("select city from city_airport where airport like '%$str1%'");
    	//$endCity = \DB::select("select city from city_airport where airport like '%$str2%'");    	
    	unset($request['_token']);
    	$data = $request->only("flightCode","carrierCom","planeType",
    		"departureTime","arrivalTime","departureAirport","arrivalAirport",
    		"planeMemo","correctness","status","startCity","endCity");

    	//dd($data);
    	$ob = \DB::table('air')->insert($data);
    	if($ob>0){
    		header("refresh:3;url=air");
			print('添加成功!!!请稍等...<br>三秒后自动跳转~~~');
 
         }else{
            return back()->with("修改失败!");
         }

    }

    public function dodel(Request $request)
    {
    	$aid = $request->aid;
    	$ob = \DB::delete("delete from air where aid=$aid");
    	if($ob>0){
    		header("refresh:3;url=air");
			print('删除成功!!!请稍等...<br>三秒后自动跳转~~~');
 
         }else{
         	
            return back()->with("删除失败!");
         }

    }

}
