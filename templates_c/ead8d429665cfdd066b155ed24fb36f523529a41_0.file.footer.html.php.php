<?php
/* Smarty version 3.1.31, created on 2017-01-27 15:41:50
  from "/opt/lampp/htdocs/Aplikacja_PO/templates/footer.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_588b5c2eb5d5b5_02876544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ead8d429665cfdd066b155ed24fb36f523529a41' => 
    array (
      0 => '/opt/lampp/htdocs/Aplikacja_PO/templates/footer.html.php',
      1 => 1485178554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588b5c2eb5d5b5_02876544 (Smarty_Internal_Template $_smarty_tpl) {
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
    Zaawansowane programowanie aplikacji internetowych - MVC
    </p>
</div>
</html>
<?php }
}
