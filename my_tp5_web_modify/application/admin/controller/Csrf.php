<?php 
namespace app\admin\controller;
use think\models;
use think\Controller;
use think\Db;
class Csrf extends \think\Controller{

    public function index()
    {
        return view();
    }
    public function changepswd()
    {
        // echo '进入修改密码';
        if(isset($_GET['username'])&&isset($_GET['old_password'])&&isset($_GET['new_password'])&&isset($_GET['confirm_password']))
        {
            $username=trim($_GET['username']);
            $old=trim($_GET['old_password']);
            $new=trim($_GET['new_password']);
            $confirm=trim($_GET['confirm_password']);
            echo "$username"."和"."$old";
            if(strlen($new)<6)
            {
                $succsee_mess='密码长度必须大于6';
                echo "$succsee_mess";
                $this->assign('messinfo',$succsee_mess);
                return $this->fetch('index');              
            }
            $query_sql="select username from webuser where username=? and password=?";
            $res_user=Db::query($query_sql,[$username,$old]);          
            #判断用户存在与否
            if($res_user==NULL)
            {
            $succsee_mess="用户名或者密码错误";
            // echo "$succsee_mess";
            $this->assign('messinfo',$succsee_mess);
            return $this->fetch('index');               
            }
            if($new==$confirm)
            {
                $sql="update webuser set password=?,md5password=md5(?) where username =?";
                $result=Db::execute($sql,[$new,$new,$username]);
                echo "$sql";
                // dump($result);
                // dump($result);
                #---分割线
                if($result)
                {
                    $succsee_mess='更改成功';
                    echo "$succsee_mess";
                    $this->assign('messinfo',$succsee_mess);
                    return $this->fetch('index');
                }
                else
                {
                    $succsee_mess='新密码不能和旧密码相同';
                    echo "$succsee_mess";
                    $this->assign('messinfo',$succsee_mess);
                    return $this->fetch('index');
                }
            }
            else
            {
                $succsee_mess='修改失败,两次输入不一致';
                echo "$succsee_mess";
                $this->assign('messinfo',$succsee_mess);
                return $this->fetch('index'); 
            }
        }
    }
}