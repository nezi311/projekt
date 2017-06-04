{include file="header.html.php"}

<div class="page-header">
	<h2>Cennik dla towarów</h2>
</div>
<div class="container">
	{if isset($error)}
	<div class="alert alert-danger" role="alert">{$error}</div>
	{/if}


	  <div class="panel-group" id="accordion">
			<div class="panel panel-default">
					{if isset($liczbaTowarow)}
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseNieprzydzielone" class="list-group-item">
									Towary nie posiadające cennika <span class="badge">	{$liczbaTowarow} </span>
								</a>
							</h4>

						<div id="collapseNieprzydzielone" class="panel-collapse collapse">
							<div class="panel-body">
								<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Cennik/insert" method="POST" class="form">

									<div class="form-group">
										<label for="Towar">Towar niemający cennika</label>
										<select name="Towar" class="form-control">
											{foreach $tablicaTowary as $towar}
												<option value="{$towar['IdTowar']}">{$towar['NazwaTowaru']}</option>
											{/foreach}
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
										<label for="dataOd">Cennik od</label>
										<input name="dataOd" class="form-control" type="date" placeholder="data Od">
									</div>

									<div class="form-group">
										<label for="dataDo">Cennik do</label>
										<input name="dataDo" class="form-control" type="date" placeholder="data Do">
									</div>

									<div class="form-group">
											<span class="form-group-btn">
											<button type="submit" class="btn btn-success"  >Dodaj</button>
											</span>
									</div>
								</form>
							</div>
						</div>
					{/if}
		</div>
				<div class="panel panel-default">
						{if isset($liczbaTowarow)}
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseNieprzydzielone2" class="list-group-item">
										Cenniki dla poszczególnych towarów
									</a>
								</h4>

							<div id="collapseNieprzydzielone2" class="panel-collapse collapse">
								<div class="panel-body">
									{if isset($kategorie)}
									{$j=true}
									<ul class="nav nav-tabs">
										{foreach $kategorie as $kat}
											{if $j==true}
												<li class="active">
													<a data-toggle="tab" href="#cennikpoj{$kat['IdKategoria']}">{$kat['NazwaKategorii']}</a>
													{$j=false}
												</li>
											{else}
												<li>
													<a data-toggle="tab" href="#cennikpoj{$kat['IdKategoria']}">{$kat['NazwaKategorii']}</a>
												</li>
											{/if}
										{/foreach}
									</ul>
									{/if}

									<div class="tab-content">
										{if isset($kategorie)}
											{$i=true}
											{foreach $kategorie as $kat}
												{if $i==true}
													{$i=false}
													<div id="cennikpoj{$kat['IdKategoria']}" class="tab-pane fade in active">
												{else}
													<div id="cennikpoj{$kat['IdKategoria']}" class="tab-pane fade">
												{/if}
												<table class="table">
													<thead>
														<tr>
															<td>Towar</td>
															<td>Obecna Cena</td>
															<td>Cennik od</td>
															<td>Cennik do</td>
															<td>Opis</td>
															<td>Nowy cennik</td>
															<td>Historia ceny</td>
														</tr>
													</thead>
													<tbody>
												{foreach $towarAll as $all}
													{if $kat['IdKategoria'] == $all['IdKategoria']}
														<tr>
															<td>{$all['NazwaTowaru']}</td>
															<td>{$all['cena']}</td>
															<td>{$all['dataOd']}</td>
															<td>{$all['dataDo']}</td>
															<td>{$all['opis']}</td>
															<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalCennikNowy{$all['idTowar']}">Nowy</button></td>
															<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalCennikHistoria{$all['idTowar']}">Historia</button></td>
														</tr>
														<div id="myModalCennikNowy{$all['idTowar']}" class="modal fade" role="dialog">
															<div class="modal-dialog">

																<!-- Modal content-->
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Nowy cennik dla towaru <strong>{$all['NazwaTowaru']}</strong></h4>
																	</div>
																	<div class="modal-body">
																		<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Cennik/insertNew" method="POST" class="form">

																			<div class="form-group" style="display:none;">
																				<label for="Towar">IdTowaru</label>
																				<input name="Towar" class="form-control" type="text" value="{$all['idTowar']}">
																			</div>

																			<div class="form-group" style="display:none;">
																				<label for="bylyCennik">IdTowaru</label>
																				<input name="bylyCennik" class="form-control" type="text" value="{$all['idCennik']}">
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
																				<label for="dataOd">Cennik od</label>
																				<input name="dataOd" class="form-control" type="date" placeholder="data Od">
																			</div>

																			<div class="form-group">
																				<label for="dataDo">Cennik do</label>
																				<input name="dataDo" class="form-control" type="date" placeholder="data Do">
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
													{/if}
												{/foreach}
												</tbody>
											</table>
												</div>
											{/foreach}
										{/if}
									</div>




								</div>
							</div>
						{/if}

			</div>
		</div>





</div>



{include file="footer.html.php"}
