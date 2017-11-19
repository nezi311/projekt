{include file="header.html.php"}
<div class="container">
<div class="page-header">
	<h2>Zestawienia sprzedaży</h2>
</div>

<button type="button" class="btn btn-primary hidden-lg hidden-md hidden-sm" data-toggle="modal" data-target="#myModal">
  Parametry zestawień
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Parametry</h4>
      </div>
      <div class="modal-body">

				<div class="form-group">
					<label for="kryterium">Kryterium</label>
					<select class="form-control" class="target" name="kryterium" id="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<optgroup label="Towary">
							<option value="towarIlosc" {if $kryterium=="towarIlosc"}selected{/if}>Sprzedane towary (ilość)</option>
							<option value="towarKasa" {if $kryterium=="towarKasa"}selected{/if}>Sprzedane towary (wartość)</option>
							<option value="towarNiesprzedany" {if $kryterium=="towarNiesprzedany"}selected{/if}>Towary bez popytu</option>
						</optgroup>
						<optgroup label="Kategoria">
							<option value="kategoriaKasa" {if $kryterium=="kategoriaKasa"}selected{/if}>Dochód z kategorii</option>
						</optgroup>
						<optgroup label="Klienci">
							<option value="klientKasa" {if $kryterium=="klientKasa"}selected{/if}>Najwięcej kupujący klienci</option>
						</optgroup>
					</select>
				</div>
				<div class="form-group" id="fragment">
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

      </div>
      <div class="modal-footer">
				<input type="submit" value="Aktualizuj" class="btn btn-default" />
      </div>

    </div>
  </div>
</div>

<div class="row">
	<div class="col-md-3">
<div class="panel panel-primary hidden-xs">
  <div class="panel-heading">Parametry</div>
  <div class="panel-body">
		<form method="post">
				<div class="form-group">
					<label for="kryterium">Kryterium</label>
					<select class="form-control" class="target" name="kryterium" id="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<optgroup label="Towary">
						  <option value="towarIlosc" {if $kryterium=="towarIlosc"}selected{/if}>Sprzedane towary (ilość)</option>
						  <option value="towarKasa" {if $kryterium=="towarKasa"}selected{/if}>Sprzedane towary (wartość)</option>
						  <option value="towarNiesprzedany" {if $kryterium=="towarNiesprzedany"}selected{/if}>Towary bez popytu</option>
						</optgroup>
						<optgroup label="Kategoria">
				  		<option value="kategoriaKasa" {if $kryterium=="kategoriaKasa"}selected{/if}>Dochód z kategorii</option>
						</optgroup>
						<optgroup label="Klienci">
				  		<option value="klientKasa" {if $kryterium=="klientKasa"}selected{/if}>Najwięcej kupujący klienci</option>
						</optgroup>
					</select>
				</div>
				<div class="form-group" id="fragment">
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
<div id="table_wrapper">
<table class="table sortable" id="list">
	<thead>
		<tr>
			<th class=sorttable_nosort>#</th><th>{if $kryterium=="klientKasa"}Klient{elseif $kryterium=="kategoriaKasa"}Kategoria{else}Nazwa Towaru{/if}</th><th>{if $kryterium=="towarIlosc" || $kryterium=="towarKasa"|| $kryterium=="towarNiesprzedany"}Kategoria{elseif $kryterium=="klientKasa"}Poczta{/if}</th><th>{if $kryterium=="klientKasa" || $kryterium=="towarKasa"} Wartość {elseif $kryterium=="towarNiesprzedany"} Stan magazynowy {else} Ilość{/if}</th>
		</tr>
	</thead>
	<tbody>
		{assign var=val value=1}
		{assign var=suma value=0}
	{foreach $allStatystyki as $statystyka}
		<tr>
			<td>{$val}</td>
			<td>{if $kryterium=="kategoriaKasa"}{$statystyka['kategoria']}{else}{$statystyka['nazwa']}{/if}</td>
			<td>{if $kryterium=="towarIlosc" || $kryterium=="towarKasa" || $kryterium=="towarNiesprzedany"}{$statystyka['kategoria']}{elseif $kryterium=="klientKasa"}{$statystyka['adres']}{/if}</td>
			<td>{$statystyka['wartosc']}{if $kryterium=="towarKasa"}{$suma=$suma+$statystyka['wartosc']}{/if}</td>
		</tr>
{assign var=val value=$val+1}
		{/foreach}
	</tbody>
{if $kryterium=="towarKasa"}
	<tfoot>
	<tr>
	<th></th>
	<th>SUMA</th>
	<th></th>
	<th>{$suma} zł.</th>
	</tr>
	</tfoot>
{/if}
</table>
</div>
{/if}
	</div>
</div>
<button class="primary-btn" id="btnExport">Export to xls</button>
{if isset($error)}
<strong>{$error}</strong>

{/if}
</div>

{include file="footer.html.php"}
