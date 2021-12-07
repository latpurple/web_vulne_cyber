<?php
namespace app\user\controller;
use think\Controller;
use think\Request;
#include "app/controller/index/login";
class Index extends \think\Controller
{
    public function index()
    {
        #调用index\Login\login方法
        // $user_name=$_POST('uname');
        // $temp=action('Index/login/login',['name'=>$user_name]);
        // $this->assign([
        //     'name' => $user_name
        //     // 'password' => $temp['password']
        // ]);
        return $this->fetch('index');
    }
}
