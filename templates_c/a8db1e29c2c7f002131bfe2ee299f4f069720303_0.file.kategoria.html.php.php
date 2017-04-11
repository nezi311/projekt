<?php
/* Smarty version 3.1.31, created on 2017-04-10 21:35:33
  from "C:\xampp\htdocs\pz\templates\kategoria.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ebde85b0c796_59829928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8db1e29c2c7f002131bfe2ee299f4f069720303' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pz\\templates\\kategoria.html.php',
      1 => 1491852897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ebde85b0c796_59829928 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
<div class="page-header">
<h1>Klienci - kategorie</h1>
</div>
<?php if (count($_smarty_tpl->tpl_vars['allKategorie']->value) === 0) {?>
	<div class="alert alert-danger" role="alert">Brak kategorii w bazie!</div>
<?php } else { ?>
<div class="row">
<div class="col-md-8">

		<table class="table table-hover">
				<thead>
					<tr>
					<th>Id</th><th>Nazwa</th><th>Akcja</th>
				</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allKategorie']->value, 'kategoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kategoria']->value) {
?>
					<tr>
						<th><?php echo $_smarty_tpl->tpl_vars['kategoria']->value['IdKategoria'];?>
</th>
						<td><?php echo $_smarty_tpl->tpl_vars['kategoria']->value['NazwaKategorii'];?>
</td>
						<td class="col-md-4">
							<div class="btn-group" role="group">

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['Id'];?>
">zmień nazwę</button>
						<a type="button" class="btn btn-danger" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
KategoriaKlientow/Usun/<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['IdKategoria'];?>
">usuń</a>
			            </div>

	<!-- Modal -->
	<div id="myModal<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['IdKategoria'];?>
" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Edycja</h4>
	      </div>
	      <div class="modal-body">

											<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
KategoriaKlientow/Edytuj/<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['IdKategoria'];?>
" method="post">
											    <div class="form-group">
											    <label for="name">Nazwa kategorii</label>
											    <input type="text" class="form-control" name="nazwa" value="<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['NazwaKategorii'];?>
" />
											    </div>
											    <input type="submit" value="Zmień nazwę" class="btn btn-primary" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
											</form>

	      </div>
	    </div>

	  </div>
	</div>

						</td>
					</tr>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</tbody>
			</table>
</div>
</div>
<?php }
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Dodaj nowy rodzaj
</button>
<div class="collapse" id="collapseExample">
  <div class="well">
		<form  action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
KategoriaKlientow/Wstaw/" method="post">
		    <div class="form-group">
		    <label for="name">Nazwa kategorii</label>
		    <input type="text" class="form-control" name="nazwa" placeholder="Wprowadź nazwę kategorii"/>
		    </div>
		    <input type="submit" value="Dodaj" class="btn btn-default" />
		</form>
  </div>
</div>
<br/><br/>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
