<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DetailController extends Controller
{
    public function index($id)
    {
        $users = \DB::table("point_name")->where("pid",0)->where("status",1)->get();
        $users_er = \DB::table("point_name")->where("display",1)->where("status",1)->get();

        $row = \DB::select("select * from spot where id=$id");
        $lists = \DB::select("select days,title,eat,trip_title,trip,id from spot_trip where sid=$id and status=1 order by days" );
        $listss = \DB::select("select name siname,img_name,tid from spot_timg where status=1");
        return view("home.detail.detail",["users"=>$users,"users_er"=>$users_er,"row"=>$row,"lists"=>$lists,"listss"=>$listss]);
    }
}
