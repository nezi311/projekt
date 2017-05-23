<?php
<<<<<<< HEAD:templates_c/feefb8f2c3a72d12028e6efe727621e2f8669cb6_0.file.statystyka.html.php.php
/* Smarty version 3.1.31, created on 2017-05-09 17:33:58
  from "/opt/lampp/htdocs/PZ/templates/statystyka.html.php" */
=======
/* Smarty version 3.1.31, created on 2017-05-21 18:50:48
  from "C:\xampp\htdocs\PZ\templates\statystyka.html.php" */
>>>>>>> 691579922049732153447c5491c7c4057bdb9a48:templates_c/a829237944ea011944f8cea47e2ddba33a6dcd70_0.file.statystyka.html.php.php

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD:templates_c/feefb8f2c3a72d12028e6efe727621e2f8669cb6_0.file.statystyka.html.php.php
  'unifunc' => 'content_5911e1665ef734_35216340',
=======
  'unifunc' => 'content_5921c5685fd1c1_49825722',
>>>>>>> 691579922049732153447c5491c7c4057bdb9a48:templates_c/a829237944ea011944f8cea47e2ddba33a6dcd70_0.file.statystyka.html.php.php
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a829237944ea011944f8cea47e2ddba33a6dcd70' => 
    array (
<<<<<<< HEAD:templates_c/feefb8f2c3a72d12028e6efe727621e2f8669cb6_0.file.statystyka.html.php.php
      0 => '/opt/lampp/htdocs/PZ/templates/statystyka.html.php',
      1 => 1494276334,
=======
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\statystyka.html.php',
      1 => 1493240468,
>>>>>>> 691579922049732153447c5491c7c4057bdb9a48:templates_c/a829237944ea011944f8cea47e2ddba33a6dcd70_0.file.statystyka.html.php.php
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
<<<<<<< HEAD:templates_c/feefb8f2c3a72d12028e6efe727621e2f8669cb6_0.file.statystyka.html.php.php
function content_5911e1665ef734_35216340 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5921c5685fd1c1_49825722 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> 691579922049732153447c5491c7c4057bdb9a48:templates_c/a829237944ea011944f8cea47e2ddba33a6dcd70_0.file.statystyka.html.php.php
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
<div class="page-header">
	<h2>Zestawienia sprzedaży</h2>
</div>

<div class="row">
	<div class="col-md-3">
<div class="panel panel-primary">
  <div class="panel-heading">Parametry</div>
  <div class="panel-body">
		<form method="post">
				<div class="form-group">
					<label for="kryterium">Kryterium</label>
					<select class="form-control" class="target" name="kryterium" id="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<optgroup label="Towary">
						  <option value="towarIlosc" <?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "towarIlosc") {?>selected<?php }?>>Sprzedane towary (ilość)</option>
						  <option value="towarKasa" <?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "towarKasa") {?>selected<?php }?>>Sprzedane towary (wartość)</option>
						</optgroup>
						<optgroup label="Klienci">
				  		<option value="klientKasa" <?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "klientKasa") {?>selected<?php }?>>Najwięcej kupujący klienci</option>
						</optgroup>
					</select>
				</div>
				<div class="form-group">
			    <label for="fraza">Fraza</label>
					<input class="form-control" type="text" id="fraza" value="<?php echo $_smarty_tpl->tpl_vars['fraza']->value;?>
" name="fraza"/>
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
			<?php if (isset($_smarty_tpl->tpl_vars['allKategorie']->value)) {?>
			<div class="form-group" div id="kat">
						<label for="kategoria">Kategoria</label>
						<select class="form-control" name="kategoria" id="kryterium"> <!--Supplement an id here instead of using 'name'-->
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['kat']->value == 0) {?>selected<?php }?>>Wszystkie kategorie</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allKategorie']->value, 'kategoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kategoria']->value) {
?>
							  <option value=<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['IdKategoria'];?>
 <?php if ($_smarty_tpl->tpl_vars['kat']->value == $_smarty_tpl->tpl_vars['kategoria']->value['IdKategoria']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['kategoria']->value['NazwaKategorii'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

						</select>
			</div>
			<?php }?>
			<input type="submit" value="Aktualizuj" class="btn btn-default" />
		</form>
	</div>
</div>
</div>
<div class="col-md-9">
<?php if (!isset($_smarty_tpl->tpl_vars['allStatystyki']->value)) {?>
	<div class="alert alert-danger" role="alert">Brak wyników</div>

<?php } else { ?>
<table class="table sortable">
	<thead>
		<tr>
			<th class=sorttable_nosort>#</th><th><?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "klientKasa") {?>Klient<?php } else { ?>Nazwa Towaru<?php }?></th><th><?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "towarIlosc" || $_smarty_tpl->tpl_vars['kryterium']->value == "towarKasa") {?>Kategoria<?php } elseif ($_smarty_tpl->tpl_vars['kryterium']->value == "klientKasa") {?>Poczta<?php }?></th><th><?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "klientKasa" || $_smarty_tpl->tpl_vars['kryterium']->value == "towarKasa") {?>Wartość<?php } else { ?>Ilość<?php }?></th>
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
			<td><?php if ($_smarty_tpl->tpl_vars['kryterium']->value == "towarIlosc" || $_smarty_tpl->tpl_vars['kryterium']->value == "towarKasa") {
echo $_smarty_tpl->tpl_vars['statystyka']->value['kategoria'];
} elseif ($_smarty_tpl->tpl_vars['kryterium']->value == "klientKasa") {
echo $_smarty_tpl->tpl_vars['statystyka']->value['adres'];
}?></td>
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
