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
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse" class="list-group-item">
										Cenniki dla poszczególnych towarów
									</a>
								</h4>

							<div id="collapseNieprzydzielone2" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Cennik/one" method="POST" class="form">

										<div class="form-group">
											<label for="Towar">Towar niemający cennika</label>
											<select name="Towar" class="form-control">
												{foreach $tablicaTowary as $towar}
													<option value="{$towar['IdTowar']}">{$towar['NazwaTowaru']}</option>
												{/foreach}
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
						{/if}

			</div>
		</div>





</div>



{include file="footer.html.php"}
