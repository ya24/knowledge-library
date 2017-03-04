<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/8/1
 * Time: 10:02
 * 首页的控制器，一个控制器里面有多个方法，每个方法要做的事情如下
 *      1、接收用户的参数，是get方式
 *      2、实例化模型类
 *      3、调用模型类的方法，传入得到的参数，取得结果
 *      4、将结果显示在某个页面中（是用模板技术？还是返回json串给前端？）
 */


class HomePageController extends BaseController{

    //*
    // 测试
//    function hotCategoryAction(){
//        //测试smarty模板
//        $smarty = new Smarty();
//        $smarty->display("index.html");
//       // $smarty->display("nav.html");
//    }

    //进入首页，默认是先显示热门文章25个。
    function homeAction(){
        // 1实例化文章模型
        $article = ModelFactory::M("ArticleModel");
        // 2调用模型类的方法，传参，取值
        $articleArr = $article-> queryHostArticle(5);

        //$articleArr：这是某一组分类下的热门文章
        //array(4) {
        // [0]=> array(12) {
        //  ["article_id"]=> string(1) "1" ["article_title"]=> string(22) "Java从入门到精通" ["article_ original_url"]=> NULL
        // ["html_path"]=> NULL ["sys_category_id"]=> string(1) "1" ["create_time"]=> string(19) "2016-07-31 00:00:00"
        // ["last_ climbing_time"]=> NULL ["high_frequency_words"]=> string(4) "java" ["collect_number"]=> string(1) "6"
        // ["category_name"]=> string(4) "Java" ["category_use_count"]=> string(1) "6"
        // ["category_article_number"]=> string(1) "1" }
        //var_dump($articleArr);

        //3在页面显示
        $smarty = new Smarty();
        $smarty->assign("articleArr",$articleArr);//文章列表
        $smarty->assign("flag",false);   //加载更多标识标识,false为未全部加载
        $smarty->display("index.html");
    }

    // 加载更多文章
    function loadMoreArticleAction(){
        // 1实例化文章模型
        $article = ModelFactory::M("ArticleModel");
        // 2调用模型类的方法，传参，取值
        $articleArr = $article-> queryHostArticle(100);

        //$articleArr：这是某一组分类下的热门文章
        //array(4) {
        // [0]=> array(12) {
        //  ["article_id"]=> string(1) "1" ["article_title"]=> string(22) "Java从入门到精通" ["article_ original_url"]=> NULL
        // ["html_path"]=> NULL ["sys_category_id"]=> string(1) "1" ["create_time"]=> string(19) "2016-07-31 00:00:00"
        // ["last_ climbing_time"]=> NULL ["high_frequency_words"]=> string(4) "java" ["collect_number"]=> string(1) "6"
        // ["category_name"]=> string(4) "Java" ["category_use_count"]=> string(1) "6"
        // ["category_article_number"]=> string(1) "1" }
        //var_dump($articleArr);

        //3在页面显示
        $smarty = new Smarty();
        $smarty->assign("articleArr",$articleArr);//文章列表
        $smarty->assign("flag",true);   //加载更多标识标识,true为全部加载
        $smarty->display("index.html");
    }

    // 显示文章正文
    function showArticle(){

    }

    // 点击收藏，添加到用户知识库中，使用默认分类
    function userCollectArticle(){

        // 1、接收用户传入的参数
        $sys_user_id = $_GET['sys_user_id'];
        $article_id = $_GET['article_id'];
        $sys_category_id = $_GET['sys_category_id'];

        // 2、实例化模型类
        $collect = ModelFactory::M("CollectModel");

        // 3、调用模型的方法执行操作
        $collect->collectArticle($sys_user_id, $article_id, $sys_category_id);

        // 4、在页面显示结果

    }


    //进入首页，默认是先显示热门分类8个,及默认分类下的15个热门文章
    /*function homeAction(){
        // 1、取8个热门分类
        // 1.1 先实例化分类模型
        $category = ModelFactory::M("CategoryModel");
        // 1.2 调用模型类的方法，传参，取值
        $categoryArr = $category->queryCategoryHot(8);

        //$categoryArr：这是查询出来的热门分类数组,二维数组，第一维是索引数组
        //
         // array(5) {
        // [0]=> array(2) { ["sys_category_id"]=> string(1) "1" ["category_name"]=> string(4) "Java" }
         // [1]=> array(2) { ["sys_category_id"]=> string(1) "2" ["category_name"]=> string(10) "JavaScript" }
        //

        // 1.3取出热门分类ID
        $sys_category_ids = "(";
        //var_dump($categoryArr);
        foreach ($categoryArr as $key => $category){
            $sys_category_ids .= $category['sys_category_id'];
            if ($key<count($categoryArr)-1){
                $sys_category_ids .= ",";
            }
        }
        $sys_category_ids .= ")";

        //  2、取如上热门分类ID下的热门文章
        // 2.1 实例化文章模型
        $article = ModelFactory::M("ArticleModel");
        // 2.2 调用模型类的方法，传参，取值
        $articleArr = $article-> queryHostArticle($sys_category_ids,count($categoryArr)*10);

        //$articleArr：这是某一组分类下的热门文章
        //array(4) {
        // [0]=> array(9) { ["article_id"]=> string(1) "1" ["article_title"]=> string(22) "Java从入门到精通" ["article_ original_url"]=> NULL ["html_path"]=> NULL ["sys_category_id"]=> string(1) "1" ["create_time"]=> string(19) "2016-07-31 00:00:00" ["last_ climbing_time"]=> NULL ["high_frequency_words"]=> string(4) "java" ["collect_number"]=> string(1) "6" }
        // [1]=> array(9) { ["article_id"]=> string(1) "2" ["article_title"]=> string(28) "JavaScript高级程序设计" ["article_ original_url"]=> NULL ["html_path"]=> NULL ["sys_category_id"]=> string(1) "2" ["create_time"]=> string(19) "2016-07-31 00:00:00" ["last_ climbing_time"]=> NULL ["high_frequency_words"]=> string(10) "JavaScript" ["collect_number"]=> string(1) "3" }
        //var_dump($articleArr);

        // 3 在页面显示结果
        $smarty = new Smarty();
        $smarty->assign("articleArr",$articleArr);
        $smarty->assign("categoryArr",$categoryArr);
        //$smarty->display("index.html");
        $smarty->display("test.html");
    }*/

