<?php
/* Smarty version 3.1.31, created on 2017-04-25 14:20:23
  from "/opt/lampp/htdocs/PZ/templates/statystyka.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ff3f07984e42_13406497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'feefb8f2c3a72d12028e6efe727621e2f8669cb6' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/statystyka.html.php',
      1 => 1493122785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ff3f07984e42_13406497 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
<div class="page-header">
	<h2>Statystyki sprzedaży</h2>
</div>

<div class="row">
	<div class="col-md-3">
<div class="panel panel-primary">
  <div class="panel-heading">Parametry</div>
  <div class="panel-body">
		<form method="post">
				<div class="form-group">
					<label for="kryterium">Kryterium</label>
					<select class="form-control" name="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<optgroup label="Towary">
						  <option value="towarIlosc" <?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "towarIlosc") {?>selected<?php }?>>Sprzedane towary (ilość)</option>
						  <option value="towarKasa" <?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "towarKasa") {?>selected<?php }?>>Sprzedane towary (dochód)</option>
						</optgroup>
						<optgroup label="Klienci">
				  		<option value="klientKasa" <?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "klientKasa") {?>selected<?php }?>>Najwięcej kupujący klienci</option>
						</optgroup>
					</select>
				</div>
					<div class="form-group">
				    <label for="sortowanie">Sortuj</label>
						<select class="form-control" name="sortowanie"> <!--Supplement an id here instead of using 'name'-->
					  <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['sortowanie']->value == "ASC") {?>selected<?php }?>>Rosnąco</option>
					  <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['sortowanie']->value == "DESC") {?>selected<?php }?>>Malejąco</option>
						</select>
					</div>
				<div class="form-group">
			    <label for="dataOd">Data od</label>
					<input class="form-control" type="date" id="dataOd" value=<?php echo $_smarty_tpl->tpl_vars['dataOd']->value;?>
 name="dataOd"/>
				</div>
			<div class="form-group">
				<label for="dataDo">Data do</label>
				<input class="form-control" type="date" id="dataDo" value=<?php echo $_smarty_tpl->tpl_vars['dataDo']->value;?>
 name="dataDo"/>
			</div>
			<input type="submit" value="Aktualizuj" class="btn btn-default" />
		</form>
	</div>
</div>
</div>
<div class="col-md-9">
<?php if (!isset($_smarty_tpl->tpl_vars['allStatystyki']->value)) {?>
	<div class="alert alert-danger" role="alert">Brak wyników</div>


<?php } else { ?>
<table class="table">
	<thead>
		<tr>
			<th>#</th><th><?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "klientKasa") {?>Klient<?php } else { ?>Nazwa Towaru<?php }?></th><th>Liczba</th>
		</tr>
	</thead>
	<tbody>
		<?php $_smarty_tpl->_assignInScope('val', 1);
?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allStatystyki']->value, 'statystyka');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['statystyka']->value) {
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['statystyka']->value['nazwa'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['statystyka']->value['wartosc'];?>
</td>
		</tr>
<?php $_smarty_tpl->_assignInScope('val', $_smarty_tpl->tpl_vars['val']->value+1);
?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</tbody>
</table>
<?php }?>
	</div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>

<?php }?>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
