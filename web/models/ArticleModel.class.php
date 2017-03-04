<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/7/31
 * Time: 21:37
 * 文章模块的模型类
 */

//需要导入BaseModel类


class ArticleModel extends BaseModel{

    //搜文章——搜热门文章及所属分类名称，用系统推荐的
    //用于主页热门文章的加载，分 默认 和 加载更多
    //SELECT * FROM article a, sys_category sc WHERE a.sys_category_id=sc.sys_category_id ORDER BY collect_number DESC LIMIT 25
    function queryHostArticle($num){
        $sql ="SELECT * FROM article a, sys_category sc WHERE a.sys_category_id=sc.sys_category_id ORDER BY collect_number DESC LIMIT {$num}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }
        return $arr;
    }

    //搜文章——按分类,某分类下的文章可能会有很多
    function queryArticleByCategory($sys_category_id){
        $sql = "SELECT * FROM article WHERE sys_category_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$sys_category_id);
        $stmt->execute();
        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }

        //$this->pdo = null;

        return $arr;
    }

    // 搜热门文章——搜索某一组分类
//    function queryHostArticle($sys_category_ids,$number){
//        //$sql = "SELECT * FROM article WHERE sys_category_id IN {$sys_category_ids} ORDER BY collect_number DESC LIMIT {$number}";
//        $sql = "SELECT * FROM article WHERE sys_category_id IN {$sys_category_ids}";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->execute();
//        $arr = array();
//        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//            $arr[] = $result;
//        }
//        return $arr;
//    }

    //搜热门文章——搜索某一分类下，用户收藏量在前几的文章
    function queryArticleHostByCategory($sys_category_id,$number){
        //echo $sys_category_id;
        $sql = "SELECT * FROM article WHERE sys_category_id = ? ORDER BY collect_number DESC LIMIT {$number}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$sys_category_id);
        $stmt->execute();
        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }

        return $arr;
    }

    //搜文章——按名称（将文章所属分类也搜索出来）
    function queryArticleByArticleTitle($article_title){
        $sql = "SELECT a.*,category_name FROM article a,sys_category sc WHERE a.sys_category_id=sc.sys_category_id AND a.article_title LIKE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, "%".$article_title."%");
        $stmt->execute();
        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }
        return $arr;
    }


    //搜文章——按分类和用户
    function queryArticleByCategoryAndUser($sys_user_id, $sys_category_id = 0, $user_category_id = 0){
        if ($sys_category_id == 0){
            // 如果sys_category_id为0.则查询的是用户自定义分类下的文章
            $sql = "SELECT * FROM article a,user_and_article uaa WHERE a.article_id=uaa.article_id AND uaa.sys_user_id = ? AND uaa.user_category_id = ?";
            $param = array($sys_user_id, $user_category_id);
        } else if($user_category_id == 0){
            // 如果$user_category_id为0，则查询的是系统分类下的文章
            $sql = "SELECT a.* FROM article a,user_and_article uaa WHERE a.article_id=uaa.article_id AND uaa.sys_user_id = ? AND uaa.sys_category_id = ?";
            $param = array($sys_user_id, $sys_category_id);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$param[0]);
        $stmt->bindValue(2,$param[1]);
        $stmt->execute();

        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }

        return $arr;
    }



    //搜文章——按用户最近收藏（暂时先搜索出用户最近收藏的10条），把所属分类名也搜索出来
    function queryArticleByUserCollect($sys_user_id){
        $sql = "SELECT a.*,sc.category_name  FROM article a,user_and_article uaa,sys_category sc WHERE a.article_id=uaa.article_id AND uaa.sys_user_id = 1 AND sc.sys_category_id=a.sys_category_id ORDER BY a.create_time DESC LIMIT 10";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$sys_user_id);
        $stmt->execute();

        $arr = array();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $result;
        }

        return $arr;
    }



    //删除文章——某一分类（是基于用户的删除，用户删除自己收藏的某一分类下的文章）
    function deleteArticleByCategory($sys_user_id,$sys_category_id=0, $user_category_id=0){
        if ($sys_category_id == 0){
            // 如果sys_category_id为0.则删除的是用户自定义分类下的文章
            $sql = "DELETE FROM user_and_article WHERE sys_user_id = ? AND user_category_id = ?";
            $param = array($sys_user_id, $user_category_id);
        } else if($user_category_id == 0){
            // 如果$user_category_id为0，则删除的是系统分类下的文章
            $sql = "DELETE FROM user_and_article WHERE sys_user_id = ? AND sys_category_id = ?";
            $param = array($sys_user_id, $sys_category_id);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$param[0]);
        $stmt->bindValue(2,$param[1]);
        return $stmt->execute();

    }


    //修改文章的分类ID为默认的(批量修改)
    function updateArticlesToDefault($sys_user_id,$article_ids){

        $scope = "(";
        foreach ($article_ids as $value){
            $scope .= $value;
            $scope.= ",";
        }
        //除去最后一个“，”，同时填上“）”
        // ....除去最后一个“。”没做！！！！！！！！！！！！！！
        $newScope = substr($scope,0,strlen($scope)-1);
        $newScope .= ")";


        $sql = "UPDATE user_and_article SET sys_category_id = NULL , user_category_id = NULL WHERE sys_user_id = ? AND article_id IN ".$newScope;
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$sys_user_id);
        return $stmt->execute();
    }

    //修改文章的分类为另一分类(用户收藏的某一文章)
    function updateArticleCategory($sys_user_id,$article_id,$sys_category_id=0, $user_category_id=0){
        if ($sys_category_id == 0){
            // 如果sys_category_id为0.
            $sql = "UPDATE user_and_article SET sys_category_id = NULL , user_category_id = ? WHERE sys_user_id = ? AND article_id = ?";
            $param = array($user_category_id,$sys_user_id, $article_id);
        } else if($user_category_id == 0){
            // 如果$user_category_id为0，则删除的是系统分类下的文章
            $sql = "UPDATE user_and_article SET sys_category_id = ? , user_category_id = NULL WHERE sys_user_id = ? AND article_id = ?";
            $param = array($sys_category_id,$sys_user_id, $article_id);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$param[0]);
        $stmt->bindValue(2,$param[1]);
        $stmt->bindValue(3,$param[2]);
        return $stmt->execute();
    }

    // 统计用户某一分类下的文章数
    function countArticleByCategoryAndUser($sys_user_id,$sys_category_id=0, $user_category_id=0){
        if ($user_category_id == 0){
            $sql = "SELECT COUNT(article_id) FROM user_and_article WHERE sys_user_id = ? AND sys_category_id = ?";
            $param = array($sys_user_id,$sys_category_id);
        } else if ($sys_category_id == 0){
            $sql = "SELECT COUNT(article_id) FROM user_and_article WHERE sys_user_id = ? AND user_category_id = ?";
            $param = array($sys_user_id,$user_category_id);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$param[0]);
        $stmt->bindValue(2,$param[1]);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['COUNT(article_id)'];
    }
}