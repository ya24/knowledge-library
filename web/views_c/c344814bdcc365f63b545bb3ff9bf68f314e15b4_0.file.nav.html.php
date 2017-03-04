<?php
/* Smarty version 3.1.30, created on 2016-10-14 04:20:23
  from "E:\code\phpstormProjects\knowledge-library\web\views\nav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580040e717e639_91260007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c344814bdcc365f63b545bb3ff9bf68f314e15b4' => 
    array (
      0 => 'E:\\code\\phpstormProjects\\knowledge-library\\web\\views\\nav.html',
      1 => 1476264546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580040e717e639_91260007 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="./views/css/common.css">
    <title>nav</title>
</head>
<body>
<nav class="nav-container">
    <ul class="nav-btn">
        <li class="nav-menu" id="navMenu"><span class="icon-menu"></span></li>
        <li class="nav-search" id="navSearch"><span class="icon-search"></span></li>
    </ul>
    <div class="nav-bg"></div>
    <div class="nav-side-box">
        <div>
            <h2>三井行</h2>
            <span class="icon-menu" id="menuBack"></span>
        </div>
        <hr>
        <ul>
            <li><a href="?c=HomePage&a=home"><span class="icon-home"></span>首页</a></li>
            <li><a href="?c=Collect&a=myCollection&sys_user_id=1"><span class="icon-collect"></span>收藏</a></li>
            <li><a href=""><span class="icon-edit3"></span>建议反馈</a></li>
        </ul>
    </div>
</nav>
<!--<img class="demo" src="images/demo.jpg">-->
<?php echo '<script'; ?>
 src="./views/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./views/js/disablescroll.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./views/js/jquery.dotdotdot.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./views/js/common.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
