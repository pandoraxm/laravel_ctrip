<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends CommonController
{
    //
    public function index()
    {
    	return view("admin.index.index");
    }
}
