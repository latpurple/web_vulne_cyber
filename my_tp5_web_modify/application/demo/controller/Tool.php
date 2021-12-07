<?php
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;

class Tool extends Controller
{
    // //配置并生成验证码
    // public function captcha() {
    //     $config = [
    //         'fontSize' => 18,
    //         // 验证码图片高度
    //         'imageH'   => 38,
    //         // 验证码图片宽度
    //         'imageW'   => 130,
    //         // 验证码位数
    //         'length'   => 4,
    //     ];
    //     $captcha = new Captcha($config);
    //     return $captcha->entry();
    // }
}