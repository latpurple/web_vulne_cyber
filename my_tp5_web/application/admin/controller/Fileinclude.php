<?php
namespace app\admin\controller;
use think\models;
use think\Controller;
use think\Db;
class Fileinclude {
    public function index()
    {
        return view();
    }
    public function finclude()
    {
        if(isset($_GET['file']))
        {
            // $file=$_GET['file'];
            // echo 'files';
            // $file='2.php';   
            $file = $_GET['file'];
            dump($file);
            include $file;
            // echo 'end';
        }
    }

}