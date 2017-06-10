{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Zamówień</h2>
</div>
{assign var="data" value="null"}
{assign var="klient" value="null"}
<table>
{if isset($tablicaZamowien)}
<!--{d($tablicaZamowien)}-->
  {foreach $tablicaZamowien as $towar}
		{if $data neq $towar['DataZamowienia'] or $klient neq $towar['IdKlient']}
		{assign var="data" value=$towar['DataZamowienia']}
		{assign var="klient" value=$towar['IdKlient']}

	</table>
	</div>
	<h4>Data Zamówienia: {$towar['DataZamowienia']}</h4>
	<h4>Klient: {$towar['Nazwisko']} {$towar['Imie']}</h4>
	<h4>Wartość Zamówienia: {$towar['Wartosc']}</h4>
	<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#{$towar['IdZamowienieSprzedaz']}" aria-expanded="false" aria-controls="collapseExample">
	  Szczegóły
	</button><br><br>
	<div class="collapse" id="{$towar['IdZamowienieSprzedaz']}">
	<form action='Zamowienia/faktura/{$towar['IdZamowienieSprzedaz']}' method='post' style=width:10%;>
		<div class="form-group">
			<label for="dataOd">Data sprzedaży</label>
			<input class="form-control" type="date" id="dataSprzedazy" name="dataSprzedazy"/>
		</div>
{*{if $towar['IdSposobZaplaty']==='1'}*}
		<div class="form-group">
			<label for="dataOd">Termin zapłaty</label>
			<input class="form-control" type="date" id="dataZaplaty" name="dataZaplaty"/>
		</div>
{*{/if}*}
		<input type="submit" class="btn btn-primary" value="Generuj fakturę">
	</form>

		<table class="table sorttable" style=width:50%;>
		  <thead>
		    <tr>
		      <th>Towar</th><th>Ilość</th><th>Cena</th><th>Vat</th>
		    </tr>
		  </thead>
		<tr>
		<td>{$towar['NazwaTowaru']}</td>
    <td>{$towar['ilosc']}</td>
    <td>{$towar['cena']}</td>
		<td>{$towar['vat']}%</td>
		</tr>

		{else}

		<tr>
		<td>{$towar['NazwaTowaru']}</td>
		<td>{$towar['ilosc']}</td>
		<td>{$towar['cena']}</td>
		<td>{$towar['vat']}%</td>
		</tr>
		{/if}
  {/foreach}
	{else}
	<h2>Brak zamówień do wyświetlenia.</h2>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
