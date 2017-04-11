{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Klientów</h2>
</div>


<div class="container">
<h1>Dodaj Klienta</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#btnDodajKlienta" aria-expanded="false" aria-controls="btnDodajKlienta">
  Dodaj nowego klienta
</button>
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
						 id="nazwisko"
						 name="nazwisko"
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
	    <span class="form-group-btn">
	    <button type="submit" class="btn btn-success"  >dodaj</button>
	    </span>
	</div>
	</form>
</div>
<!-- tabela z kategoriami -->
<!-- dyrektywa ng-init inicjalizuje tabele -->
<table class="table table-striped">
  <thead>
  <tr>

		<th>Dane osobowe</th>
		<th>NIP</th>
		<th>Adres</th>
		<th>Poczta</th>
		<th>Email</th>
		<th>Edytuj</th>
  </tr>
  </thead>
  <tbody>
		{if isset($tablicaKlient)}
		  {foreach $tablicaKlient as $klient}
				<tr>

					<td>{$klient['DaneKlienta']}</td>
						<td>{$klient['NIP']}</td>
						<td>{$klient['Adres']}</td>
						<td>{$klient['Poczta']}</td>
						<td>{$klient['EMail']}</td>
						<td>
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
											<form action="http://{$smarty.server.HTTP_HOST}{$subdir}KategoriaKlientow/Edytuj/{$kategoria['IdKategoria']}" method="post">
												<div class="form-group">
													<label for="name">Nazwa kategorii</label>
													<input type="text" class="form-control" name="nazwa" value="{$kategoria['NazwaKategorii']}" />
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
			{/foreach}
		{/if}
  </tbody>
</table>




</div>


{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
