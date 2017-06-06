<?php
/* Smarty version 3.1.31, created on 2017-05-23 18:20:09
  from "/opt/lampp/htdocs/PZ/templates/indexCennik.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_592461393420c6_87910121',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11b016dce5e0d486d41b9e081a169e0899d1e5aa' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/indexCennik.html.php',
      1 => 1495556292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_592461393420c6_87910121 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Cennik dla towarów</h2>
</div>
<div class="container">
	<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
	<div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
	<?php }?>


	  <div class="panel-group" id="accordion">
			<div class="panel panel-default">
					<?php if (isset($_smarty_tpl->tpl_vars['liczbaTowarow']->value)) {?>
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseNieprzydzielone" class="list-group-item">
									Towary nie posiadające cennika <span class="badge">	<?php echo $_smarty_tpl->tpl_vars['liczbaTowarow']->value;?>
 </span>
								</a>
							</h4>

						<div id="collapseNieprzydzielone" class="panel-collapse collapse">
							<div class="panel-body">
								<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cennik/insert" method="POST" class="form">

									<div class="form-group">
										<label for="Towar">Towar niemający cennika</label>
										<select name="Towar" class="form-control">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowary']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
"><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

										</select>
									</div>

									<div class="form-group">
										<label for="Cena">Cena</label>
										<input name="Cena" class="form-control" type="number" step="0.01" min="1">
									</div>

									<div class="form-group">
										<label for="Opis">Cena</label>
										<input name="Opis" class="form-control" type="text" placeholder="Krótki opis cennika">
									</div>

									<div class="form-group">
											<span class="form-group-btn">
											<button type="submit" class="btn btn-success"  >Dodaj</button>
											</span>
									</div>
								</form>
							</div>
						</div>
					<?php }?>
		</div>
				<div class="panel panel-default">
						<?php if (isset($_smarty_tpl->tpl_vars['liczbaTowarow']->value)) {?>
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse" class="list-group-item">
										Cenniki dla poszczególnych towarów
									</a>
								</h4>

							<div id="collapseNieprzydzielone2" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cennik/one" method="POST" class="form">

										<div class="form-group">
											<label for="Towar">Towar niemający cennika</label>
											<select name="Towar" class="form-control">
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowary']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
"><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

											</select>
										</div>

										<div class="form-group">
												<span class="form-group-btn">
												<button type="submit" class="btn btn-success"  >Dodaj</button>
												</span>
										</div>
									</form>
								</div>
							</div>
						<?php }?>

			</div>
		</div>





</div>



<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
