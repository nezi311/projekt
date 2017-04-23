<?php
/* Smarty version 3.1.31, created on 2017-04-23 22:08:59
  from "C:\xampp\htdocs\PZ\templates\statystyka.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58fd09dbb7c3f1_86634986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a829237944ea011944f8cea47e2ddba33a6dcd70' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\statystyka.html.php',
      1 => 1492977942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58fd09dbb7c3f1_86634986 (Smarty_Internal_Template $_smarty_tpl) {
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
		<form class= method="post">
				<div class="form-group">
					<label for="kryterium">Kryterium</label>
					<select class="form-control" name="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<optgroup label="Towary">
						  <option value="towarIlosc">Sprzedane towary (ilość)</option>
						  <option value="towarKasa">Sprzedane towary (dochód)</option>
						</optgroup>
						<optgroup label="Klienci">
				  		<option value="klientIlosc">Najwięcej kupujący klienci</option>
						</optgroup>
					</select>
				</div>
					<div class="form-group">
				    <label for="sortowanie">Sortuj</label>
						<select class="form-control" name="sortowanie"> <!--Supplement an id here instead of using 'name'-->
					  <option value="ASC">Rosnąco</option>
					  <option value="DESC">Malejąco</option>
						</select>
					</div>
				<div class="form-group">
			    <label for="dataOd">Data od</label>
					<input class="form-control" type="date" id="dataOd" value="2017-01-01" name="dataOd"/>
				</div>
			<div class="form-group">
				<label for="dataDo">Data do</label>
				<input class="form-control" type="date" id="dataDo" value="2017-04-18" name="dataDo"/>
			</div>
			<input type="submit" value="Dodaj" class="btn btn-default" />
		</form>
	</div>
</div>
</div>
<div class="col-md-9">
<?php if (!isset($_smarty_tpl->tpl_vars['allStatystyki']->value) || count($_smarty_tpl->tpl_vars['allStatystyki']->value) === 0) {?>
	<div class="alert alert-danger" role="alert">Brak wyników</div>


<?php } else { ?>
<table>
	<thead>
		<tr>
			<th>#</th><th>Kryterium</th><th>Wartość</th>
		</tr>
	</thead>
	<tbody>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allStatystyki']->value, 'statystyka');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['statystyka']->value) {
?>
		<tr>
			<td></td>
			<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['kryterium'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['wartosc'];?>
</td>
		</tr>
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
