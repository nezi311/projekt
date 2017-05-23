{include file="header.html.php"}
<div class="container">
<div class="page-header">
	<h2>Zestawienia sprzedaży</h2>
</div>

<div class="row">
	<div class="col-md-3">
<div class="panel panel-primary">
  <div class="panel-heading">Parametry</div>
  <div class="panel-body">
		<form method="post">
				<div class="form-group">
					<label for="kryterium">Kryterium</label>
					<select class="form-control" class="target" name="kryterium" id="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<optgroup label="Towary">
						  <option value="towarIlosc" {if $kryterium=="towarIlosc"}selected{/if}>Sprzedane towary (ilość)</option>
						  <option value="towarKasa" {if $kryterium=="towarKasa"}selected{/if}>Sprzedane towary (wartość)</option>
						</optgroup>
						<optgroup label="Klienci">
				  		<option value="klientKasa" {if $kryterium=="klientKasa"}selected{/if}>Najwięcej kupujący klienci</option>
						</optgroup>
					</select>
				</div>
				<div class="form-group">
			    <label for="fraza">Fraza</label>
					<input class="form-control" type="text" id="fraza" value="{$fraza}" name="fraza"/>
				</div>
				<div class="form-group">
			    <label for="dataOd">Data od</label>
					<input class="form-control" type="date" id="dataOd" value={$dataOd} name="dataOd"/>
				</div>
			<div class="form-group">
				<label for="dataDo">Data do</label>
				<input class="form-control" type="date" id="dataDo" value={$dataDo} name="dataDo"/>
			</div>
			{if isset($allKategorie)}
			<div class="form-group" div id="kat">
						<label for="kategoria">Kategoria</label>
						<select class="form-control" name="kategoria" id="kryterium"> <!--Supplement an id here instead of using 'name'-->
							<option value="0" {if $kat==0}selected{/if}>Wszystkie kategorie</option>
					{foreach $allKategorie as $kategoria}
							  <option value={$kategoria['IdKategoria']} {if $kat==$kategoria['IdKategoria']}selected{/if}>{$kategoria['NazwaKategorii']}</option>
								{/foreach}
						</select>
			</div>
			{/if}
			<input type="submit" value="Aktualizuj" class="btn btn-default" />
		</form>
	</div>
</div>
</div>
<div class="col-md-9">
{if !isset($allStatystyki)}
	<div class="alert alert-danger" role="alert">Brak wyników</div>

{else}
<table class="table sortable">
	<thead>
		<tr>
			<th class=sorttable_nosort>#</th><th>{if $kryterium=="klientKasa"}Klient{else}Nazwa Towaru{/if}</th><th>{if $kryterium=="towarIlosc" || $kryterium=="towarKasa"}Kategoria{elseif $kryterium=="klientKasa"}Poczta{/if}</th><th>{if $kryterium=="klientKasa" || $kryterium=="towarKasa"}Wartość{else}Ilość{/if}</th>
		</tr>
	</thead>
	<tbody>
		{assign var=val value=1}
	{foreach $allStatystyki as $statystyka}
		<tr>
			<td>{$val}</td>
			<td>{$statystyka['nazwa']}</td>
			<td>{if $kryterium=="towarIlosc" || $kryterium=="towarKasa"}{$statystyka['kategoria']}{elseif $kryterium=="klientKasa"}{$statystyka['adres']}{/if}</td>
			<td>{$statystyka['wartosc']}</td>
		</tr>
{assign var=val value=$val+1}
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
