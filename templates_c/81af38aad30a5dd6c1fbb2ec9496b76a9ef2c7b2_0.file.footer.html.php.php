<?php
/* Smarty version 3.1.31, created on 2017-10-04 16:52:42
  from "/opt/lampp/htdocs/PZ/templates/footer.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d4f5baddabc5_42745956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81af38aad30a5dd6c1fbb2ec9496b76a9ef2c7b2' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/footer.html.php',
      1 => 1507127201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d4f5baddabc5_42745956 (Smarty_Internal_Template $_smarty_tpl) {
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