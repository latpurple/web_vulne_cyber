<?php
namespace app\demo\controller;

class Upload
{
    public function index()
    {
        // if(isset($_POST['']));

        return view('upload/upload');
    }
    //不做前端校验，仅作后端修改
    public function upload()
    {
        $file = request()->file('img');
        $info = $file->move('uploads/');
        if($info)
        {
            echo $info->getSaveName();
        }
        else
        {
            echo $file->geterror();
        }
    }
}
