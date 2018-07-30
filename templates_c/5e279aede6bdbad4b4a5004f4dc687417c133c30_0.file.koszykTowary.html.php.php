<?php
/* Smarty version 3.1.31, created on 2018-07-30 16:41:04
  from "C:\xampp\htdocs\PZ\templates\koszykTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5f238026c4e6_47133143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e279aede6bdbad4b4a5004f4dc687417c133c30' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\koszykTowary.html.php',
      1 => 1515602634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5b5f238026c4e6_47133143 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--kontroler wKoszyku w TOWAR-->
<div class="page-header">
	<h2>Towary w koszyku</h2>
</div>
<?php $_smarty_tpl->_assignInScope('suma', 0);
$_smarty_tpl->_assignInScope('dostawa', 0);
if (isset($_smarty_tpl->tpl_vars['tablicaTowarow2']->value) && $_smarty_tpl->tpl_vars['tablicaTowarow2']->value != null) {?>
<table class="table" style='width:50%;'>
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Kod Towaru</th><th style=text-align:right;>Cena</th><th style=text-align:right;>Stawka Vat</th><th style=text-align:center;>Ilość</th><th style=text-align:right;>Cena częściowa</th><th style=text-align:center;>Usuń</th>
    </tr>
  </thead>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow2']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
</td>
		<td style=text-align:right;><?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['Cena'],2,',',' ');?>
 PLN</td>
    <td style=text-align:right;><?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
%</td>
    <td style=text-align:center;>
			<a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/plus/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button"><span class="glyphicon glyphicon-plus"></span></a>
			<?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
 <?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaSkrocona'];?>

			<a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/minus/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button"><span class="glyphicon glyphicon-minus"></span></a>
		</td>
		<td style=text-align:right;><?php ob_start();
echo (((($_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['StawkaVat'])/100)+$_smarty_tpl->tpl_vars['towar']->value['Cena'])*$_smarty_tpl->tpl_vars['towar']->value['ilosc']);
$_prefixVariable1=ob_get_clean();
echo number_format($_prefixVariable1,2,',',' ');?>
 PLN</td>
		<?php $_smarty_tpl->_assignInScope('suma', $_smarty_tpl->tpl_vars['suma']->value+((($_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['StawkaVat'])/100*$_smarty_tpl->tpl_vars['towar']->value['ilosc'])+$_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']));
?>
		<td style=text-align:center;><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/usun/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button"><span class="glyphicon glyphicon-remove" style=text-align:right;></span></a></td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td style=text-align:right;><b>Razem:</b></td>
		<td style=text-align:right;><b><?php echo number_format($_smarty_tpl->tpl_vars['suma']->value,2,',',' ');?>
 PLN</b></td>
		<td></td>
	</tr>
</table>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/zrealizuj" method="post" style='width:20%;'>
	<div class="col-2 col-form-label">
	<b>Klient</b>
	</div>
<div class="col-10">
	<input list="customers" name="klient">
  <datalist id="customers">

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Klienci']->value, 'klient');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['klient']->value) {
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
"><?php echo $_smarty_tpl->tpl_vars['klient']->value['Imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['klient']->value['Nazwisko'];?>
</option>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</datalist>
	</div>
	<br>

	<div class="col-2 col-form-label">
	<b>Sposób dostawy</b>
	</div>
<div class="col-10">
	<input list="delivery" name="dostawa" id="dostawa">
  <datalist id="delivery">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Dostawa']->value, 'sposob');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sposob']->value) {
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['sposob']->value['IdSposobDostawy'];?>
"><?php echo $_smarty_tpl->tpl_vars['sposob']->value['SposobDostawy'];?>
</option>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</datalist>
	</div>
	<br>

<div class="col-2 col-form-label">
<b>Sposób zapłaty</b>
</div>
<div class="col-10">
		<input list="payment" name="zaplata">
	  <datalist id="payment">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Zaplata']->value, 'zaplata');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['zaplata']->value) {
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['zaplata']->value['IdSposobZaplaty'];?>
"><?php echo $_smarty_tpl->tpl_vars['zaplata']->value['SposobZaplaty'];?>
</option>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</datalist>
		</div>
		<br>

<br>

	<input type='hidden' name='dostawaCena' value=<?php echo $_smarty_tpl->tpl_vars['dostawa']->value;?>
>
	<input type='hidden' name='suma' value=<?php echo $_smarty_tpl->tpl_vars['suma']->value;?>
>
	<input type='submit' name='submit' value=Zamów>
</form>
<?php } else { ?>
<h2>Brak towarów do zamówienia.</h2>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