    // 进入首页，默认是先显示热门分类8个
    /*
    function hotCategoryAction(){
        // 1、取8个热门分类
        // 1.1 先实例化分类模型
        $category = ModelFactory::M("CategoryModel");
        // 1.2 调用模型类的方法，传参，取值
        $categoryArr = $category->queryCategoryHot(8);

        //$categoryArr：这是查询出来的热门分类数组,二维数组，第一维是索引数组
        //var_dump($categoryArr);

        // 1.3 在页面显示结果
        $smarty = new Smarty();
        $smarty->assign("categoryArr",$categoryArr);
        $smarty->display("index.html");



    }

    // 接下来是根据分类ID查找热门的文章
    function hotArticleAction(){

        // 1.接收用户传入的参数，搜索某一分类下的热门文章
        $hotCategoryId = $_GET['hotCategoryId'];

        // 2 实例化文章模型
        $article = ModelFactory::M("ArticleModel");
        // 3 调用模型类的方法，传参，取值
        $articleArr = $article-> queryArticleHostByCategory($hotCategoryId,15);

        //$articleArr：这是某一分类下的热门文章
        //
        // array(2) { [0]=> array(9) {
        //  ["article_id"]=> string(1) "3" ["article_title"]=> string(8) "thinkPHP" ["article_ original_url"]=> NULL ["html_path"]=> NULL ["sys_category_id"]=> string(1) "3" ["create_time"]=> string(19) "2016-07-31 00:00:00" ["last_ climbing_time"]=> NULL ["high_frequency_words"]=> string(3) "php" ["collect_number"]=> string(1) "1" }
        //[1]=> array(9) { ["article_id"]=> string(1) "5" ["article_title"]=> string(21) "php从入门到精通" ["article_ original_url"]=> NULL ["html_path"]=> NULL ["sys_category_id"]=> string(1) "3" ["create_time"]=> string(19) "2016-07-31 00:00:00" ["last_ climbing_time"]=> NULL ["high_frequency_words"]=> string(9) "php入门" ["collect_number"]=> string(1) "1" } }
         //

        // 4 在页面显示结果
        $smarty = new Smarty();
        $smarty->assign("articleArr",$articleArr);
        $smarty->display("index.html");
    }*/





/*
    // 进入首页，默认是先显示热门分类8个
    function indexAction(){
        //此处有两个逻辑需要处理
        // 1、先取得8个热门分类
        // 2、再取得8个热门分类下的文章
        // 3、将结果一起返回给前端

        // 1、取8个热门分类
        // 1.1 先实例化分类模型
        $category = ModelFactory::M("CategoryModel");
        // 1.2 调用模型类的方法，传参，取值
//        $categoryArr = $category->queryCategoryHot(8);
        $categoryArr = $category->queryCategoryHot(2);

//        echo "<pre>";
//        var_dump($categoryArr);
//        echo "</pre>";
//
        echo "<hr/>";
        echo json_encode($categoryArr);

      //  return $categoryArr;

        $articleArrs = array();

        // 2、取8个热门分类下的文章，遍历分类ID
        foreach ($categoryArr as $values){
            // 2.1遍历出来的每个分类ID
            $sys_category_id =  $values["sys_category_id"];
            // 2.2 根据每个分类ID查找此分类下的人文章，默认15个
            // 2.2.1 实例化文章模型
            $article = ModelFactory::M("ArticleModel");
            // 2.2.2 调用模型类的方法，传参，取值
//            $articleArrs[] = $article-> queryArticleHostByCategory($sys_category_id,15);
            $articleArrs[] = $article-> queryArticleHostByCategory($sys_category_id,4);
        }

//        echo "<pre>";
//        var_dump($articleArrs);
//        echo "</pre>";
//        echo "<hr/>";
//        echo json_encode($articleArrs);

        // 3、将结果一起返回给前端（结果有：$categoryArr分类，$articleArrs文章）
        // 先对结果进行分析处理一下

    }
*/
}


