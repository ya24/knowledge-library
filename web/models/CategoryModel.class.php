<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/7/30
 * Time: 21:47
 * 分类模块的模型类
 */

class CategoryModel extends BaseModel{

    //搜分类——按名称（使用模糊查询，查询的结果有很多，所以返回的是数组）
    function queryCategoryByCategoryName($categoryName){
        // 1.sql模板
        $sql = "select * from sys_category where category_name like  ?";
        // 2.预编译sql
        $stmt = $this->pdo -> prepare($sql);
        // 3.给占位符赋值
        $stmt->bindValue(1,"%" . $categoryName . "%");
        // 4.执行sql语句
        $stmt->execute();

        // 5.处理结果集
        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }

        return $arr;
    }


    // 搜系统分类——按用户收藏
    function querySysCategoryByUser($sys_user_id){
        $arr = array();
        // 1.第一个sql模板的准备，查用户收藏的系统分类
        $sql = "SELECT sc.sys_category_id, category_name FROM sys_category sc,user_and_category uac 
                    WHERE sc.sys_category_id=uac.sys_category_id AND uac.sys_user_id = ?";
        // 2、预编译
        $stmt = $this->pdo->prepare($sql);
        // 3.給占位符赋值
        $stmt->bindValue(1,$sys_user_id);
        // 4.执行
        $stmt->execute();
        // 5.处理结果集
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }

        return $arr;
    }

    //搜用户自定义分类——按用户收藏
    function queryUserCategoryByUser($sys_user_id){
        $arr = array();
        $sql = "SELECT uc.user_category_id, category_name FROM user_category uc,user_and_category uac WHERE uc.user_category_id=uac.user_category_id AND uac.sys_user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> bindValue(1,$sys_user_id);
        $stmt->execute();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }
        return $arr;
    }



    //搜分类——按用户
   /* function queryCategoryByUser($sys_user_id){
        //用户的分类包括系统分类和用户自定义的分类，两种分类都要查询出来，所以需要做两次操作
        $arr = array();

        //第一类
        // 1.第一个sql模板的准备，查用户收藏的系统分类
        $sql1 = "SELECT DISTINCT category_name FROM sys_category sc,user_and_category uac 
                    WHERE sc.sys_category_id=uac.sys_category_id AND uac.sys_user_id = ?";
        // 2、预编译
        $stmt = $this->pdo->prepare($sql1);
        // 3.給占位符赋值
        $stmt->bindValue(1,$sys_user_id);
        // 4.执行
        $stmt->execute();
        // 5.处理结果集
        while ($result1 = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result1;
        }

        //第二类
        $sql2 = "SELECT DISTINCT category_name FROM user_category uc,user_and_category uac WHERE uc.user_category_id=uac.user_category_id AND uac.sys_user_id = ?";
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2 -> bindValue(1,$sys_user_id);
        $stmt2->execute();
        while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result2;
        }

       // $this->pdo = null;

        return $arr;
    }*/



    //删除分类——删除的是某用户收藏的某分类，根据用户ID和分类ID，其中还需要判断是用户自定义的分类还是系统分类
    //方法的定义，用户自定义分类ID  和  系统分类ID  使用默认值0，用来判断用户删除的是哪种类型的分类
    function deleteCategoryByUserId($sys_user_id, $sys_category_id = 0, $user_category_id = 0){
        // 1、SQL模板的准备，需要根据参数进行判断使用那条SQL模板
        if($sys_category_id == 0){
            // 如果$sys_category_id 为0,则删除的是用户自定义的ID
            $sql = "DELETE FROM user_and_category WHERE sys_user_id = ? AND user_category_id = ?";
            // 同时需要把传进来的参数进行封装
            $param = array($sys_user_id, $user_category_id);
        }else if($user_category_id == 0){
            //删除的是系统分类
            $sql = "DELETE FROM user_and_category WHERE sys_user_id = ? AND sys_category_id =?";
            $param = array($sys_user_id, $sys_category_id);
        }

        // 2、预编译
        $stmt = $this->pdo->prepare($sql);
        // 3、为占位符赋值
        $stmt->bindValue(1,$param[0]);
        $stmt->bindValue(2,$param[1]);

        //4、执行
        $result = $stmt->execute();

        //$this->pdo = null;

        return  $result;


    }

    // 搜分类——搜热门的某几个分类(热门的标识是分类收藏量在前几位)
    // 需要分类的id和分类名，返回的是许多分类，所以需要使用数组来接收
    function queryCategoryHot($number){
        $sql = "SELECT sys_category_id,category_name FROM sys_category ORDER BY category_use_count DESC LIMIT {$number}";
        $stmt = $this->pdo->prepare($sql);
        //$stmt->bindValue(1, $number);
        //$stmt->bindParam(1, $number);
        $stmt->execute();
        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
           $arr[] = $result;
        }
        return $arr;
    }


}
