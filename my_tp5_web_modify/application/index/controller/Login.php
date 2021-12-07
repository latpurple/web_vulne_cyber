<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Login extends \think\Controller
{
    public function login()
    {
        if(isset($_POST['login']))
        {
            $user_name=$_POST['uname'];
            $password=$_POST['password'];
            #万能密码
            $sql="select username,password from webuser where username=? and password=?";
            $result=Db::query($sql,[$user_name,$password]);
            if($result&&$user_name=='admin')
            {
                // echo $sql;
                $this->assign('userinfo',$result);
                return $this->fetch('admin@index/index');
                // return redirect('/index.php/admin/index/index');
            }
            #设置了反射型xss
            else
            {
                return $this->error('用户名或密码错误');
            }
        }
        
        //用户或者管理员登录功能
        //验证成功就重定向用户后台或者管理员后台
    }


}