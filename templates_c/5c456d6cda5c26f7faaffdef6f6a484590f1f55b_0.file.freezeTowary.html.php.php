<?php
/* Smarty version 3.1.31, created on 2017-10-11 17:27:58
  from "/opt/lampp/htdocs/PZ/templates/freezeTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59de387ec6f578_38358447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c456d6cda5c26f7faaffdef6f6a484590f1f55b' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/freezeTowary.html.php',
      1 => 1507127201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_59de387ec6f578_38358447 (Smarty_Internal_Template $_smarty_tpl) {
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