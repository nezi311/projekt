<?php
/* Smarty version 3.1.31, created on 2017-04-25 16:20:13
  from "C:\xampp\htdocs\PZ\templates\koszykTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ff5b1db9e9d3_64726686',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e279aede6bdbad4b4a5004f4dc687417c133c30' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\koszykTowary.html.php',
      1 => 1493129740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ff5b1db9e9d3_64726686 (Smarty_Internal_Template $_smarty_tpl) {
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

<?php }?>
</table>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk/zrealizuj" method="post">
	<input type='hidden' name='suma' value=<?php echo $_smarty_tpl->tpl_vars['suma']->value;?>
>
	<input type='submit' name='submit' value=Zamów>
</form>
Suma: <?php echo $_smarty_tpl->tpl_vars['suma']->value;?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
