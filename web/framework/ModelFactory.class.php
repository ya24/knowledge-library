<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/7/30
 * Time: 20:23
 * 模型工厂类，生产单例模型类，根据传入的模型名，生产模型类
 */
class  ModelFactory{

    static $all_model = array();

    static function M($model_name){
        //如果模型类不存在，或不是其实例
        if(!isset(ModelFactory::$all_model[$model_name]) || !(ModelFactory::$all_model[$model_name] instanceof $model_name)){
            ModelFactory::$all_model[$model_name] = new $model_name();
        }
        return ModelFactory::$all_model[$model_name];
    }

}