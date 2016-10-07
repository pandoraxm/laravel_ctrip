<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DemoController extends Controller
{
    public function index(){
    	return "我是Demo";
    }
}
