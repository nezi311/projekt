<?php
/* Smarty version 3.1.31, created on 2017-04-04 21:21:42
  from "E:\xampp\htdocs\PZ\templates\footer.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58e3f246102135_04847889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c527cbfd6e94fad316ffd6b5171299da861f4a2' => 
    array (
      0 => 'E:\\xampp\\htdocs\\PZ\\templates\\footer.html.php',
      1 => 1488911382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e3f246102135_04847889 (Smarty_Internal_Template $_smarty_tpl) {
?>
      </div>
    </div>
  </div>
</body>
<div class="panel-footer">
    <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/search_autocomplete.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.cookie.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.validate.min.js"><?php echo '</script'; ?>
>
    <p class="text-muted">
    Hurtownia SZPUNAR - Projekt zespołowy 2017
    </p>
</div>
</html>
<?php }
}