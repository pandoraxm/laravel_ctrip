<?php
//城市级联信息控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    //根据参数upid获取对应的城市类别信息
    public function find($upid=0)
    {
       $list = \DB::table("district")->where("upid",$upid)->get();
       return response()->json($list);
    }
}