<?php
namespace app\index\controller;
use think\Db;
class Regist
{
    public function index()
    {
        // return "regist页面";
        return view('Regist/regist');
    }
    public function regist()
    {
        // return "注册页面显示";
        echo "注册页面显示\n";
        if(isset($_POST['commit']))
        {
            // echo "按钮没问题";
            $user_name=$_POST['user_name'];
            $password=$_POST['password'];
            $md5pswd=md5($password);
            // $sex=$_POST['sex'];
            // $user_age=$_POST['age'];
            $sql="insert into webuser (username,password,md5password) values('$user_name','$password','$md5pswd');";
            echo "sql语句是：".$sql."\t";
            $result=Db::execute($sql);
            $result=true;
            echo "注册成功！！！";
            if($result)
            {
                echo "注册成功！！！";
                return redirect('index/index','',1,'页面正在跳转~~');
            }
        }
    }
}