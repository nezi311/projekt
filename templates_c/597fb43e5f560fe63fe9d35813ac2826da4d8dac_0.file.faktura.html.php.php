<?php
/* Smarty version 3.1.31, created on 2017-06-06 17:58:42
  from "C:\xampp\htdocs\PZ\templates\faktura.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5936d13218d5d2_07207507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '597fb43e5f560fe63fe9d35813ac2826da4d8dac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\faktura.html.php',
      1 => 1496759220,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5936d13218d5d2_07207507 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\PZ\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
	<?php $_smarty_tpl->_assignInScope('lp', 1);
?>
	<?php $_smarty_tpl->_assignInScope('wartoscnetto', 0);
?>
	<?php $_smarty_tpl->_assignInScope('wartoscvat', 0);
?>
	<?php $_smarty_tpl->_assignInScope('wartoscbrutto', 0);
?>
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
	<h3>Faktura VAT nr. <?php echo $_smarty_tpl->tpl_vars['klient']->value['DataZamowienia'];?>
-<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdZamowienieSprzedaz'];?>
 z dnia <?php echo $_smarty_tpl->tpl_vars['klient']->value['DataZamowienia'];?>
</h3>
	<h3>Data wystawienia: <?php echo smarty_modifier_date_format(time(),"%Y");?>
-<?php echo smarty_modifier_date_format(time(),"%m");?>
-<?php echo smarty_modifier_date_format(time(),"%d");?>
</h3>
	<h3>Data sprzedaży: <?php echo $_POST['dataSprzedazy'];?>
</h3>
	<h3>Sposob zapłaty: <?php echo $_smarty_tpl->tpl_vars['klient']->value['SposobZaplaty'];?>
</h3>
	<h3>Termin zapłaty: <?php echo $_POST['dataZaplaty'];?>
</h3>
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
23 1500 1663 6363 9661 8188 7238 PKO SA<br>
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
			<th>Lp.</th><th>Kod towaru</th><th>Nazwa towaru</th><th>Jednostka miary</th><th>Ilość</th><th>Cena netto</th><th>Wartość netto</th><th>Stawka VAT</th><th>Wartość VAT</th><th>Wartość brutto</th>
		</tr>
	</thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaZamowien']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['lp']->value;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Nazwa'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['cena'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['vat'];?>
%</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']*$_smarty_tpl->tpl_vars['towar']->value['vat']/100;?>
</td>
		<td><?php echo (($_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']*$_smarty_tpl->tpl_vars['towar']->value['vat'])/100)+$_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
		</tr>
		<?php echo $_smarty_tpl->tpl_vars['lp']->value++;?>

		<?php $_smarty_tpl->_assignInScope('wartoscnetto', $_smarty_tpl->tpl_vars['wartoscnetto']->value+$_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']);
?>
		<?php $_smarty_tpl->_assignInScope('wartoscvat', $_smarty_tpl->tpl_vars['wartoscvat']->value+$_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']*$_smarty_tpl->tpl_vars['towar']->value['vat']/100);
?>
		<?php $_smarty_tpl->_assignInScope('wartoscbrutto', $_smarty_tpl->tpl_vars['wartoscbrutto']->value+(($_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']*$_smarty_tpl->tpl_vars['towar']->value['vat'])/100)+$_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']);
?>
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
	<td></td>
	<td>Razem:</td>
	<td><?php echo $_smarty_tpl->tpl_vars['wartoscnetto']->value;?>
</td>
	<td></td>
	<td><?php echo $_smarty_tpl->tpl_vars['wartoscvat']->value;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['wartoscbrutto']->value;?>
</td>
	</tr>
<?php }?>
</table>
<h3>Sposób dostawy: <?php echo $_smarty_tpl->tpl_vars['towar']->value['SposobDostawy'];?>
</h3>
<h3>Do zapłaty: <?php echo $_smarty_tpl->tpl_vars['towar']->value['Wartosc'];?>
</h3>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
