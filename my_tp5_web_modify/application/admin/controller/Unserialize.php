<?php
namespace app\admin\controller;
use think\models;
use think\Controller;
use think\Db;
class Unserialize{
    public function index()
    {
        return view();
    }
    public function judge()
    {
        echo "文件名称是".$_GET['filename']."\n";

        if(isset($_GET["filename"]))
        {
            try{
                // echo "unserialize";
                // $a = new A();
                // dump(serialize($a));
                // $s='O:22:"app\admin\controller\A":2:{s:4:"file";s:26:"file:///c:/windows/win.ini";}';
                $s=trim($_GET['filename']);
               
                $result=@unserialize($s);
                // dump($result);
                if($result==false)
                {
                    
                    echo @highlight_file("Unserialize.php");
                }

                // dump(unserialize($_GET["filename"]));
                // dump($_GET["filename"]);
            }
            catch(\Exception $e){
                echo "wuxiao";
                // $file="Unserialize.php";
                // $s=serialize(new A($file));
                // unserialize($s);
            }
        }
        // $file ='f1.php';
        // $a = new A($file);
        // dump($a);
        // echo serialize($a);
        // $s='O:22:"app\admin\controller\A":2:{s:4:"file";s:26:"file:///c:/windows/win.ini";}';
        // dump(unserialize($s));
        else
        {
            return view('unserialize/index');
        }
    }
}

class A {
	// var $target;
    public $file = "Unserialize.php";
	function __construct($file) {
		// $this->target = new B;
		// echo "B";
        #反序列化时，跟__construct关系不大
        // echo "序列化了一个对象";
        $this->file=$file;
        // echo $file;
	}
    #----分割线----
    #修复方法是提高php版本
    function __wakeup() {
        if ($this->file!="Unserialize.php")
        {
            echo "wakeup方法被执行！！！！！";
            echo "__wakeup()魔术方法绕过已经在php7.3版本中修复\n";
            $this->file="Unserialize.php";
            // echo @highlight_file($this->file);
        }
        // @eval($file);
    }
	function __destruct() {
		// $this->target->action();
		// echo "hhh";
        echo "执行了销毁函数";
        #借助hightlight_file()函数读取文件
        echo @highlight_file($this->file,true);
	}
}

// class B {
// 	function action() {
// 		echo "action B";
// 	}

// }

// class C {
// 	var $test;
// 	function action() {
// 		echo "action A";
// 		eval($this->test);
// 	}
// }
// $a = new A;
// $s1 = serialize($a);
// $s1 = base64_encode($s1);
// $s2 = unserialize(base64_decode($_GET['test']));
// ----
// $s2 = unserialize($_GET['test']);
//-----
// echo "$s1\n";
//----- 
// var_dump($s2);
//-----
// echo "get" . $_GET['test'];
// echo "函数外面";