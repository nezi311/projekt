<?php
/* Smarty version 3.1.31, created on 2017-06-06 16:48:48
  from "C:\xampp\htdocs\PZ\templates\koszykTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5936c0d0388ef0_45019310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e279aede6bdbad4b4a5004f4dc687417c133c30' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\koszykTowary.html.php',
      1 => 1496753333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5936c0d0388ef0_45019310 (Smarty_Internal_Template $_smarty_tpl) {
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
      <th>Nazwa Towaru</th><th>Kod Towaru</th><th>Cena</th><th>Stawka Vat</th><th>Ilość</th><th>Cena częściowa</th><th>Usuń</th>
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
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Cena'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
%</td>
    <td>
			<a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/plus/<?php echo $_smarty_tpl->tpl_vars['towar']->value['Id'];?>
" role="button"><span class="glyphicon glyphicon-plus"></span></a>
			<?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
 <?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaSkrocona'];?>

			<a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/minus/<?php echo $_smarty_tpl->tpl_vars['towar']->value['Id'];?>
" role="button"><span class="glyphicon glyphicon-minus"></span></a>
		</td>
		<td><?php echo (((($_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['StawkaVat'])/100)+$_smarty_tpl->tpl_vars['towar']->value['Cena'])*$_smarty_tpl->tpl_vars['towar']->value['ilosc']);?>
</td>
		<?php $_smarty_tpl->_assignInScope('suma', $_smarty_tpl->tpl_vars['suma']->value+((($_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['StawkaVat'])/100*$_smarty_tpl->tpl_vars['towar']->value['ilosc'])+$_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']));
?>
		<td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/usun/<?php echo $_smarty_tpl->tpl_vars['towar']->value['Id'];?>
" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</table>

<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/zrealizuj" method="post" style='width:20%;'>
<b>Klient</b>
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
	<br>

<b>Sposób dostawy</b>
	<input list="delivery" name="dostawa">
  <datalist id="delivery">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Dostawa']->value, 'sposob');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sposob']->value) {
?>
	<?php $_smarty_tpl->_assignInScope('dostawa', $_smarty_tpl->tpl_vars['suma']->value*$_smarty_tpl->tpl_vars['sposob']->value['Cena']/100);
?>
	<option value="<?php echo $_smarty_tpl->tpl_vars['sposob']->value['IdSposobDostawy'];?>
"><?php echo $_smarty_tpl->tpl_vars['sposob']->value['SposobDostawy'];?>
/<?php echo $_smarty_tpl->tpl_vars['dostawa']->value;?>
 zł</option>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</datalist>
	<br>

<b>Sposób zapłaty</b>
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
		<br>

<br>

	<input type='hidden' name='dostawaCena' value=<?php echo $_smarty_tpl->tpl_vars['dostawa']->value;?>
>
	<input type='hidden' name='suma' value=<?php echo $_smarty_tpl->tpl_vars['suma']->value;?>
>
	<input type='submit' name='submit' value=Zamów>
</form>
Suma: <?php echo $_smarty_tpl->tpl_vars['suma']->value;?>

<?php } else { ?>
<h2>Brak towarów do zamówienia.</h2>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
