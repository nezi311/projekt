<?php
/* Smarty version 3.1.31, created on 2017-12-20 16:50:49
  from "C:\xampp\htdocs\PZ\templates\freezeTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3a86d9ee80f2_84718597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ea905f2abf68c1dadb15d1e1aeed5fb153826f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\freezeTowary.html.php',
      1 => 1496765812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a3a86d9ee80f2_84718597 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów Wycofanych</h2>
</div>
<table class="table">
  <thead>
    <tr>
			<th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Cena</th><th>Wprowdz do Sprzedaży</th>
    </tr>
	</thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow2']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow2']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
  <tr>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/showone/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button"><strong><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</strong></a></td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Kategoria'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['JednostkaMiary'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Cena'];?>
</td>
    <td><a type="button" class="btn btn-primary"href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/unfreeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wprowdz do Sprzedaży</a></td>
	</tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>
</table>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
