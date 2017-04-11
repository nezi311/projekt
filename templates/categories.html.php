{include file="header.html.php"}
<div class="container">
<div class="page-header">
<h1>Lista kategorii</h1>
</div>
{if $allKategorie|@count === 0}
	<div class="alert alert-danger" role="alert">Brak kategorii w bazie!</div>
{else}
<table class="table">
	<thead>
		<tr>
			<th>Nazwa kategorii</th>
			<th>Działanie</th>
		</tr>
	</thead>
	<tbody>
				{foreach $allKategorie as $category}
		<tr>
			<td><span class="badge">{$category['ilosc']}</span>  {$category['NazwaKategorii']}</td>

			<td>
          <div class="btn-group" role="group">
        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal{$category['IdKategoria']}">zmień nazwę</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal{$category['NazwaKategorii']}">Usuń</button>
</td>
<div id="myModal{$category['IdKategoria']}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edycja</h4>
      </div>
      <div class="modal-body">

                    <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Kategoria/Edytuj/{$category['IdKategoria']}" method="post">
                        <div class="form-group">
                        <label for="name">Nazwa kategorii</label>
                        <input type="text" class="form-control" name="towar" value="{$category['NazwaKategorii']}" />
                        </div>
                        <input type="submit" value="Zmień nazwę" class="btn btn-primary" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                    </form>

      </div>
    </div>
  </div>
</div>

			{if $category['ilosc'] > 0}
			<div class="modal fade" id="Modal{$category['NazwaKategorii']}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="gridSystemModalLabel">Usuwanie kategori</h4>
			      </div>
			      <div class="modal-body">
							Nie można usunąć kategorii <strong>{$category['NazwaKategorii']}</strong>, ponieważ znajdują się w niej towary
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			{else}
			<div class="modal fade" id="Modal{$category['NazwaKategorii']}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="gridSystemModalLabel">Usuwanie kategori</h4>
			      </div>
			      <div class="modal-body">
							Czy na pewno chcesz usunąć kategorię <strong>{$category['NazwaKategorii']}</strong>?
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
			        <a type="button" class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Kategoria/Usun/{$category['IdKategoria']}">usuń</a>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			{/if}
		</tr>
		 {/foreach}
	</tbody>
</table>

{/if}
{if isset($error)}
<strong>{$error}</strong>

{/if}<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Dodaj kategorię
</a>
<div class="collapse" id="collapseExample">
  <div class="well">
		<form id="addcategory" action="http://{$smarty.server.HTTP_HOST}{$subdir}Kategoria/Wstaw/" method="post">
		    <div class="form-group">
		    <label for="name">Nowa kategoria</label>
		    <input type="text" class="form-control" name="nazwa" placeholder="Wprowadź nazwę kategorii"/>
		    </div>
		    <input type="submit" value="Dodaj" class="btn btn-default" />
		</form>
  </div>
</div>
<br/><br/>
</div>
{include file="footer.html.php"}
