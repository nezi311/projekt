<?php
/* Smarty version 3.1.31, created on 2018-07-30 16:39:49
  from "C:\xampp\htdocs\PZ\templates\indexTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5f23352b5253_79548426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a470a09385266ff103561b8dd6abd39b429c9644' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\indexTowary.html.php',
      1 => 1514826858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5b5f23352b5253_79548426 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table sortable">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th style=text-align:center;>Stan Magazynowy Dysponowany</th><th style=text-align:center;>Kategoria</th><th style=text-align:center;>Jednostka Miary</th><th style=text-align:right;>Cena netto</th><th style=text-align:right;>VAT</th><th style=text-align:right;>Cena brutto</th><th class="sorttable_nosort">Wycofaj z sprzedaży</th><th class="sorttable_nosort">Kup</th>
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
    <td style=text-align:center;><?php echo $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany'];?>
</td>
    <td style=text-align:center;><?php echo $_smarty_tpl->tpl_vars['towar']->value['Kategoria'];?>
</td>
    <td style=text-align:center;><?php echo $_smarty_tpl->tpl_vars['towar']->value['JednostkaMiary'];?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['towar']->value['Cena'] == 0) {?>
			<td style=text-align:right;>Brak towaru</td>
		<?php } else { ?>
			<td style=text-align:right;><?php echo number_format((float)$_smarty_tpl->tpl_vars['towar']->value['Cena'],2,',',' ');?>
 PLN</td>
		<?php }?>
    <td style=text-align:center;><?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['towar']->value['Cena'] == 0) {?>
			<td style=text-align:right;>Brak towaru</td>
		<?php } else { ?>
		<td style=text-align:center;><?php echo number_format(((float)$_smarty_tpl->tpl_vars['towar']->value['Cena']+(((float)$_smarty_tpl->tpl_vars['towar']->value['StawkaVat']*(float)$_smarty_tpl->tpl_vars['towar']->value['Cena'])/100)),2,',',' ');?>
 PLN</td>
		<?php }?>
		<td>
    <a type="button" class="btn btn-primary" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/freeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wycofaj z Sprzedaży</a>

	</td>
		<td>
		<?php if ($_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany'] != 0) {?>
		<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/koszyk/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" method="post">
			<input type='hidden' name='IdTowar' value=<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
>
			<input type='hidden' name='cena' value=<?php echo $_smarty_tpl->tpl_vars['towar']->value['Cena'];?>
>
			<?php if ($_smarty_tpl->tpl_vars['towar']->value['Cena'] == 0) {?>
			<input type='submit' class="btn btn-primary" value='Dodaj' disabled>
			<?php } else { ?>
			<input type='submit' class="btn btn-primary" value='Dodaj'>
			<?php }?>
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
		<?php } else { ?>
		<div class="alert alert-danger" style=text-align:center;>
  	<strong>Brak towaru</strong>
		</div>
		<?php }?>
	</td>
</tr>

  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>
</table>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value) && $_smarty_tpl->tpl_vars['error']->value != '') {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }
if (isset($_smarty_tpl->tpl_vars['errorCennik']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['errorCennik']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
