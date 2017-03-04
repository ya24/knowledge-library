<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/10/6
 * Time: 14:26
 * 我的收藏控制器
 */
class CollectController extends BaseController{


    // 用户收藏页
    function myCollectionAction(){
        // 1.获取用户ID
        $sys_user_id = $_GET['sys_user_id'];

        // 2。实例化模型对象
        $article = ModelFactory::M("ArticleModel");
        $category = ModelFactory::M("CategoryModel");

        // 3.搜用户最近搜查文章
        $recent_article = $article->queryArticleByUserCollect($sys_user_id);
        // $recent_article结果：array(4) {[0]=> array(9) {
        //  ["article_id"]=> string(1) "2"
        //  ["article_title"]=> string(28) "JavaScript高级程序设计"
        // ["article_original_url"]=> NULL
        // ["html_path"]=> NULL
        // ["sys_category_id"]=> string(1) "2"
        // ["create_time"]=> string(19) "2016-07-31 00:00:00"
        // ["last_ climbing_time"]=> NULL
        // ["high_frequency_words"]=> string(10) "JavaScript"
        // ["collect_number"]=> string(1) "3"
        //var_dump($recent_article);

        // 4.搜用户收藏的分类，及分类下的文章总数(分类包括系统分类和用户自定义分类)，还有文章
        //用户的分类包括系统分类和用户自定义的分类，两种分类都要查询出来，所以需要做两次操作
        $collect_category = array();
        //第一类,查询系统分类
        $sys_categorys = $category->querySysCategoryByUser($sys_user_id);
        //$sys_categorys结果如下：
        //array(2) {
        // [0]=> array(2) { ["sys_category_id"]=> string(1) "2" ["category_name"]=> string(6) "教育" }
        // [1]=> array(2) { ["sys_category_id"]=> string(1) "1" ["category_name"]=> string(6) "体育" }}

        foreach ($sys_categorys as $sys_category){
//                $sys_category_id = $sys_category['sys_category_id'];
//                $sys_num = $article->countArticleByCategoryAndUser($sys_user_id, $sys_category_id ,0);
//                $collect_category[$sys_category_id] = array();
//                $collect_category[$sys_category_id]['category_name'] = $sys_category['category_name'];
//                $collect_category[$sys_category_id]['article_num'] = $sys_num;

            $sys_num = $article->countArticleByCategoryAndUser($sys_user_id, $sys_category['sys_category_id'] ,0);
            $collect_category[$sys_category['category_name']] = array();
            $collect_category[$sys_category['category_name']]['category_id'] = $sys_category['sys_category_id'];
            $collect_category[$sys_category['category_name']]['article_num'] = $sys_num;

            // 查找指定系统分类ID下的文章
            $collect_category[$sys_category['category_name']]['article'] =$article->queryArticleByCategoryAndUser($sys_user_id,$sys_category['sys_category_id'],0);
        }


        //第二类,查询用户分类
        $user_categorys = $category->queryUserCategoryByUser($sys_user_id);
        foreach ($user_categorys as $user_category){
//                $user_category_id = $user_category['user_category_id'];
//                $user_num = $article->countArticleByCategoryAndUser($sys_user_id, 0, $user_category_id);
//                $collect_category[$user_category_id] = array();
//                $collect_category[$user_category_id]['category_name'] = $user_category['category_name'];
//                $collect_category[$user_category_id]['article_num'] = $user_num;

            $user_num = $article->countArticleByCategoryAndUser($sys_user_id, 0, $user_category['user_category_id']);
            $collect_category[$user_category['category_name']] = array();
            $collect_category[$user_category['category_name']]['category_id'] = $user_category['user_category_id'];
            $collect_category[$user_category['category_name']]['article_num'] = $user_num;

            // 查找指定系统分类ID下的文章
            $collect_category[$user_category['category_name']]['article'] =$article->queryArticleByCategoryAndUser($sys_user_id,0,$user_category['user_category_id']);

        }

        //$collect_category的结果：是二维数组，一维是分类ID，二维是分类ID对应的分类名称和文章总数

        // 5。在页面显示
        $smarty = new Smarty();
        $smarty->assign("recent_articles",$recent_article);
        $smarty->assign("collect_category",$collect_category);
        $smarty->display("collection.html");


    }

    //用户展开某一分类，显示该分类下的文章
//    function showArticleByCategoryAction(){
//        echo $_GET['category_id'];
//    }
}