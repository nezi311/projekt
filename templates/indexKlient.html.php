{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Klientów</h2>
</div>


<div class="container">
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->

{if (isset($error) and $error!="")}
<div class="alert alert-danger" role="alert">
	{$error}
</div>
{/if}

<div id="mojaGrupa">
<!-- formularz dodawania nowej kategorii -->

			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#btnDodajKlienta" data-parent="#mojaGrupa" aria-expanded="false" aria-controls="btnDodajKlienta">
			  Dodaj nowego klienta
			</button>

			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#btnSzukajKlienta" data-parent="#mojaGrupa" aria-expanded="false" aria-controls="btnSzukajKlienta">
			  Szukaj klienta
			</button>

			<a href="http://{$smarty.server.HTTP_HOST}{$subdir}Klient" class="btn btn-info">Cała lista</a>


<div class="accordion-group">
			<div class="collapse" id="btnSzukajKlienta">
				<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/szukaj" method="POST">
				<div class="form-group">
				    <label for="fraza1">Podaj imię:</label>
				    <input
				           type="text"
				           class="form-control"
				           placeholder="Imie"
									 id="fraza1"
									 name="fraza1">
				</div>
				<div class="form-group">
						<label for="fraza2">Podaj nazwisko:</label>
						<input
									 type="text"
									 class="form-control"
									 placeholder="Nazwisko"
									 id="fraza2"
									 name="fraza2">
				</div>
				<div class="form-group">
						<label for="fraza3">Podaj NIP:</label>
						<input
									 type="text"
									 class="form-control"
									 placeholder="NIP"
									 id="fraza3"
									 name="fraza3">
				</div>
				<div class="form-group">
						<label for="fraza4">Podaj miasto:</label>
						<input
									 type="text"
									 class="form-control"
									 placeholder="Miasto"
									 id="fraza4"
									 name="fraza4">
				</div>
				<div class="form-group">
						<label for="fraza5">Podaj frazę:</label>
						<input
									 type="text"
									 class="form-control"
									 placeholder="Nazwa firmy"
									 id="fraza5"
									 name="fraza5">
				</div>
				<div class="form-group">
						<span class="form-group-btn">
						<button type="submit" class="btn btn-success"  >Szukaj</button>
						</span>
				</div>
			</form>
			</div>




			<div class="collapse" id="btnDodajKlienta">
				<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/insert" method="POST">
				<div class="form-group">
				    <label for="imie">Imie:</label>
				    <input
				           type="text"
				           class="form-control"
				           placeholder="Imie"
									 id="imie"
									 name="imie"
				           required>
				</div>

				  <div class="form-group">
				    <label for="nazwisko">Nazwisko:</label>
						<input
				           type="text"
				           class="form-control"
				           placeholder="Nazwisko"
									 id="nazwisko"
									 name="nazwisko"
				           required>
				 </div>

				<div class="form-group">
				 <label for="NIP">NIP:</label>
				 <input
								 type="number"
								 class="form-control"
								 placeholder="NIP"
								 id="NIP"
								 name="NIP"
				         required>
				 </div>



				<div class="form-group">
				 <label for="Miasto">Miasto:</label>
				 <input
								 type="text"
								 class="form-control"
								 placeholder="Miasto"
								 id="Miasto"
								 name="Miasto"
								 required>
				</div>

				<div class="form-group">
				 <label for="Ulica">Ulica:</label>
				 <input
								 type="text"
								 class="form-control"
								 placeholder="Ulica"
								 id="Ulica"
								 name="Ulica"
								 required>
				</div>

				<div class="form-group">
				 <label for="Dom">Nr domu:</label>
				 <input
								 type="number"
								 class="form-control"
								 placeholder="Nr domu"
								 id="Dom"
								 name="Dom"
								 required>
				</div>

				<div class="form-group">
				 <label for="Lokal">Nr lokalu:</label>
				 <input
								 type="number"
								 class="form-control"
								 placeholder="Nr lokalu"
								 name="Lokal"
								 id="Lokal">
				</div>

				<div class="form-group">
				 <label for="KodPocztowy">Kod Pocztowy:</label>
				 <input
								 type="text"

								 class="form-control"
								 placeholder="62-800"
								 name="KodPocztowy"
								 id="KodPocztowy"
								 required>
				</div>
				<div class="form-group">
				 <label for="Poczta">Poczta:</label>
				 <input
								 type="text"
								 class="form-control"
								 placeholder="Poczta"
								 name="Poczta"
								 id="Poczta"
								 required>
				</div>
				<div class="form-group">
				 <label for="Email">Email:</label>
				 <input
								 type="text"
								 class="form-control"
								 placeholder="firma@firma.com"
								 name="Email"
								 id="Email"
								 required>
				</div>
				<div class="form-group">
					<label for="NazwaFirmy">Nazwa firmy:</label>
					<input
									type="text"
									class="form-control"
									placeholder="nazwa firmy"
									name="NazwaFirmy"
									id="NazwaFirmy">
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

<!-- tabela z kategoriami -->
<!-- dyrektywa ng-init inicjalizuje tabele -->
<br>
<div class="container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">

			{if isset($tablicaKlienci)}
				{foreach $tablicaKlienci as $klient}

			      <div class="panel-heading">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{$klient['IdKlient']}">
									<strong>{$klient['Imie']}&nbsp;{$klient['Nazwisko']}&nbsp;</strong><italic>[{$klient['NazwaFirmy']}]</italic>
								</a>
			        </h4>
			      </div>
			      <div id="collapse{$klient['IdKlient']}" class="panel-collapse collapse">
			        <div class="panel-body">
								<ul class="list-group">
								  <li class="list-group-item">Kod pocztowy : {$klient['KodPocztowy']}</li>
								  <li class="list-group-item">Miasto : {$klient['Miasto']}</li>
								  <li class="list-group-item">Adres zamieszkania :
										{$klient['KodPocztowy']}&nbsp;{$klient['Miasto']}&nbsp;ul.{$klient['Ulica']}&nbsp;{$klient['Dom']}
										{if $klient['Lokal']!=null || $klient['Lokal']!=""}
											/{$klient['Lokal']}
										{/if}
									</li>
									<li class="list-group-item">Poczta : {$klient['Poczta']}</li>
									<li class="list-group-item">Email : {$klient['EMail']}</li>
									<li class="list-group-item">Nazwa firmy : {$klient['NazwaFirmy']}</li>
									<li class="list-group-item">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{$klient['IdKlient']}">Edytuj</button>
										</div>

										<div id="myModal{$klient['IdKlient']}" class="modal fade" role="dialog">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Edycja</h4>
													</div>
													<div class="modal-body">
														<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/update" method="POST" method="POST">
															<div class="form-group">

																<div class="form-group" style="display:none;">
																		<label for="id">Id:</label>
																		<input
																					 type="text"
																					 class="form-control"
																					 placeholder="Imie"
																					 id="id"
																					 name="id"
																					 required
																					 readonly="readonly"
																					 value="{$klient['IdKlient']}"
																					 >
																</div>
																<div class="form-group">
																		<label for="imie">Imie:</label>
																		<input
																					 type="text"
																					 class="form-control"
																					 placeholder="Imie"
																					 id="imie"
																					 name="imie"
																					 value="{$klient['Imie']}"
																					 required>
																</div>

																	 <div class="form-group">
																			<label for="nazwisko">Nazwisko:</label>
																			<input
																						 type="text"
																						 class="form-control"
																						 placeholder="Nazwisko"
																						 id="nazwisko"
																						 name="nazwisko"
																						 value="{$klient['Nazwisko']}"
																						 required>
																	 </div>

																	<div class="form-group">
																	 <label for="NIP">NIP:</label>
																	 <input
																					 type="number"
																					 class="form-control"
																					 placeholder="NIP"
																					 id="NIP"
																					 name="NIP"
																					 value="{$klient['NIP']}"
																						required>
																	 </div>



																	<div class="form-group">
																	 <label for="Miasto">Miasto:</label>
																	 <input
																					 type="text"
																					 class="form-control"
																					 placeholder="Miasto"
																					 id="Miasto"
																					 name="Miasto"
																					 value="{$klient['Miasto']}"
																					 required>
																	</div>

																	<div class="form-group">
																	 <label for="Ulica">Ulica:</label>
																	 <input
																					 type="text"
																					 class="form-control"
																					 placeholder="Ulica"
																					 id="Ulica"
																					 name="Ulica"
																					 value="{$klient['Ulica']}"
																					 required>
																	</div>

																	<div class="form-group">
																	 <label for="Dom">Nr domu:</label>
																	 <input
																					 type="number"
																					 class="form-control"
																					 placeholder="Nr domu"
																					 id="Dom"
																					 name="Dom"
																					 value={$klient['Dom']}
																					 required>
																	</div>

																	<div class="form-group">
																	 <label for="Lokal">Nr lokalu:</label>
																	 <input
																					 type="number"
																					 class="form-control"
																					 placeholder="Nr lokalu"
																					 name="Lokal"
																					 id="Lokal"
																					 value="{$klient['Lokal']}"
																					 >
																	</div>

																	 <div class="form-group">
																	 <label for="KodPocztowy">Kod Pocztowy:</label>
																	 <input
																					 type="text"

																					 class="form-control"
																					 placeholder="62-800"
																					 name="KodPocztowy"
																					 id="KodPocztowy"
																					 value="{$klient['KodPocztowy']}"
																					 required>
																	</div>
																	 <div class="form-group">
																	 <label for="Poczta">Poczta:</label>
																	 <input
																					 type="text"
																					 class="form-control"
																					 placeholder="Poczta"
																					 name="Poczta"
																					 id="Poczta"
																					 value="{$klient['Poczta']}"
																					 required>
																	</div>

																	 <div class="form-group">
																	 <label for="Email">Email:</label>
																	 <input
																					 type="text"
																					 class="form-control"
																					 placeholder="firma@firma.com"
																					 name="Email"
																					 id="Email"
																					 value="{$klient['EMail']}"
																					 required>
																	</div>

																	<div class="form-group">
																	<label for="NazwaFirmy">Nazwa firmy:</label>
																	<input
																					type="text"
																					class="form-control"
																					placeholder="nazwa firmy"
																					name="NazwaFirmy"
																					id="NazwaFirmy"
																					value="{$klient['NazwaFirmy']}">

																 </div>

															</div>
															<input type="submit" value="Zmień" class="btn btn-primary" />
															<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
			      </div>
				{/foreach}
			{/if}
    </div>
  </div>
</div>





</div>




{include file="footer.html.php"}
