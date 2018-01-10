{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table sortable">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th style=text-align:center;>Stan Magazynowy Dysponowany</th><th style=text-align:center;>Kategoria</th><th style=text-align:center;>Jednostka Miary</th><th style=text-align:right;>Cena netto</th><th style=text-align:right;>VAT</th><th style=text-align:right;>Cena brutto</th><th class="sorttable_nosort">Wycofaj z sprzedaży</th><th class="sorttable_nosort">Kup</th>
    </tr>
  </thead>
{if isset($tablicaTowarow)}
  {foreach $tablicaTowarow as $towar}
  <tr>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$towar['IdTowar']}" role="button"><strong>{$towar['NazwaTowaru']}</strong></a></td>
    <td style=text-align:center;>{$towar['StanMagazynowyDysponowany']}</td>
    <td style=text-align:center;>{$towar['Kategoria']}</td>
    <td style=text-align:center;>{$towar['JednostkaMiary']}</td>
		{if $towar['Cena']==0}
			<td style=text-align:right;>Cena nie została ustalona</td>
		{else}
			<td style=text-align:right;>{number_format((float)$towar['Cena'], 2, ',', ' ')} PLN</td>
		{/if}
    <td style=text-align:center;>{$towar['StawkaVat']}</td>
		{if $towar['Cena']==0}
			<td style=text-align:right;>Cena nie została ustalona</td>
		{else}
		<td style=text-align:center;>{number_format(((float)$towar['Cena']+(((float)$towar['StawkaVat']*(float)$towar['Cena'])/100)), 2,',',' ')} PLN</td>
		{/if}
		<td>
    <a type="button" class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/freeze/{$towar['IdTowar']}" role="button">Wycofaj z Sprzedaży</a>

	</td>
		<td>
		{if $towar['StanMagazynowyDysponowany']!=0}
		<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/koszyk/{$towar['IdTowar']}" method="post">
			<input type='hidden' name='IdTowar' value={$towar['IdTowar']}>
			<input type='hidden' name='cena' value={$towar['Cena']}>
			{if $towar['Cena']==0}
			<input type='submit' class="btn btn-primary" value='Dodaj' disabled>
			{else}
			<input type='submit' class="btn btn-primary" value='Dodaj'>
			{/if}
			{$ilosc=1}
			<select name='ilosc' id='ilosc'>
				{while $ilosc<=$towar['StanMagazynowyDysponowany']}
					<option value={$ilosc}>{$ilosc}</option>
					{$ilosc++}
				{/while}
			</select>

		</form>
		{elseif $towar['Cena']==0}
		<div class="alert alert-danger" style=text-align:center;>
		<strong>Cena nie została ustalona</strong>
		</div>

		{else}
		<div class="alert alert-danger" style=text-align:center;>
  	<strong>Brak towaru</strong>
		</div>
		{/if}
	</td>
</tr>

  {/foreach}
{/if}
</table>
{if isset($error) and $error != ''}
<strong>{$error}</strong>
{/if}
{if isset($errorCennik)}
<strong>{$errorCennik}</strong>
{/if}

{include file="footer.html.php"}
