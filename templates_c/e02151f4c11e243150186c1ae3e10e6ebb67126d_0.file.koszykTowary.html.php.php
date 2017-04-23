<?php
/* Smarty version 3.1.31, created on 2017-04-23 22:15:10
  from "E:\xampp\htdocs\PZ\templates\koszykTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58fd0b4ed280b3_84630977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e02151f4c11e243150186c1ae3e10e6ebb67126d' => 
    array (
      0 => 'E:\\xampp\\htdocs\\PZ\\templates\\koszykTowary.html.php',
      1 => 1492978389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58fd0b4ed280b3_84630977 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--kontroler wKoszyku w TOWAR-->
<div class="page-header">
	<h2>Towary w koszyku</h2>
</div>
<?php $_smarty_tpl->_assignInScope('suma', 0);
?>
<table class="table" style='width:50%;'>
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Kod Towaru</th><th>Cena</th><th>Stawka Vat</th><th>Ilość</th><th>Cena częściowa</th><th>Usuń</th>
    </tr>
  </thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow2']->value)) {?>
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
		<td><?php echo ($_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['StawkaVat'])/100*$_smarty_tpl->tpl_vars['towar']->value['ilosc'];?>
</td>
		<?php $_smarty_tpl->_assignInScope('suma', $_smarty_tpl->tpl_vars['suma']->value+(($_smarty_tpl->tpl_vars['towar']->value['Cena']*$_smarty_tpl->tpl_vars['towar']->value['StawkaVat'])/100*$_smarty_tpl->tpl_vars['towar']->value['ilosc']));
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

<?php }?>
</table>
Suma: <?php echo $_smarty_tpl->tpl_vars['suma']->value;?>

<?php if (isset($_smarty_tpl->tpl_vars['_COOKIE']->value['ids'])) {
$_smarty_tpl->_assignInScope('cookie', $_smarty_tpl->tpl_vars['_COOKIE']->value['ids']);
$_smarty_tpl->_assignInScope('cookie', stripslashes($_smarty_tpl->tpl_vars['cookie']->value));
$_smarty_tpl->_assignInScope('dana', json_decode($_smarty_tpl->tpl_vars['cookie']->value,true));
$_smarty_tpl->_assignInScope('cookie', $_smarty_tpl->tpl_vars['_COOKIE']->value['ilosci']);
$_smarty_tpl->_assignInScope('cookie', stripslashes($_smarty_tpl->tpl_vars['cookie']->value));
$_smarty_tpl->_assignInScope('dana', json_decode($_smarty_tpl->tpl_vars['cookie']->value,true));
}
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
