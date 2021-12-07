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
        $f1="f1.php";
        $f2="f2.php";
        $f3="f3.php";
        if(isset($_GET['file'])&&($_GET['file']==$f1||$_GET['file']==$f2||$_GET['file']==$f3))
        {
            $file = $_GET['file'];
            dump($file);
            include $file;
        }
        else
        {
            return view('fileinclude/index');
        }
    }

}