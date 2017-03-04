<?php
/* Smarty version 3.1.30, created on 2016-10-14 04:21:42
  from "E:\code\phpstormProjects\knowledge-library\web\views\collection.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58004136eb5cb7_49383868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c96a473af42a47c45a1f7832c41589a16877f66c' => 
    array (
      0 => 'E:\\code\\phpstormProjects\\knowledge-library\\web\\views\\collection.html',
      1 => 1476411699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:nav.html' => 1,
  ),
),false)) {
function content_58004136eb5cb7_49383868 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, name=viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" /><!-- iphone设备中的safari私有meta标签,允许全屏模式浏览 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black" /><!--iphone的私有标签，指定iphone中safari顶端的状态条的样式 -->
    <meta content="telephone=no" name="format-detection" /><!-- 忽略将页面中的数字识别为电话号码 -->
    <link rel="stylesheet" href="./views/css/common.css">
    <link rel="stylesheet" href="./views/css/module.css">
    <link rel="stylesheet" href="./views/css/collection.css">
  <title>我的收藏</title>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <ul class="collected">
    <li><span class="icon-add1 sr-hide"></span></li>
    <li ><span id ="edit" class="icon-edit5"></span></li>
    <li><span id="ok" class="icon-ok1 sr-hide"></span></li>
  </ul>
  <div class="collect-rank">
      <ul class="collect-ul">
        <li>
          <a href="###"><span class="icon-right"></span><span class="icon-down2 sr-hide"></span>最近收藏</a>
          <div class="collect-scan">
            <span class="">10</span>
            <span class="icon-icon2del sr-hide"></span>
            <span class="icon-circle1 sr-hide" id="del-1"></span>
          </div>
          <ul class="collect-article">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recent_articles']->value, 'recent_article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['recent_article']->value) {
?>
            <li class="article-content">
              <p class="article-inner"><?php echo $_smarty_tpl->tpl_vars['recent_article']->value['category_name'];?>
</p>
              <div class="absolute-container">
                <div class="icon-font sr-hide">
                  <span class="icon-ok sr-hide"></span>
                  <span class="icon-circle1 sr-hide"></span>
                </div>
                <div class="article-img" ><img style="border-radius: 50%;" src="./views/images/<?php echo $_smarty_tpl->tpl_vars['recent_article']->value['icon'];?>
.png" alt=""></div>
                <div class="article-main">
                   <article class="article-title"><a href="<?php echo $_smarty_tpl->tpl_vars['recent_article']->value['article_original_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['recent_article']->value['article_title'];?>
</a></article>
                  <p><?php echo substr($_smarty_tpl->tpl_vars['recent_article']->value['create_time'],0,10);?>
</p>
                </div>
              </div>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </ul>
        </li>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['collect_category']->value, 'category', false, 'category_name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category_name']->value => $_smarty_tpl->tpl_vars['category']->value) {
?>
        <li>
          <a href="###"><span class="icon-right"></span><span class="icon-down2 sr-hide"></span><?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
</a>
          <div class="collect-scan">
            <span class=""><?php echo $_smarty_tpl->tpl_vars['category']->value['article_num'];?>
</span>
            <span class="icon-icon2del sr-hide"></span>
            <span class="icon-circle1 sr-hide" id="del-1"></span>
          </div>
          <ul class="collect-article">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['article'], 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
            <li class="article-content">
              <p class="article-inner"></p>
              <div class="absolute-container">
                <div class="article-img"><img src="./views/images/<?php echo $_smarty_tpl->tpl_vars['article']->value['icon'];?>
.png" alt=""></div>
                <div class="article-main">
                  <article class="article-title"><a href="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_original_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['article_title'];?>
</a></article>
                  <p><?php echo substr($_smarty_tpl->tpl_vars['article']->value['create_time'],0,10);?>
</p>
                </div>
              </div>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

          </ul>
        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <li>
          <a href="###"><span class="icon-right"></span><span class="icon-down2 sr-hide"></span>未分类</a>
          <div class="collect-scan">
            <span class="">&nbsp;</span>
            <span class="icon-icon2del sr-hide"></span>
            <span class="icon-circle1 sr-hide" id="del-1"></span>
          </div>
          <ul class="collect-article"></ul>
        </li>
        <!--
        <li>
          <a href="###"><span class="icon-right"></span><span class="icon-down2 sr-hide"></span>分类III</a>
          <div class="collect-scan">
            <span class="">11</span>
            <span class="icon-icon2del sr-hide"></span>
            <span class="icon-circle1 sr-hide" id="del-1"></span>
          </div>
          <ul class="collect-article"></ul>
        </li>
        -->
      </ul>
    </div>
  </div>
  <form action="" method="post">
    <div class="alert-del sr-hide">
      <ul>
        <li>
          <span class="icon-circle1" id="del-1"></span>
          <span class="icon-dot sr-hide" id="del-1"></span>
          <label class="del-font">删除分类以及所有文章</lable>
        </li>
        <li>
          <span class="icon-circle1" id="del-1"></span>
          <span class="icon-dot sr-hide" id="del-1"></span>
          <label class="del-font">仅删除类并将所有文章移至未分类</label>
        </li>
      </ul>
      <div class="del-btn">
        <button class="btn-cancle">Cancle</button>
        <button class="btn-ok" type="submit">OK</button>
      </div>
    </div>
  </form>
  <form action="" method="post">
    <div class="alert-sort sr-hide">
      <ul>
        <li><span class="icon-circle1"></span><span class="icon-dot sr-hide"></span>分类I</li>
        <li><span class="icon-circle1"></span><span class="icon-dot sr-hide"></span>分类II</li>
        <li><span class="icon-circle1"></span><span class="icon-dot sr-hide"></span>分类III</li>
        <li><span class="icon-circle1"></span><span class="icon-dot sr-hide"></span>分类IV</li>
      </ul>
      <div class="del-btn">
        <button class="btn-cancle">Cancle</button>
        <button class="btn-ok" type="submit">OK</button>
      </div>
    </div>
  </form>
  <?php echo '<script'; ?>
 src="./views/js/jquery.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="./views/js/controler.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="./views/js/disablescroll.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./views/js/common.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
