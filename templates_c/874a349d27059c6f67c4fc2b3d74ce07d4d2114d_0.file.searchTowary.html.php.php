<?php
/* Smarty version 3.1.31, created on 2018-07-30 16:42:27
  from "C:\xampp\htdocs\PZ\templates\searchTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5f23d32694e2_14892891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '874a349d27059c6f67c4fc2b3d74ce07d4d2114d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\searchTowary.html.php',
      1 => 1511967610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5b5f23d32694e2_14892891 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<div class="row">
	<div class="col-md-3">
<div class="panel panel-primary">
<div class="panel-heading">Parametry</div>
<div class="panel-body">
	<form method="post">

		<div class="form-group">
			<label for="Nazwa">Nazwa:</label>
			<input class="form-control" type="text" id="towar" value="<?php echo $_smarty_tpl->tpl_vars['towar']->value;?>
" name="towar"/>
		</div>
		<div class="form-group">
			<label for="cenaMin">cena mininalna:</label>
			<input class="form-control" type="text" id="cenaMin" value="<?php echo $_smarty_tpl->tpl_vars['cenaMin']->value;?>
" name="cenaMin"/>
		</div>
		<div class="form-group">
			<label for="cenaMax">Cena maksymalna:</label>
			<input class="form-control" type="text" id="cenaMax" value="<?php echo $_smarty_tpl->tpl_vars['cenaMax']->value;?>
" name="cenaMax"/>
		</div>
		<div class="form-group">
			<label for="kodTowaru">Kod towaru</label>
			<input class="form-control" type="text" id="kodTowaru" value="<?php echo $_smarty_tpl->tpl_vars['kodTowaru']->value;?>
" name="kodTowaru"/>
		</div>
		<div class="form-group">
				<label for="WSprzedazy">W sprzedaży:</label>
				<div class="form-inline">
			<div class="checkbox">
					<label><input type="checkbox" name="sprzedawane" id="blankCheckbox" value="tru" <?php if ($_smarty_tpl->tpl_vars['sprzedawane']->value == "tru") {?>checked<?php }?>> tak</label>
			    <label><input type="checkbox" name="niesprzedawane" id="blankCheckbox" <?php if ($_smarty_tpl->tpl_vars['niesprzedawane']->value == "tru") {?>checked<?php }?> value="tru"> nie</label>
			</div>
		</div>
		</div>
		<input type="submit" value="Aktualizuj" class="btn btn-default" />

	</form>
</div>
</div>
</div>

<div class="col-md-9">
<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow']->value) && !empty($_smarty_tpl->tpl_vars['tablicaTowarow']->value)) {?>
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Kod Towaru</th><th>W sprzedaży</th><th>Akcja</th>
    </tr>
  </thead>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
  <tr>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/showone/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button"><strong><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</strong></a></td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
</td>
		<td><?php if ($_smarty_tpl->tpl_vars['towar']->value['Freeze'] == 1) {?> Nie <?php } else { ?> Tak <?php }?>  </td>
    <td>

			<div class="btn-group" role="group">
						<?php if ($_smarty_tpl->tpl_vars['towar']->value['Freeze'] == 1) {?><a type="button" class="btn btn-info" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/unfreeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wprowadź do sprzedaży</a><?php } else { ?><a type="button" class="btn btn-info" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/freeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wycofaj ze sprzedaży</a><?php }?>

					</div></td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</table>
</div>
<?php }
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
