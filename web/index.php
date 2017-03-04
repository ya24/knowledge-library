<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/7/30
 * Time: 19:46
 * 程序入口
 */
// 基础常量的设置
define("DS", DIRECTORY_SEPARATOR);  // 目录分隔符
define("ROOT", __DIR__ . DS);   //项目根目录
define("FRAMEWORK", ROOT. "framework" .DS);//框架类所在路径
define("MODEL_PATH", ROOT . "models" .DS);// 模型类所在路径
define("CONTROLLER_PATH", ROOT . "controllers" .DS);// 控制器所在路径
define("VIEW_PATH", ROOT . "views" .DS);// 视图所在路径
define("VIEW_C_PATH", ROOT . "views_c" .DS);// 视图所在路径
define("SMARTY_PATH",ROOT . "smarty" . DS);


// 导入所需类——自动加载
/*
function __autoload($class){
    $base_class = array('BaseController','BaseModel','ModelFactory');
    if( in_array( $class, $base_class) ){
        require_once FRAMEWORK . $class . '.class.php';	//加载基础模型类
    }
    else if( substr($class, -5) == "Model"){//所需要的类的名字最后5个字符是"Model”时
        require_once  MODEL_PATH  .  $class  . ".class.php";
    }
    else if( substr($class, -10) == "Controller"){//所需要的类的名字最后10个字符是"Controller”时
        require_once  CONTROLLER_PATH  .  $class  . ".class.php";
    }
    else{
        //require_once  SMARTY_PATH . $class .".class.php";// . $class . ".class.php"; //导入smarty模板
         require_once  SMARTY_PATH ."Smarty.class.php";
    }

}
*/

// 导入所需类
require_once FRAMEWORK . "BaseController.class.php";
require_once FRAMEWORK . "BaseModel.class.php";
require_once FRAMEWORK . "ModelFactory.class.php";

require_once MODEL_PATH . "ArticleModel.class.php";
require_once MODEL_PATH . "CategoryModel.class.php";
require_once MODEL_PATH . "CollectModel.class.php";

require_once CONTROLLER_PATH . "HomePageController.class.php";
require_once CONTROLLER_PATH . "SearchController.class.php";
require_once CONTROLLER_PATH . "CollectController.class.php";

require_once  SMARTY_PATH . "Smarty.class.php";


// 请求控制器
$c = !empty($_GET['c']) ? $_GET['c'] : "HomePage";  // 获取客户需要请求的控制器是哪个
$ctrl_name = $c . "Controller"; // 构建控制器名称
$controller = new $ctrl_name();

// 请求控制器的方法
$a = !empty($_GET['a']) ? $_GET['a'] : "home";
$action = $a . "Action";
$controller->$action();

