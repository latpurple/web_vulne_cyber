<?php
namespace app\admin\controller;
use think\models;
use think\Controller;
use think\Db;
class Xss extends \think\Controller{
    public function index()
    {
        #反射型xss
        if(isset($_GET['choice'])&&$_GET['choice']==1)
        {
            // echo "reflect";
            return view('reflect');
        }
        #存储型xss
        else if(isset($_GET['choice'])&&$_GET['choice']==2)
        {
            $sql="select message from leavemessage";
            $result=Db::query($sql);
            // dump($result);
            $this->assign('message_info',$result);
            return $this->fetch('store');
            // return view('store');
        }
    }
    #反射型
    public function reflect()
    {
        if(isset($_POST['username'])&&isset($_POST['user_query']))
        {
            $username = trim($_POST['username']);

            // $username = htmlspecialchars($username);
            $sql="select username from webuser where username='$username'";
            try{
                $result=Db::query($sql);
                // echo $sql;
                // dump($result);
                // echo $result[0]['username'].$username;
                // return $username;
                if($result[0]['username']==$username)
                {
                    $this->assign('username',$username);
                    return $this->fetch('reflect');
                }
                else
                {
                    $username=$username.'不';
                    $this->assign('username',$username);
                    return $this->fetch('reflect');
                }
            }
            catch(\exception $e)
            {
                // return redirect()->restore();
                // echo "boolquery";
                $username=$username.'不';
                $this->assign('username',$username);
                return $this->fetch('reflect');              
            }
        }
    }

    #存储型
    public function store()
    {
        if(isset($_POST['del']))
        {
            $sql="delete from leavemessage";
            Db::execute($sql);
            // echo "删除成功";
            $this->success('删除成功');

        }
        if(isset($_POST['message'])&&isset($_POST['submit'])&&$_POST['message']!=NULL)
        {
            $mess=trim($_POST['message']);
            // $mess=htmlspecialchars($mess);
            $sql="insert into leavemessage (message) value ('$mess')";
            $result=Db::execute($sql);
            // echo "留言成功";
            $this->success('留言成功');
            // dump($result);
        }
        else
        {
            // echo "留言不能为空";
            $this->error('留言不能为空');
        }
    }

}