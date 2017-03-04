<?php
/* Smarty version 3.1.30, created on 2016-10-14 04:21:16
  from "E:\code\phpstormProjects\knowledge-library\web\views\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5800411cbdc696_66114144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56a3b41434c9022e37d72a7643e32af79b8883e8' => 
    array (
      0 => 'E:\\code\\phpstormProjects\\knowledge-library\\web\\views\\index.html',
      1 => 1476411663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:nav.html' => 1,
  ),
),false)) {
function content_5800411cbdc696_66114144 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, name=viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" /><!-- iphone设备中的safari私有meta标签,允许全屏模式浏览 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black" /><!--iphone的私有标签，指定iphone中safari顶端的状态条的样式 -->
    <meta content="telephone=no" name="format-detection" /><!-- 忽略将页面中的数字识别为电话号码 -->
    
    <link rel="stylesheet" href="./views/css/common.css"><link rel="stylesheet" href="./views/css/module.css">
    <title>首页</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <header class="index-head">
    <img src="./views/images/logo.jpg" alt="">
  </header>
  <main id="blog_list" class="article">
    <div class="loading_top">加载中...</div>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articleArr']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>

      <li class="article-content">
        <p class="article-inner"><?php echo $_smarty_tpl->tpl_vars['article']->value['category_name'];?>
</p>
        <div class="absolute-container">
          <div class="article-img"><img src="./views/images/<?php echo $_smarty_tpl->tpl_vars['article']->value['icon'];?>
.png" alt=""></div>
          <div class="article-main">
             <div class="article-title"><a href="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_original_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['article_title'];?>
</a></div>
            <p><?php echo substr($_smarty_tpl->tpl_vars['article']->value['create_time'],0,10);?>
</p>
          </div>
        </div>
       </li> <!-- 一篇文章（一个整体）/ -->
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <!--
      <li class="article-content">
        <p class="article-inner">IT类</p>
        <div class="absolute-container">
          <div class="article-img" style="border-radius: 50%;"><img src="images/01.png" alt=""></div>
          <div class="article-main">
             <div class="article-title">Spring的loc容器是整个Spring框架的核心和基础 , Spring为什么要提供这样一个容器呢？</div>
            <p>浏览人数：</p> 
          </div>
        </div>
       </li> <!-- 一篇文章（一个整体）/ --
      <li class="article-content">
        <p class="article-inner">IT类</p>
        <div class="absolute-container">
          <div class="article-img" style="border-radius: 50%;"><img src="images/01.png" alt=""></div>
          <div class="article-main">
             <div class="article-title">Spring的loc容器是整个Spring框架的核心和基础 , Spring为什么要提供这样一个容器呢？</div>
            <p>浏览人数：</p> 
          </div>
        </div>
      </li><!-- 一篇文章（一个整体）/ --
      <li class="article-content">
        <p class="article-inner">IT类</p>
        <div class="absolute-container">
          <div class="article-img" style="border-radius: 50%;"><img src="images/01.png" alt=""></div>
          <div class="article-main">
             <div class="article-title">Spring的loc容器是整个Spring框架的核心和基础 , Spring为什么要提供这样一个容器呢？</div>
            <p>浏览人数：</p> 
          </div>
        </div>
      </li><!-- 一篇文章（一个整体）/ ---->
    </ul>
    <?php if ($_smarty_tpl->tpl_vars['flag']->value) {?><!--flag为true，全部加载-->
    <a href="javascript:location.href = '?c=HomePage&a=loadMoreArticle';" class="btn-more sr-hide">加载更多</a>
    <div class="no_content">没有找到相关记录：</div>
    <div class="loading_bottom">加载中...</div>
    <div class="">没有更多了</div>
    <?php } else { ?>
      <a href="javascript:location.href = '?c=HomePage&a=loadMoreArticle';" class="btn-more">加载更多</a>
      <div class="no_content">没有找到相关记录：</div>
      <div class="loading_bottom">加载中...</div>
      <div class="no_more">没有更多了</div>
     <?php }?>
  </main>
  <?php echo '<script'; ?>
 src="./views/js/jquery.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="./views/js/list.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
      $(function() {
        var i=$('.article-title').dotdotdot(); });
  <?php echo '</script'; ?>
>
</body>
</html><?php }
}
