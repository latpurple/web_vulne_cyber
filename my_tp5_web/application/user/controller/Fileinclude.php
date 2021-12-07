<?php
namespace app\user\controller;
use think\Controller;
use think\Request;
#文件包含
class Fileinclude{
    public function check($page){

        // return "files";
        if(isset($page))
        {
            
            include "$page";
            return "files";
        }

    }

}

?>