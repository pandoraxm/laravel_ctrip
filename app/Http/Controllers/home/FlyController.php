<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FlyController extends Controller
{
    public function index()
    {
    	//$db =\DB::select("select * from users limit status,1, [1,10]");
    	//DB::select('select age,count(*) from users group by age')
    	//$ob1 = \DB::select("select * from air where status=1 group  by endCity");
    	//$ob2 = \DB::select("select * from air where status=1 group endCity by aid limit 4,7");
    	//$ob3 = \DB::select("select * from air where status=1 group endCity by aid limit 8,11");
    	//dd($ob1);
    	$ob1 = \DB::select("select * from air where endCity='上海' and status=1 limit 0,3");
    	$ob2 = \DB::select("select * from air where endCity='北京' and status=1 limit 0,3");
    	$ob3 = \DB::select("select * from air where  endCity='成都' and status=1 limit 0,3");
    	return view("home.fly.index",['ob1'=>$ob1,'ob2'=>$ob2,'ob3'=>$ob3]);
    }
}
