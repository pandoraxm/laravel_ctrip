<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

error_reporting(E_ALL&~E_NOTICE);
class ChartController extends CommonController
{
    //浏览信息 
    public function index()
    {
		$db = \DB::select("select carrierCom,count(*) as cc from air group by carrierCom,startCity order by count(*) desc");     
		$list = $db;
		//dd($list);die;
		foreach($list as $values) {
			$arr[] =  $values->carrierCom;
			$brr[] =  $values->cc;
			
		}
		//isset($arr[0])?$arr[0]:'数组未定义';
		//$list = array($arr,$brr);
		
		$list = [$arr,$brr];
		//echo '<pre>';
		//print_r($list);
		//dd($list);die;
		//die;
/*         $list = [
                    ["一月","二月","三月","四月","五月","六月","七月"],
                    [30,45,55,65,70,10,60],
                    [40,65,75,85,90,100,98],
                    [40,65,75,85,90,100,98],
                ]; */
        return view("admin.chart.index",["list"=>$list]);
    }
}
