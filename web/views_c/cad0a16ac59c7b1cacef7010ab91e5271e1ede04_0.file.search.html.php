<?php
/* Smarty version 3.1.30, created on 2016-10-14 04:22:39
  from "E:\code\phpstormProjects\knowledge-library\web\views\search.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5800416f938456_35775722',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cad0a16ac59c7b1cacef7010ab91e5271e1ede04' => 
    array (
      0 => 'E:\\code\\phpstormProjects\\knowledge-library\\web\\views\\search.html',
      1 => 1476411755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5800416f938456_35775722 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="./views/css/common.css">
    <link rel="stylesheet" href="./views/css/module.css">
    <title>搜索</title>
</head>
<body>
<div class="search-base">
    <div class="search-bar">
        <form action="?c=Search&a=handleSearch" method="post">
            <label>
                <span class="icon-search"></span>
                <input id="search-input" name="searchValue" type="text" placeholder="search" autofocus autocomplete=off>
                <span id="search-cancel" class="icon-delsolid sr-hide"></span>
            </label>
            <button type="submit">
                <span class="icon-Go"></span>
            </button>
        </form>

    </div>
</div>
<hr>
<?php if ($_smarty_tpl->tpl_vars['flag']->value) {?>
<div class="search-result">
    <?php } else { ?>
    <div class="search-result sr-hide">
        <?php }?>
        <section class="search-classify">
     <?php if ($_smarty_tpl->tpl_vars['categorys']->value == null) {?>
        <h6 class="classify-title">无分类</h6>
            <?php } else { ?>
            <h6 class="classify-title">分类</h6>
            <?php }?>
        <ul>
            <?php if ($_smarty_tpl->tpl_vars['flag']->value == true) {?>
            <!-- 显示搜索出来的分类 -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorys']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
            <li><a href=""><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</a></li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
<!--
            <li><a href="">分类1</a></li>
            <li><a href="">分类2</a></li>-->
        </ul>
        <!--<hr>-->
        <button>
            查看更多
            <span class="icon-down"></span>
        </button>
    </section>




        <section class="search-article">
            <div class="break-line"></div>

            <?php if ($_smarty_tpl->tpl_vars['articles']->value == null) {?>
        <h6 class="classify-title">无文章</h6>
            <?php } else { ?>
            <h6 class="classify-title">文章</h6>
            <?php }?>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
            <li class="article-content">
                <div class="absolute-container">
                    <div class="article-img" style="border-radius: 50%;"><img src="./views/images/<?php echo $_smarty_tpl->tpl_vars['article']->value['icon'];?>
.png" alt=""></div>
                    <div class="article-main">
                        <div class="article-title"><a href="<?php echo $_smarty_tpl->tpl_vars['article']->value['article_original_url'];?>
"> <?php echo $_smarty_tpl->tpl_vars['article']->value['article_title'];?>
</a></div>
                        <ul class="article-attr">
                            <li><?php echo substr($_smarty_tpl->tpl_vars['article']->value['create_time'],0,10);?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['article']->value['category_name'];?>
</li>
                        </ul>
                    </div>
                </div>
            </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <!--
            <li class="article-content">
                <div class="absolute-container">
                    <div class="article-img" style="border-radius: 50%;"><img src="images/01.png" alt=""></div>
                    <div class="article-main">
                        <div class="article-title">Spring的loc容器是整个Spring框架的核心和基础 , Spring为什么要提供这样一个容器呢？</div>
                        <ul class="article-attr">
                            <li>2016/10/7</li>
                            <li>IT类</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="article-content">
                <div class="absolute-container">
                    <div class="article-img" style="border-radius: 50%;"><img src="images/01.png" alt=""></div>
                    <div class="article-main">
                        <div class="article-title">Spring的loc容器是整个Spring框架的核心和基础 , Spring为什么要提供这样一个容器呢？</div>
                        <ul class="article-attr">
                            <li>2016/10/7</li>
                            <li>IT类</li>
                        </ul>
                    </div>
                </div>
            </li>
            -->
        </ul>
        <!--<hr>-->
        <button>
            查看更多
            <span class="icon-down"></span>
        </button>
    </section>



    <div class="break-line"></div>
    <section class="search-other">
        <a>
            <span class="icon-search"></span>
            其他
            <span class="icon-right"></span>
        </a>
    </section>
</div>

    <?php if ($_smarty_tpl->tpl_vars['flag']->value) {?>
    <div class="search-tag sr-hide">
        <?php } else { ?>
        <div class="search-tag">
            <?php }?>

    <section class="hot-tag">
        <h6 class="classify-title">热门搜索词</h6>
        <ul class="search-tag-cloud">
            <li><a href="">java</a></li>
            <li><a href="">script</a></li>
            <li><a href="">spring</a></li>
            <li><a href="">csharp</a></li>
            <li><a href="">abcdefghi</a></li>
            <li><a href="">pengcanqiang</a></li>
            <li><a href="">灿强</a></li>
        </ul>
    </section>
    <seaction class="history">
        <h6 class="classify-title">历史搜索词</h6>
        <ul class="search-tag-cloud">
            <li><a href="">java</a></li>
            <li><a href="">javascript</a></li>
            <li><a href="">spring</a></li>
            <li><a href="">c sharp</a></li>
            <li><a href="">abcdefghi</a></li>
            <li><a href="">pengcanqiang</a></li>
            <li><a href="">灿强</a></li>
        </ul>
    </seaction>
    <p><a id="clearRecord" href="javascript:;">清空搜索记录</a></p>
</div>
<?php echo '<script'; ?>
 src="./views/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./views/js/common.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
