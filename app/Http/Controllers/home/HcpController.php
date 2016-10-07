<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HcpController extends Controller
{
    //
    public function index()
    {
    	return view("home.hcp.index");
    }
}
