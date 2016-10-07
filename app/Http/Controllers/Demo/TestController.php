<?php
	namespace App\Http\Controllers\Demo;

	//第一种使用controller类 方式
	//use App\Http\Controllers\Controller;
	//class TestController extends Controller
	
	use App\Http\Controllers\Controller as cc;

	//第二种使用controller类 方式
	//class TestController extends \App\Http\Controllers\Controller
	class TestController extends cc
	{
		public function index()
		{
			return "我是 demo o.o";
		}
	}