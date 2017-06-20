<?php
/* Smarty version 3.1.32-dev-11, created on 2017-06-20 13:31:25
  from "C:\xampp\htdocs\smartylottery\templates\test.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_5948b32d376ac1_20129739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '144c16f281a6a582cc420d413c8c4307ca5b52ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smartylottery\\templates\\test.html',
      1 => 1497936506,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5948b32d376ac1_20129739 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3047990085948b32d372f85_58721762', 'title');
?>

  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="./mycss.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>
</head>
<body>
  <div class="contentWrap">
    <table class="gameTable">
      <thead>
        <tr>
          <th width="100" class="bl3">赛事</th>
          <th width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主队&nbsp;&nbsp;&nbsp;vs&nbsp;&nbsp;&nbsp;客队&nbsp;&nbsp;</th>
          <th width="80">截止</th>
          <th>让球</th>
          <th width="300">主胜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平局&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客胜</th>
          <th width="150" class="br3">竞猜人数</th>
        </tr>
     </thead>
      <tbody>
      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6290597175948b32d3746c1_77456577', 'tbody');
?>

      </tbody>
    </table>
  </div>
</body>
</html>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15674023575948b32d375cd3_18703751', 'script');
}
/* {block 'title'} */
class Block_3047990085948b32d372f85_58721762 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3047990085948b32d372f85_58721762',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      足球天天竞猜 - 参加足球竞猜游戏赢好礼 | 酷发巴巴彩票网
    <?php
}
}
/* {/block 'title'} */
/* {block 'tbody'} */
class Block_6290597175948b32d3746c1_77456577 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'tbody' => 
  array (
    0 => 'Block_6290597175948b32d3746c1_77456577',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'tbody'} */
/* {block 'script'} */
class Block_15674023575948b32d375cd3_18703751 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_15674023575948b32d375cd3_18703751',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
