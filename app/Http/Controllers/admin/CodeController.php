<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    // public function captcha($tmp)
    // {
    //             //生成验证码图片的Builder对象，配置相应属性
    //     $builder = new CaptchaBuilder;
    //     //可以设置图片宽高及字体
    //     $builder->build($width = 100, $height = 40, $font = null);
    //     //获取验证码的内容
    //     $phrase = $builder->getPhrase();
    //     echo $phrase;

    //     //把内容存入session
    //     Session::flash('mycode', $phrase);
    //     //Session()->flash('mycode',$phrase);
    //     //echo "<hr>";
    //     dd(Session::get('mycode'));
    //     //生成图片
    //     header("Cache-Control: no-cache, must-revalidate");
    //     header('Content-Type: image/jpeg');
    //     $builder->output();
    // }
}
