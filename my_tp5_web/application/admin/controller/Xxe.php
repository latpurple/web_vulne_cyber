<?php 
namespace app\admin\controller;
use think\models;
use think\Controller;
use think\Db;
class Xxe{
    public function index()
    {
        return view();
    }
    public function judge()
    {
        $USERNAME = 'admin'; //账号
        $PASSWORD = 'admin'; //密码
        $result = null;
        libxml_disable_entity_loader(false);
        $xmlfile = file_get_contents('php://input');

        try{
            $dom = new \DOMDocument();
            $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
            $creds = simplexml_import_dom($dom);

            $username = $creds->username;
            $password = $creds->password;

            if($username == $USERNAME && $password == $PASSWORD){
                $result = sprintf("<result><code>%d</code><msg>%s</msg></result>",1,$username);
            }else{
                $result = sprintf("<result><code>%d</code><msg>%s</msg></result>",0,$username);
            }	
        }catch(\Exception $e){
            $result = sprintf("<result><code>%d</code><msg>%s</msg></result>",3,$e->getMessage());
        }

        header('Content-Type: text/html; charset=utf-8');
        echo $result;
    }
}