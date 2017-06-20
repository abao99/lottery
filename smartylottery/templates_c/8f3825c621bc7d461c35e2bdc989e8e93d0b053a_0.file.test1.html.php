<?php
/* Smarty version 3.1.32-dev-11, created on 2017-06-20 13:39:17
  from "C:\xampp\htdocs\smartylottery\templates\test1.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-11',
  'unifunc' => 'content_5948b50594f816_68908026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f3825c621bc7d461c35e2bdc989e8e93d0b053a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smartylottery\\templates\\test1.html',
      1 => 1497937149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5948b50594f816_68908026 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14284475295948b5058f7127_98872092', 'tbody');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1910589325948b50594e277_74081198', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'test.html');
}
/* {block 'tbody'} */
class Block_14284475295948b5058f7127_98872092 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'tbody' => 
  array (
    0 => 'Block_14284475295948b5058f7127_98872092',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php
$__section_sec1_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1'] : false;
$__section_sec1_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['forum']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sec1_0_total = $__section_sec1_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = new Smarty_Variable(array());
if ($__section_sec1_0_total != 0) {
for ($__section_sec1_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] = 0; $__section_sec1_0_iteration <= $__section_sec1_0_total; $__section_sec1_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']++){
?>
        
        <tr class="more expanded" id="more<?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['more'];?>
" style="border-top: 0;" onclick="clickMore(<?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['more'];?>
)">
            <td colspan="6" class = "pointer"><span id="arrow<?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['more'];?>
" class="arrow"></span><?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['date'];?>
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
          <tr class="moreContent more<?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['more'];?>
" style="display: table-row">
              <td>
                <span class="leagueName" style='background-color: <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['raceColor'][$_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['race']];?>
; color: #FFFFFF'>
                  <?php echo $_smarty_tpl->tpl_vars['forum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['item'][(isset($_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec2']->value['index'] : null)]['race'];?>

                </span>
              </td>
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
}
}
/* {/block 'tbody'} */
/* {block 'script'} */
class Block_1910589325948b50594e277_74081198 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1910589325948b50594e277_74081198',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

   
    <?php echo '<script'; ?>
 language="javascript" type="text/javascript">
        function clickMore(id){
          $(".more"+id).toggle( );
          $("#arrow"+id).toggleClass( "arrow1" ); 
        }   
    <?php echo '</script'; ?>
>
  
<?php
}
}
/* {/block 'script'} */
}
