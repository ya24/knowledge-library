<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/8/1
 * Time: 15:43
 * 收藏模块的模型
 */


class CollectModel extends BaseModel{

    // 收藏文章，点击收藏，添加到用户知识库中，使用默认分类
    // 在数据库中的逻辑就是，在user_and_article用户文章关联表中将该文章和用户以及分类建立起联系
    function collectArticle($sys_user_id,$article_id,$sys_category_id){
        $sql = "INSERT INTO user_and_article(sys_user_id,article_id,sys_category_id) VALUES(?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$sys_user_id);
        $stmt->bindValue(2,$article_id);
        $stmt->bindValue(3,$sys_category_id);
        return $stmt->execute();
    }



    /*function queryCategoryByUser($sys_user_id){
        //用户的分类包括系统分类和用户自定义的分类，两种分类都要查询出来，所以需要做两次操作
        $arr = array();

        //第一类
        // 1.第一个sql模板的准备，查用户收藏的系统分类(查找出系统分类ID和名称)
        $sql1 = "SELECT sc.sys_category_id, category_name FROM sys_category sc,user_and_category uac 
                    WHERE sc.sys_category_id=uac.sys_category_id AND uac.sys_user_id = ?";
        // 2、预编译
        $stmt1 = $this->pdo->prepare($sql1);
        // 3.給占位符赋值
        $stmt1->bindValue(1,$sys_user_id);
        // 4.执行
        $stmt1->execute();
        // 5.处理结果集
        while ($result1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
            // 对查询出来的结果做处理，查询结果如下：
            //array(2) { ["sys_category_id"]=> string(1) "2" ["category_name"]=> string(10) "JavaScript" }

            // 取sys_category_id去查用户此分类下收藏的文章总数
            //取出的文章总数，放入数组中，分类名为key，总数为value
            $sys_category_id = $result1['sys_category_id'];
            $sql11 = "SELECT COUNT(*) FROM user_and_article WHERE sys_user_id = ? AND sys_category_id =?";
            $stmt11 = $this->pdo->prepare($sql11);
            $stmt11->bindValue(1,$sys_user_id);
            $stmt11->bindValue(2,$sys_category_id);
            $stmt11->execute();

            $arr[$result1['category_name']] = $stmt11->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];//取出的文章总数，放入数组中，分类名为key，总数为value

        }


        //第二类
        $sql2 = "SELECT uc.user_category_id, category_name FROM user_category uc,user_and_category uac WHERE uc.user_category_id=uac.user_category_id AND uac.sys_user_id = ?";
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2 -> bindValue(1,$sys_user_id);
        $stmt2->execute();
        while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
            // 对查询出来的结果做处理，查询结果如下：
            //array(2) { ["user_category_id"]=> string(1) "2" ["category_name"]=> string(10) "JavaScript" }

            // 取sys_category_id去查用户此分类下收藏的文章总数
            //取出的文章总数，放入数组中，分类名为key，总数为value
            $user_category_id = $result2['user_category_id'];
            $sql22 = "SELECT COUNT(*) FROM user_and_article WHERE sys_user_id = ? AND user_category_id =?";
            $stmt22 = $this->pdo->prepare($sql22);
            $stmt22->bindValue(1,$sys_user_id);
            $stmt22->bindValue(2,$user_category_id);
            $stmt22->execute();

            $arr[$result2['category_name']] = $stmt22->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];//取出的文章总数，放入数组中，分类名为key，总数为value

        }

        // $this->pdo = null;
        return $arr;
    }
*/
}