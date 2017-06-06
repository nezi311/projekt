<?php
/* Smarty version 3.1.31, created on 2017-06-06 14:51:52
  from "C:\xampp\htdocs\PZ\templates\indexCennik.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5936a56852db16_23266410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cad4444cb3d30acd8124a4645a2fe1de15abff8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\indexCennik.html.php',
      1 => 1496753333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5936a56852db16_23266410 (Smarty_Internal_Template $_smarty_tpl) {
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
										<label for="Opis">Opis</label>
										<input name="Opis" class="form-control" type="text" placeholder="Krótki opis cennika">
									</div>

									<div class="form-group">
										<label for="dataOd">Cennik od</label>
										<input name="dataOd" class="form-control" type="date" placeholder="data Od">
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
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseNieprzydzielone2" class="list-group-item">
										Cenniki dla poszczególnych towarów
									</a>
								</h4>

							<div id="collapseNieprzydzielone2" class="panel-collapse collapse">
								<div class="panel-body">
									<?php if (isset($_smarty_tpl->tpl_vars['kategorie']->value)) {?>
									<?php $_smarty_tpl->_assignInScope('j', true);
?>
									<ul class="nav nav-tabs">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategorie']->value, 'kat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kat']->value) {
?>
											<?php if ($_smarty_tpl->tpl_vars['j']->value == true) {?>
												<li class="active">
													<a data-toggle="tab" href="#cennikpoj<?php echo $_smarty_tpl->tpl_vars['kat']->value['IdKategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['kat']->value['NazwaKategorii'];?>
</a>
													<?php $_smarty_tpl->_assignInScope('j', false);
?>
												</li>
											<?php } else { ?>
												<li>
													<a data-toggle="tab" href="#cennikpoj<?php echo $_smarty_tpl->tpl_vars['kat']->value['IdKategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['kat']->value['NazwaKategorii'];?>
</a>
												</li>
											<?php }?>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</ul>
									<?php }?>

									<div class="tab-content">
										<?php if (isset($_smarty_tpl->tpl_vars['kategorie']->value)) {?>
											<?php $_smarty_tpl->_assignInScope('i', true);
?>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kategorie']->value, 'kat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kat']->value) {
?>
												<?php if ($_smarty_tpl->tpl_vars['i']->value == true) {?>
													<?php $_smarty_tpl->_assignInScope('i', false);
?>
													<div id="cennikpoj<?php echo $_smarty_tpl->tpl_vars['kat']->value['IdKategoria'];?>
" class="tab-pane fade in active">
												<?php } else { ?>
													<div id="cennikpoj<?php echo $_smarty_tpl->tpl_vars['kat']->value['IdKategoria'];?>
" class="tab-pane fade">
												<?php }?>
												<table class="table">
													<thead>
														<tr>
															<th>Towar</th>
															<th>Obecna Cena</th>
															<th>Cennik od</th>
															<th>Cennik do</th>
															<th>Opis</th>
															<th>Aktualny</th>
															<th>Nowy cennik</th>
															<th>Historia ceny</th>
														</tr>
													</thead>
													<tbody>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['towarAll']->value, 'all');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['all']->value) {
?>
													<?php if ($_smarty_tpl->tpl_vars['kat']->value['IdKategoria'] == $_smarty_tpl->tpl_vars['all']->value['IdKategoria']) {?>
														<tr>
															<td><?php echo $_smarty_tpl->tpl_vars['all']->value['NazwaTowaru'];?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['all']->value['cena'];?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['all']->value['dataOd'];?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['all']->value['dataDo'];?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['all']->value['opis'];?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['all']->value['aktualny'];?>
</td>
															<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalCennikNowy<?php echo $_smarty_tpl->tpl_vars['all']->value['idTowar'];?>
">Nowy</button></td>
															<td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cennik/historiaCeny/<?php echo $_smarty_tpl->tpl_vars['all']->value['idTowar'];?>
" class="btn btn-info">Historia</a></td>
														</tr>


														<div id="myModalCennikNowy<?php echo $_smarty_tpl->tpl_vars['all']->value['idTowar'];?>
" class="modal fade" role="dialog">
															<div class="modal-dialog">

																<!-- Modal content-->
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Nowy cennik dla towaru <strong><?php echo $_smarty_tpl->tpl_vars['all']->value['NazwaTowaru'];?>
</strong></h4>
																	</div>
																	<div class="modal-body">
																		<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cennik/insertNew" method="POST" class="form">

																			<div class="form-group" style="display:none;">
																				<label for="Towar">IdTowaru</label>
																				<input name="Towar" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['all']->value['idTowar'];?>
">
																			</div>

																			<div class="form-group" style="display:none;">
																				<label for="bylyCennik">IdTowaru</label>
																				<input name="bylyCennik" class="form-control" type="text" value="<?php echo $_smarty_tpl->tpl_vars['all']->value['idCennik'];?>
">
																			</div>

																			<div class="form-group">
																				<label for="Cena">Cena</label>
																				<input name="Cena" class="form-control" type="number" step="0.01" min="1">
																			</div>

																			<div class="form-group">
																				<label for="Opis">Opis</label>
																				<input name="Opis" class="form-control" type="text" placeholder="Krótki opis cennika">
																			</div>

																			<div class="form-group">
																				<label for="dataOd">Cennik od</label>
																				<input name="dataOd" class="form-control" type="date" placeholder="data Od">
																			</div>

																			<div class="form-group">
																					<span class="form-group-btn">
																					<button type="submit" class="btn btn-success"  >Dodaj</button>
																					</span>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													<?php }?>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

												</tbody>
											</table>
											</div>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

										<?php }?>
									</div>

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
