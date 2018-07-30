<?php
/* Smarty version 3.1.31, created on 2018-07-30 16:41:05
  from "C:\xampp\htdocs\PZ\templates\listaZamowien.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5f2381456518_63162884',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52b31e16167919f8674d2cd9f8c22c4ec1a4da49' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\listaZamowien.html.php',
      1 => 1514826939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
  ),
),false)) {
function content_5b5f2381456518_63162884 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-header">
	<h2>Lista Zamówień</h2>
</div>
<?php $_smarty_tpl->_assignInScope('data', "null");
$_smarty_tpl->_assignInScope('klient', "null");
?>
<div class="container">
<table>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>

<!--<?php echo d($_smarty_tpl->tpl_vars['tablicaZamowien']->value);?>
-->
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaZamowien']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value != $_smarty_tpl->tpl_vars['towar']->value['DataZamowienia'] || $_smarty_tpl->tpl_vars['klient']->value != $_smarty_tpl->tpl_vars['towar']->value['IdKlient']) {?>
		<?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['towar']->value['DataZamowienia']);
?>
		<?php $_smarty_tpl->_assignInScope('klient', $_smarty_tpl->tpl_vars['towar']->value['IdKlient']);
?>

	</table>
	</div>
	<h4>Data Zamówienia: <?php echo $_smarty_tpl->tpl_vars['towar']->value['DataZamowienia'];?>
</h4>
	<h4>Klient: <?php echo $_smarty_tpl->tpl_vars['towar']->value['Nazwisko'];?>
 <?php echo $_smarty_tpl->tpl_vars['towar']->value['Imie'];?>
</h4>
	<h4>Wartość Zamówienia: <?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['Wartosc'],2,',',' ');?>
 PLN</h4>
	<table>
	<tr>
	<td style="padding:5px;">
	<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdZamowienieSprzedaz'];?>
" aria-expanded="false" aria-controls="collapseExample">
	  Szczegóły
	</button>
	</td>	

	<?php if ($_smarty_tpl->tpl_vars['towar']->value['TerminZaplaty'] == NULL) {?>
	<form action='Zamowienia/anuluj/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdZamowienieSprzedaz'];?>
'>
	<td style="padding:5px;">
		<input type="submit" class="btn btn-info" value="Anuluj zamówienie">
		</td>
	</form>
	<?php }?>
	</tr>
	</table>
	<div class="collapse" id="<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdZamowienieSprzedaz'];?>
">
	<?php if ($_smarty_tpl->tpl_vars['towar']->value['TerminZaplaty'] == NULL) {?>
	<form id='datyFaktura' action='Zamowienia/faktura/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdZamowienieSprzedaz'];?>
' method='post' style=width:10%;>
		<div class="form-group">
			<label for="dataOd">Data sprzedaży</label>
			<input class="form-control" type="date" id="dataSprzedazy" name="dataSprzedazy"/>
		</div>

		<div class="form-group">
			<label for="dataOd">Termin zapłaty</label>
			<input class="form-control" type="date" id="dataZaplaty" name="dataZaplaty"/>
		</div>

	<div id="messages"></div>
		<input type="submit" class="btn btn-primary" value="Generuj fakturę">
	</form>
	<?php } else { ?>
	<form id='datyFaktura' action='Zamowienia/faktura/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdZamowienieSprzedaz'];?>
' method='post' style=width:10%;>
		<input class="form-control" type="hidden" id="dataSprzedazy" name="dataSprzedazy" value='NULL'/>
		<input class="form-control" type="hidden" id="dataZaplaty" name="dataZaplaty" value='NULL'/>
		<input type="submit" class="btn btn-primary" value="Pokaż fakturę">
	</form>
<?php }?>
		<table class="table sorttable" style=width:30%;>
		  <thead>
		    <tr>
		      <th>Towar</th><th style=text-align:center;>Ilość</th><th style=text-align:right;>Cena</th><th style=text-align:right;>Vat</th>
		    </tr>
		  </thead>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
    <td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['cena'],2,',',' ');?>
 PLN</td>
		<td align="right"><?php echo $_smarty_tpl->tpl_vars['towar']->value['vat'];?>
%</td>
		</tr>

		<?php } else { ?>

		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
		<td align="right"><?php echo number_format($_smarty_tpl->tpl_vars['towar']->value['cena'],2,',',' ');?>
 PLN</td>
		<td align="right"><?php echo $_smarty_tpl->tpl_vars['towar']->value['vat'];?>
%</td>
		</tr>
		<?php }?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</div>
	<?php } else { ?>
	<h2>Brak zamówień do wyświetlenia.</h2>
<?php }
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }
}
}
