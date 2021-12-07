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
        if(isset($_GET['new_name'])&&isset($_GET['confirm_name']))
        {
            $old=trim($_GET['new_name']);
            $confirm=trim($_GET['confirm_name']);
            // echo "$old"."和"."$confirm";
            if(strlen($old)<6)
            {
                $succsee_mess='密码长度必须大于6';
                echo "$succsee_mess";
                $this->assign('messinfo',$succsee_mess);
                return $this->fetch('index');              
            }
            if($old==$confirm)
            {
                $sql="update webuser set password='$old',md5password=md5('$old') where username ='admin'";
                // $result=$db->execute($sql);
                $result=Db::execute($sql);
                // dump($result);
                dump($result);
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