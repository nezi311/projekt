<?php
/* Smarty version 3.1.31, created on 2017-12-20 16:47:37
  from "C:\xampp\htdocs\PZ\templates\faktura.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a3a8619174890_64266913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '597fb43e5f560fe63fe9d35813ac2826da4d8dac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\faktura.html.php',
      1 => 1497189284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a3a8619174890_64266913 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
	<?php $_smarty_tpl->_assignInScope('lp', 1);
?>
	<?php $_smarty_tpl->_assignInScope('vaty', array());
?>
	<?php $_smarty_tpl->_assignInScope('vatywartosci', array());
?>
	<?php $_smarty_tpl->_assignInScope('wartosci', array());
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
	<h3>Faktura VAT nr. <?php echo $_smarty_tpl->tpl_vars['klient']->value['NrFaktury'];?>
 z dnia <?php echo $_smarty_tpl->tpl_vars['klient']->value['DataWystawienia'];?>
</h3>
	<h3>Data wystawienia: <?php echo $_smarty_tpl->tpl_vars['klient']->value['DataWystawienia'];?>
</h3>
	<h3>Data sprzedaży: <?php echo $_smarty_tpl->tpl_vars['klient']->value['DataSprzedazy'];?>
</h3>
	<h3>Sposob zapłaty: <?php echo $_smarty_tpl->tpl_vars['klient']->value['SposobZaplaty'];?>
</h3>
	<h3>Termin zapłaty: <?php echo $_smarty_tpl->tpl_vars['klient']->value['TerminZaplaty'];?>
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

<table class="table sorttable" style=width:80%;>
	<thead>
		<tr>
			<th>Lp.</th>
			<th>Kod towaru</th>
			<th>Nazwa towaru</th>
			<th>Jednostka miary</th>
			<th>Ilość</th>
			<th style=text-align:right;>Cena netto</th>
			<th style=text-align:right;>Wartość netto</th>
			<th style=text-align:right;>Stawka VAT</th>
			<th style=text-align:right;>Wartość VAT</th>
			<th style=text-align:right;>Wartość brutto</th>
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
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
    <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['cena'],2,',',' ');?>
 PLN</td>
		<td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc'],2,',',' ');?>
 PLN</td>
		<td align="right"><?php echo $_smarty_tpl->tpl_vars['towar']->value['vat'];?>
%</td>
		<td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']*$_smarty_tpl->tpl_vars['towar']->value['vat']/100,2,',',' ');?>
 PLN</td>
		<td align="right"><?php echo number_format((($_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']*$_smarty_tpl->tpl_vars['towar']->value['vat'])/100)+$_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc'],2,',',' ');?>
 PLN</td>
		</tr>
		<?php $_smarty_tpl->_assignInScope('lp', $_smarty_tpl->tpl_vars['lp']->value+1);
?>
		<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['vaty']) ? $_smarty_tpl->tpl_vars['vaty']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['towar']->value['vat'];
$_smarty_tpl->_assignInScope('vaty', $_tmp_array);
?>
		<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['wartosci']) ? $_smarty_tpl->tpl_vars['wartosci']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['towar']->value['cena']*$_smarty_tpl->tpl_vars['towar']->value['ilosc']*$_smarty_tpl->tpl_vars['towar']->value['vat']/100;
$_smarty_tpl->_assignInScope('wartosci', $_tmp_array);
?>
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

	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? sizeof($_smarty_tpl->tpl_vars['vaty']->value)-1+1 - (0) : 0-(sizeof($_smarty_tpl->tpl_vars['vaty']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
		<?php if (array_key_exists($_smarty_tpl->tpl_vars['vaty']->value[$_smarty_tpl->tpl_vars['i']->value],$_smarty_tpl->tpl_vars['vatywartosci']->value)) {?>
		<?php $_smarty_tpl->_assignInScope('suma', $_smarty_tpl->tpl_vars['vatywartosci']->value[$_smarty_tpl->tpl_vars['vaty']->value[$_smarty_tpl->tpl_vars['i']->value]]);
?>
		<?php $_smarty_tpl->_assignInScope('suma', $_smarty_tpl->tpl_vars['suma']->value+$_smarty_tpl->tpl_vars['wartosci']->value[$_smarty_tpl->tpl_vars['i']->value]);
?>
		<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['vatywartosci']) ? $_smarty_tpl->tpl_vars['vatywartosci']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['vaty']->value[$_smarty_tpl->tpl_vars['i']->value]] = $_smarty_tpl->tpl_vars['suma']->value;
$_smarty_tpl->_assignInScope('vatywartosci', $_tmp_array);
?>
		<?php } else { ?>
		<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['vatywartosci']) ? $_smarty_tpl->tpl_vars['vatywartosci']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['vaty']->value[$_smarty_tpl->tpl_vars['i']->value]] = $_smarty_tpl->tpl_vars['wartosci']->value[$_smarty_tpl->tpl_vars['i']->value];
$_smarty_tpl->_assignInScope('vatywartosci', $_tmp_array);
?>
		<?php }?>
	<?php }
}
?>

	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td align="right"><b>Razem:</b></td>
	<td align="right"><b><?php echo number_format($_smarty_tpl->tpl_vars['wartoscnetto']->value,2,',',' ');?>
 PLN</b></td>
	<td></td>
	<td align="right"><b><?php echo number_format($_smarty_tpl->tpl_vars['wartoscvat']->value,2,',',' ');?>
 PLN</b></td>
	<td align="right"><b><?php echo number_format($_smarty_tpl->tpl_vars['wartoscbrutto']->value,2,',',' ');?>
 PLN</b></td>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vatywartosci']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
%</b></td>
	<td align="right"><b><?php echo number_format($_smarty_tpl->tpl_vars['value']->value,2,',',' ');?>
 PLN</b></td>
	<td></td>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>
</table>
<h3>Sposób dostawy: <?php echo $_smarty_tpl->tpl_vars['towar']->value['SposobDostawy'];?>
</h3>
<h3>Do zapłaty: <?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['Wartosc'],2,',',' ');?>
 PLN</h3>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
