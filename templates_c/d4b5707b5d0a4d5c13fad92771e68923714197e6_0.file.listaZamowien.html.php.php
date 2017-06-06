<?php
/* Smarty version 3.1.31, created on 2017-05-23 15:23:25
  from "/opt/lampp/htdocs/PZ/templates/listaZamowien.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_592437cdd8dfd2_93343569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4b5707b5d0a4d5c13fad92771e68923714197e6' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/listaZamowien.html.php',
      1 => 1495542735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_592437cdd8dfd2_93343569 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Zamówień</h2>
</div>
<?php $_smarty_tpl->_assignInScope('data', "null");
$_smarty_tpl->_assignInScope('klient', "null");
?>
<table>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
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
	<h4>Data Zamówienia: <?php echo $_smarty_tpl->tpl_vars['towar']->value['DataZamowienia'];?>
</h4>
	<h4>Klient: <?php echo $_smarty_tpl->tpl_vars['towar']->value['Nazwisko'];?>
 <?php echo $_smarty_tpl->tpl_vars['towar']->value['Imie'];?>
</h4>
	<h4>Wartość Zamówienia: <?php echo $_smarty_tpl->tpl_vars['towar']->value['Wartosc'];?>
</h4>
	<a type="button" class="btn btn-primary" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienia/faktura/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdZamowienieSprzedaz'];?>
" >Generuj Fakturę</a>
		<table class="table sorttable" style=width:50%;>
		  <thead>
		    <tr>
		      <th>Towar</th><th>Ilość</th><th>Cena</th><th>Vat</th>
		    </tr>
		  </thead>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['cena'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['vat'];?>
%</td>
		</tr>

		<?php } else { ?>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['cena'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['vat'];?>
%</td>
		</tr>
		<?php }?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	<?php } else { ?>
	<h2>Brak zamówień do wyświetlenia.</h2>
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
