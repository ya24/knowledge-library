<?php
/**
 * Created by PhpStorm.
 * User: ya
 * Date: 2016/8/6
 * Time: 20:35
 * 搜索页控制类
 */


class SearchController extends BaseController{

    // 显示搜索页
    function showSearchAction(){
        $smarty = new Smarty();
        $smarty->assign("flag",false);  //标识变量，只显示页面，不显示后台数据
        $smarty->display("search.html");
    }

    // 搜索处理——显示搜索结果
    function handleSearchAction(){

        $smarty = new Smarty();

        // 1.获取搜索框的name值
        $value = $_POST['searchValue'];

        // 如果搜索框内容为空，返回搜索页
        if ($value == null || $value == ""){
            $smarty->assign("flag",false);  //标识变量，只显示页面，不显示后台数据
            $smarty->display("search.html");
            exit();
        }

        $category = ModelFactory::M("CategoryModel");
        $article = ModelFactory::M("ArticleModel");

        // 2.按名称搜索分类
        $categoryArr = $category->queryCategoryByCategoryName($value);

        // 3.按名称搜索文章
        $articleArr = $article->queryArticleByArticleTitle($value);


        // 4.显示结果

        $smarty->assign("flag",true);  //标识变量，显示后台数据
        $smarty->assign("categorys",$categoryArr);
        $smarty->assign("articles",$articleArr);
        $smarty->display("search.html");
    }


    // 搜索分类，根据分类名称搜索
    function searchCategoryByNameAction(){
        // 1、接收参数
        $category_name = $_GET["category_name"];

        // 2、实例化模型类
        $category = ModelFactory::M("CategoryModel");

        // 3、得到结果
        $categoryArr = $category->queryCategoryByCategoryName($category_name);

        // 4、$categoryArr是按分类名称模糊查询的搜索结果，是一个二维数组，包含分类所有信息
        // 在页面中显示，有两个逻辑，默认显示8个，点击查看更多显示所有

    }

    // 显示文章，显示指定分类下的文章
    function showArticlByCategoryAction(){
        $category_id = $_GET["category_id"];

        $article = ModelFactory::M("ArticleModel");

        $articleArr = $article->queryArticleByCategory($category_id);

        // $articleArr 某一分类下的所有文章的所有信息，
        // 在页面中显示，有两个逻辑，默认显示15个，点击查看更多显示所有
    }


    // 搜索文章，按文章标题搜索
    function searchArticleByName(){
        $article_title = $_GET['$article_title'];

        $article = ModelFactory::M("ArticleModel");

        $articleArr = $article->queryArticleByArticleTitle($article_title);

        // $articleArr 按文章标题模糊搜索的所有文章的所有信息，
        // 在页面中显示，有两个逻辑，默认显示15个，点击查看更多显示所有
    }


}