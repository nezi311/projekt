{include file="header.html.php"}
<div class="container">
<div class="page-header">
	<h2>Statystyki sprzedaży</h2>
</div>

<div class="row">
	<div class="col-md-3">
<div class="panel panel-primary">
  <div class="panel-heading">Parametry</div>
  <div class="panel-body">
		<form method="post">
				<div class="form-group">
					<label for="kryterium">Kryterium</label>
					<select class="form-control" name="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<optgroup label="Towary">
						  <option value="towarIlosc">Sprzedane towary (ilość)</option>
						  <option value="towarKasa">Sprzedane towary (dochód)</option>
						</optgroup>
						<optgroup label="Klienci">
				  		<option value="klientIlosc">Najwięcej kupujący klienci</option>
						</optgroup>
					</select>
				</div>
					<div class="form-group">
				    <label for="sortowanie">Sortuj</label>
						<select class="form-control" name="sortowanie"> <!--Supplement an id here instead of using 'name'-->
					  <option value="ASC">Rosnąco</option>
					  <option value="DESC">Malejąco</option>
						</select>
					</div>
				<div class="form-group">
			    <label for="dataOd">Data od</label>
					<input class="form-control" type="date" id="dataOd" value="2017-01-01" name="dataOd"/>
				</div>
			<div class="form-group">
				<label for="dataDo">Data do</label>
				<input class="form-control" type="date" id="dataDo" value="2017-04-18" name="dataDo"/>
			</div>
			<input type="submit" value="Aktualizuj" class="btn btn-default" />
		</form>
	</div>
</div>
</div>
<div class="col-md-9">
{if !isset($allStatystyki)}
	<div class="alert alert-danger" role="alert">Brak wyników</div>


{else}
<table>
	<thead>
		<tr>
			<th>#</th><th>Kryterium</th><th>Wartość</th>
		</tr>
	</thead>
	<tbody>
	{foreach $allStatystyki as $statystyka}
		<tr>
			<td></td>
			<td>{$statystyka['nazwa']}</td>
			<td>{$statystyka['wartosc']}</td>
		</tr>
		{/foreach}
	</tbody>
</table>
{/if}
	</div>
</div>

{if isset($error)}
<strong>{$error}</strong>

{/if}
</div>
{include file="footer.html.php"}
