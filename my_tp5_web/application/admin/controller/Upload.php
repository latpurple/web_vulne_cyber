<?php
namespace app\admin\controller;
use think\models;
use think\Controller;
use think\Db;
class Upload extends \think\Controller{
    public function index()
    {
        return view();
    }
    public function uploadfile()
    {
        $file=request()->file('filename');
        // $info=$file->move('/index.php/public/uploads');
        // echo "fileupload";
        // dump($file);
        $info = $file->move('uploads/','');

        if($info)
        {
            $path=$info->getSaveName();
            echo "文件上传成功！\n，路径是：/uploads/".$path;
            // echo $info->getExtension(); 

            // echo $info->getSaveName();
            // echo $info->getFilename(); 
        }
        else
        {
            echo $file->getError();
        }
    }
}