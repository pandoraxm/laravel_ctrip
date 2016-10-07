<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FlyListController extends Controller
{
        public function index(Request $request)
    {
    	$where = [];

    	if($request->has('startDate1')){
    		$request->startDate = $request->startDate1;
    		$data = $request->only("startDate","backDate","startCity","endCity");
    	}else{
    		$request->backdate = null;
    		$data = $request->only("startDate","backDate","startCity","endCity");
    	}
    	//Session::set("Sess",$data); 

    	$startCity = $data['startCity'];
        
    	$endCity = $data['endCity'];

    	$ob = \DB::select("select * from air where startCity like '%{$startCity}%' and endCity like '%{$endCity}%'");
    	//dd($ob);
    	return view("home.flyList.index",['ob'=>$ob,'startCity'=>$startCity,'endCity'=>$endCity]);
    	

    	
    }

    public function show(Request $request)
    {
        // $where = [];
        // $ob = \DB::table('train');
        // dd($ob);
        // if($request->has('startCity')){

        //     $startCity = $request->input("startCity");
        //     //dd($startCity);
        //     $ob->where("startStation","like","%{$startCity}%");
        //     //dd($ob);
        //     $where['startCity'] = $startCity;

        // }
        // if($request->has('endCity')){
        //     $endCity = $request->input("endCity");
        //     $ob->where('arriveStation', 'like', '%{$endCity}%');
        //     $where['endCity'] = $endCity;
        //     //dd($where);
        // }
        // $ob = $ob->paginate(5);
        // dd($ob);
        // return view("home.trainList.index",['ob'=>$ob,'where'=>$where]);
    	if($request->has('backDate')==false){
    		$data = $request->only("startDate","startCity","endCity");
    		$startCity = $data['startCity'];
            $where['startCity'] = $startCity;
    		$endCity = $data['endCity'];
            $where['endCity'] = $endCity;
    		//$ob = \DB::table('train')->where('startStation', 'like', '%{$startCity}%')->get();
    		$ob = \DB::table("air")-> where("startCity","like","%{$startCity}%")
            ->where("endCity","like","%{$endCity}%")->paginate(5);
            //dd($where);
           //dd($ob); 
    		return view("home.flyList.index",['ob'=>$ob,'where'=>$where,'startCity'=>$startCity,'endCity'=>$endCity]);
    		
    	}else{
    		return "有返回日期哦";
    	}
    	
    }
}
