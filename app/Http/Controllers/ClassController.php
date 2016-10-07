<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClassController extends Controller
{

    public function skip($id)
    {
        $row = \DB::select("select concat(path,id,',') bpath from point_name where id=$id");
        foreach ($row as $key => $v) {
            $bpath = ($v->bpath);
        };
        $x=array();
        $xx = array();
        $x = \DB::select("select id from point_name where path like '$bpath%'");
        foreach ($x as $x => $y) {
            $xx[] = $y->id;
        }
        // dd($xx);
        // $spot = \DB::select("select * from spot where pid in(select id from point_name where path like '$bpath%') and status=1");
        $db = \DB::table("spot")->whereIn("pid",$xx)->where("status",1);
        $spot = $db->paginate(3);
        $where=[];
        $users = \DB::table("point_name")->where("pid",0)->where("status",1)->get();
        $users_er = \DB::table("point_name")->where("display",1)->where("status",1)->get();
        return view("home.class.class",["users"=>$users,"users_er"=>$users_er,"spot"=>$spot,"where"=>$where]);
    }
}
