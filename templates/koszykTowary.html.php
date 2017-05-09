{include file="header.html.php"}
<!--kontroler wKoszyku w TOWAR-->
<div class="page-header">
	<h2>Towary w koszyku</h2>
</div>
{$suma=0}
{if isset($tablicaTowarow2) and $tablicaTowarow2 != null}
<table class="table" style='width:50%;'>
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Kod Towaru</th><th>Cena</th><th>Stawka Vat</th><th>Ilość</th><th>Cena częściowa</th><th>Usuń</th>
    </tr>
  </thead>

  {foreach $tablicaTowarow2 as $towar}
  <tr>
    <td>{$towar['NazwaTowaru']}</td>
		<td>{$towar['KodTowaru']}</td>
		<td>{$towar['Cena']}</td>
    <td>{$towar['StawkaVat']}%</td>
    <td>
			<a href="http://{$smarty.server.HTTP_HOST}{$subdir}Koszyk/plus/{$towar['Id']}" role="button"><span class="glyphicon glyphicon-plus"></span></a>
			{$towar['ilosc']} {$towar['NazwaSkrocona']}
			<a href="http://{$smarty.server.HTTP_HOST}{$subdir}Koszyk/minus/{$towar['Id']}" role="button"><span class="glyphicon glyphicon-minus"></span></a>
		</td>
		<td>{(((($towar['Cena']*$towar['StawkaVat'])/100)+$towar['Cena'])*$towar['ilosc'])}</td>
		{$suma=$suma+((($towar['Cena']*$towar['StawkaVat'])/100*$towar['ilosc'])+$towar['Cena']*$towar['ilosc'])}
		<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Koszyk/usun/{$towar['Id']}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
  </tr>
  {/foreach}
</table>
<b>Klient</b>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Koszyk/zrealizuj" method="post" style='width:20%;'>
	<select name="klient" class="form-control">
	{foreach $Klienci as $klient}
	<option value="{$klient['IdKlient']}">{$klient['Imie']} {$klient['Nazwisko']}</option>
	{/foreach}
</select>
<br>
	<input type='hidden' name='suma' value={$suma}>
	<input type='submit' name='submit' value=Zamów>
</form>
Suma: {$suma}
{else}
<h2>Brak towarów do zamówienia.</h2>
{/if}

{include file="footer.html.php"}
