<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/7/30
 * Time: 19:55
 * 模型层基类，用于数据库的打开
 */
class BaseModel{

    protected  $pdo = null;

    function  __construct(){
        $dsn = "mysql:host=localhost; port = 3306; dbname=knowledge_library";
        $opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8");
        $this->pdo = new PDO($dsn, "root", "123", $opt);
        //$this->pdo->exec("set names utf8");
        //$this->pdo = new PDO($dsn, "root", "123");
    }
}


