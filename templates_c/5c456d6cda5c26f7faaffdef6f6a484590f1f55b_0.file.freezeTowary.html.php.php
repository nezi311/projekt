<?php
/* Smarty version 3.1.31, created on 2017-05-09 17:28:19
  from "/opt/lampp/htdocs/PZ/templates/freezeTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5911e01395b371_35902276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c456d6cda5c26f7faaffdef6f6a484590f1f55b' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/freezeTowary.html.php',
      1 => 1494276334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5911e01395b371_35902276 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table">
  <thead>
    <tr>
			<th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Cena</th><th>Edytuj</th><th>Odmroz</th><th>Kup</th><th>usun</th>
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
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Kategoria'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['JednostkaMiary'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Cena'];?>
</td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/edit/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Edytuj</a></td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/unfreeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Odmroź</a></td>
		<td>
		<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/koszyk/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" method="post">
			<input type='hidden' name='IdTowar' value=<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
>

			<input type='submit' value='Dodaj'>

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
		</td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/delete/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Usuń</a></td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

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
