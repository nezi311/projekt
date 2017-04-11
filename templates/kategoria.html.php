{include file="header.html.php"}
<div class="container">
<div class="page-header">
<h1>Klienci - kategorie</h1>
</div>
{if $allKategorie|@count === 0}
	<div class="alert alert-danger" role="alert">Brak kategorii w bazie!</div>
{else}
<div class="row">
<div class="col-md-8">

		<table class="table table-hover">
				<thead>
					<tr>
					<th>Id</th><th>Nazwa</th><th>Akcja</th>
				</tr>
				</thead>
				<tbody>
					{foreach $allKategorie as $kategoria}
					<tr>
						<th>{$kategoria['IdKategoria']}</th>
						<td>{$kategoria['NazwaKategorii']}</td>
						<td class="col-md-4">
							<div class="btn-group" role="group">

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{$kategoria['Id']}">zmień nazwę</button>
						<a type="button" class="btn btn-danger" href="http://{$smarty.server.HTTP_HOST}{$subdir}KategoriaKlientow/Usun/{$kategoria['IdKategoria']}">usuń</a>
			            </div>

	<!-- Modal -->
	<div id="myModal{$kategoria['IdKategoria']}" class="modal fade" role="dialog">
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
				</tbody>
			</table>
</div>
</div>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Dodaj nowy rodzaj
</button>
<div class="collapse" id="collapseExample">
  <div class="well">
		<form  action="http://{$smarty.server.HTTP_HOST}{$subdir}KategoriaKlientow/Wstaw/" method="post">
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
{include file="footer.html.php"}
