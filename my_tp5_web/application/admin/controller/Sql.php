<?php

namespace app\admin\controller;
use think\models;
use think\Controller;
use think\Db;

// include "public/web.html";

// {include file="index.php" /};
class Sql extends \think\Controller{

    public function index(){
        #正常查询的首页
        if(isset($_GET['num'])&&$_GET['num']==1)
        {
            return view('query');
        }
        #基于布尔的盲注
        else if(isset($_GET['num'])&&$_GET['num']==2)
        {
            return view('boolquery');
        }
        #基于时间的盲注
        else if(isset($_GET['num'])&&$_GET['num']==3)
        {
            return view('timequery');
        }
    }

    public function query()
    {
        // include "web.html";
        // echo "hhhhh";
        if(isset($_POST['id']))
        {
            $id=trim($_POST['id']);

            $sql="select username,password from webuser where id='$id'";
            $result=Db::query($sql);
            // echo "$sql";
            $this->assign('userinfo',$result);
            return $this->fetch('query'); 
        }
        else
        {
            return $this->fetch('query');
            // echo $_POST['id'];
        }        
    }
#基于布尔的盲注
    public function boolquery()
    {
        if(isset($_POST['id'])&&isset($_POST['query']))
        {
            $id=trim($_POST['id']);
            $sql="select username,password from webuser where id='$id'";
            // echo "$sql"."\n";
            // Db::query($sql);
            #语法错误或者id不对都回显一样的页面，对查询只回答yes或no
            try
            {         
                $result=Db::query($sql);
                // dump(gettype($result[0]['username']));
                // echo "tyr";
                if(($result[0]['username'])!=NULL)
                {
                    $tmp='id存在';
                    $this->assign('userinfo',$tmp);
                    return $this->fetch('boolquery');
                }
                else
                {
                    $tmp='id不存在';
                    $this->assign('userinfo',$tmp);
                    return $this->fetch('boolquery');
                }
            }
            catch(\exception $e)
            {
                // return redirect()->restore();
                // echo "boolquery";
                $tmp='id不存在';
                $this->assign('userinfo',$tmp);
                return $this->fetch('boolquery');               
            }
            // finally
            // {
            //     return redirect()->restore();
            // }
        }

    }

    #基于时间的盲注
    public function timequery()
    {
        echo "timequery";
        if(isset($_POST['id'])&&isset($_POST['query']))
        {
            $id=trim($_POST['id']);
            $sql="select username,password from webuser where id='$id'";
            // echo "$sql"."\n";
            // Db::query($sql);
            #正确或者错误都回显一样的
            try
            {         
                $result=Db::query($sql);
                // dump(gettype($result[0]['username']));
                // echo "tyr";
                if(($result[0]['username'])!=NULL)
                {
                    $tmp="不管怎么样，输出是不变的";
                    $this->assign('userinfo',$tmp);
                    return $this->fetch('timequery');
                }
                else
                {
                    $tmp="不管怎么样，输出是不变的";
                    $this->assign('userinfo',$tmp);
                    return $this->fetch('timequery');
                }
            }
            catch(\exception $e)
            {
                // return redirect()->restore();
                // echo "boolquery";
                $tmp="不管怎么样，输出是不变的";
                $this->assign('userinfo',$tmp);
                return $this->fetch('timequery');               
            }
            // finally
            // {
            //     return redirect()->restore();
            // }
        }
    }

}


