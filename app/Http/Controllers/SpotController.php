<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SpotController extends Controller
{
    //查数据
    public function show()
    {
        $list = \DB::table("spot_choice")->where("status",1)->get();
        $list_lbt = \DB::table("image")->where("status",1)->get();

        $users = \DB::table("point_name")->where("pid",0)->where("status",1)->get();
        $users_er = \DB::table("point_name")->where("display",1)->where("status",1)->get();

        return view("home.wel",["list_lbt"=>$list_lbt,"list"=>$list,"users"=>$users,"users_er"=>$users_er]);
    }
}
