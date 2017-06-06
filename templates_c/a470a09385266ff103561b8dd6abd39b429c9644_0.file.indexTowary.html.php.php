<?php
/* Smarty version 3.1.31, created on 2017-06-06 18:25:03
  from "C:\xampp\htdocs\PZ\templates\indexTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5936d75f016002_36508112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a470a09385266ff103561b8dd6abd39b429c9644' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\indexTowary.html.php',
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
function content_5936d75f016002_36508112 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table sortable">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Kategoria</th><th>Jednostka Miary</th><th>Cena</th><th class="sorttable_nosort">Wycofaj z sprzedaży</th><th class="sorttable_nosort">Kup</th>
    </tr>
  </thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow']->value, 'towar');
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
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Kategoria'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['JednostkaMiary'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Cena'];?>
</td>
		<td>
    <a type="button" class="btn btn-primary" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/freeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wycofaj z Sprzedaży</a>

	</td>
		<td>
		<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/koszyk/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" method="post">
			<input type='hidden' name='IdTowar' value=<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
>

			<input type='submit' class="btn btn-primary" value='Dodaj'>

			<?php $_smarty_tpl->_assignInScope('ilosc', 1);
?>
			<select name='ilosc' id='ilosc'>
				<?php
 while ($_smarty_tpl->tpl_vars['ilosc']->value <= $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany']) {?>
					<option value=<?php echo $_smarty_tpl->tpl_vars['ilosc']->value;?>
><?php echo $_smarty_tpl->tpl_vars['ilosc']->value;?>
</option>
					<?php echo $_smarty_tpl->tpl_vars['ilosc']->value++;?>

				<?php }?>

			</select>

		</form>
	</td>
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
