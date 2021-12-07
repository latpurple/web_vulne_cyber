<?php
namespace app\demo\controller;
// use think\Model;
use think\Db;
// Db::query($sql);
// Db::execute($sql);
class Login
{
    public function login()
    {
        // return view();
        // $model = new Model();#这里有问题，无法实例化对象
        echo "login方法";
        // $sql = "select * from users";
        // // $result = mysqli_query($sql);
        // $result = Db::query($sql);
        // dump($result);
        // if(isset($_POST['password']))
        // {
        //     echo 'uname....';
        // }
        // else
        // {
        //     echo "method post maybe wrong!!!";
        // }
        //分割线
            // $uname = $_POST['uname'];
            // $pwd = $_POST['password'];
            // // $result = Db::table('users')->where([['username','=',$uname],['password','=',$pwd]])->find();
            // dump($result);
        // 分割线----
        $uname = $_POST['uname'];
        $pwd = $_POST['password'];
        // echo $uname.$pwd;
        $sql = "select * from users where user_id='$uname' and password='$pwd'";
        $result = Db::query($sql);
        dump($result);
    }
    public function upload()
    {
        return "upload";

    }
}