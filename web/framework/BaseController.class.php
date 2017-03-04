<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/7/30
 * Time: 20:19
 * 控制层基类，控制编码
 */
class BaseController{
    function __construct(){
        header("content-type:text/html;charset=utf-8");
    }

}