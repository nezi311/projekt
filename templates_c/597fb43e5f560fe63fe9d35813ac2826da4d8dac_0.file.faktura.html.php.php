<?php
/* Smarty version 3.1.31, created on 2017-05-21 22:17:11
  from "C:\xampp\htdocs\PZ\templates\faktura.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5921f5c7234f82_10785555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '597fb43e5f560fe63fe9d35813ac2826da4d8dac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\faktura.html.php',
      1 => 1495397302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5921f5c7234f82_10785555 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
	<?php $_smarty_tpl->_assignInScope('licznik', "0");
?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaZamowien']->value, 'klient');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['klient']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['licznik']->value != '1') {?>
	<?php $_smarty_tpl->_assignInScope('licznik', "1");
?>
	<h2>Faktura <?php echo $_smarty_tpl->tpl_vars['klient']->value['DataZamowienia'];?>
-<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdZamowienieSprzedaz'];?>
</h2>
	<?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	<?php }?>
</div>
<table class="table sorttable" style=width:50%;>
	<thead>
		<tr>
			<th>Sprzedawca</th><th>Nabywca</th>
		</tr>
	</thead>
	<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
	<?php $_smarty_tpl->_assignInScope('licznik', "0");
?>

	  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaZamowien']->value, 'klient');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['klient']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['licznik']->value != '1') {?>
			<?php $_smarty_tpl->_assignInScope('licznik', "1");
?>
	<tr>
	<td>
Zbigniew Szpunar<br>
NIP 12345678912<br>
'Hurtownia SZPUNAR'<br>
66-666 Wrocław<br>
Malowanicza 12<br>
Tel 123-344-456<br>
z.szpunar@wp.pl<br>
4774987157985795567349 PKO SA<br>
</td>
<td>
<?php echo $_smarty_tpl->tpl_vars['klient']->value['Imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['klient']->value['Nazwisko'];?>
<br>
NIP <?php echo $_smarty_tpl->tpl_vars['klient']->value['NIP'];?>
 <br>
'<?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaFirmy'];?>
 '<br>
<?php echo $_smarty_tpl->tpl_vars['klient']->value['KodPocztowy'];?>
 <?php echo $_smarty_tpl->tpl_vars['klient']->value['Miasto'];?>
 <br>
<?php echo $_smarty_tpl->tpl_vars['klient']->value['Ulica'];?>
 <?php echo $_smarty_tpl->tpl_vars['klient']->value['Dom'];?>
 <br>
Tel <?php echo $_smarty_tpl->tpl_vars['klient']->value['Telefon'];?>
 <br>
<?php echo $_smarty_tpl->tpl_vars['klient']->value['EMail'];?>
 <br>
<?php echo $_smarty_tpl->tpl_vars['klient']->value['NrKonta'];?>
  <?php echo $_smarty_tpl->tpl_vars['klient']->value['Bank'];?>
 <br>
</td>
</tr>
<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>
</table>

<table class="table sorttable" style=width:50%;>
	<thead>
		<tr>
			<th>Towar</th><th>Ilość</th><th>Cena netto</th><th>Stawka VAT</th><th>Cena brutto</th>
		</tr>
	</thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaZamowien']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['cena'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['vat'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['cena']+($_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['vat'])/100;?>
</td>
		</tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>
</table>
Sposób dostawy: <?php echo $_smarty_tpl->tpl_vars['towar']->value['SposobDostawy'];?>
<br>
Suma: <?php echo $_smarty_tpl->tpl_vars['towar']->value['Wartosc'];?>

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
