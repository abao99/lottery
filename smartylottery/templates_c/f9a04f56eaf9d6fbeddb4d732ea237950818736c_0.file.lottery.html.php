<?php
/* Smarty version 3.1.32-dev-11, created on 2017-06-19 18:16:16
  from "C:\xampp\htdocs\smartylottery\templates\lottery.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_5947a47073e172_64351854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9a04f56eaf9d6fbeddb4d732ea237950818736c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smartylottery\\templates\\lottery.html',
      1 => 1497867373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5947a47073e172_64351854 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>足球天天竞猜 - 参加足球竞猜游戏赢好礼 | 酷发巴巴彩票网</title>
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
$__section_sec1_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1'] : false;
$__section_sec1_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['forum']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sec1_0_total = $__section_sec1_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = new Smarty_Variable(array());
if ($__section_sec1_0_total != 0) {
for ($__section_sec1_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] = 0; $__section_sec1_0_iteration <= $__section_sec1_0_total; $__section_sec1_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']++){
?>
        
        <tr class="more expanded" id=<?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['more'];?>
 style="border-top: 0;">
            <td colspan="6" class = "pointer"><span id="arrow1" class="arrow"></span><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['date'];?>
 每次竞猜选择一个选项下注</td>
        </tr>
        
        <?php
$__section_sec2_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2'] : false;
$__section_sec2_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item']) ? count($_loop) : max(0, (int) $_loop));
$__section_sec2_1_total = $__section_sec2_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sec2'] = new Smarty_Variable(array());
if ($__section_sec2_1_total != 0) {
for ($__section_sec2_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] = 0; $__section_sec2_1_iteration <= $__section_sec2_1_total; $__section_sec2_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']++){
?>
          <tr class="moreContent"<?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['more'];?>
 style="display: table-row">
              <td><span class="leagueName" style='background-color: #1b5a89; color: #FFFFFF'><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['race'];?>
</span></td>
              <td class="name">
                <span class="ht"><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['host'];?>
</span>
                <span class="vs">vs</span>
                <span class="at"><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['visite'];?>
</span> </td>
              <td><span class="time"><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['time'];?>
</span></td>
              <td>
                  <span class="rq1">0</span>
                 <?php if ($_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['concede'] > 0) {?>
                  <span class="rq2" style="color: green"><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['concede'];?>
</span>
                 <?php } else { ?>
                  <span class="rq2" style="color: red"><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['concede'];?>
</span>
                 <?php }?>
              </td>
              <td class="odds" width="300">
                 <?php if ($_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['victory'] != '') {?> 
                  <span>胜 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['victory'];?>
</span>
                  <span>平 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['draw'];?>
 </span>
                  <span>负 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['defeat'];?>
 </span>
                  <span>胜 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['victory1'];?>
</span>
                  <span>平 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['draw1'];?>
 </span>
                  <span>负 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['defeat1'];?>
 </span>
                 <?php } else { ?> 
                  <span>胜 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['victory1'];?>
</span>
                  <span>平 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['draw1'];?>
 </span>
                  <span>负 <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['defeat1'];?>
 </span>
                <?php }?> 
              </td>
              <td class="num"><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['num'];?>
人竞猜</td>
          </tr>
        <?php
}
}
if ($__section_sec2_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_sec2'] = $__section_sec2_1_saved;
}
?>
      <?php
}
}
if ($__section_sec1_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = $__section_sec1_0_saved;
}
?>
      </tbody>
    </table>
  </div>
</body>
</html>
<?php }
}
