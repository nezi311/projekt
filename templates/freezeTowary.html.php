{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table">
  <thead>
    <tr>
			<th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Cena</th><th>Edytuj</th><th>Odmroz</th><th>Kup</th><th>usun</th>
    </tr>
  </thead>
{if isset($tablicaTowarow2)}
  {foreach $tablicaTowarow2 as $towar}
  <tr>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$towar['IdTowar']}" role="button">{$towar['NazwaTowaru']}</a></td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['StawkaVat']}</td>
    <td>{$towar['KodTowaru']}</td>
    <td>{$towar['Kategoria']}</td>
    <td>{$towar['JednostkaMiary']}</td>
		<td>{$towar['Cena']}</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/edit/{$towar['IdTowar']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/unfreeze/{$towar['IdTowar']}" role="button">Odmroź</a></td>
		<td>
		<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/koszyk/{$towar['IdTowar']}" method="post">
			<input type='hidden' name='IdTowar' value={$towar['IdTowar']}>

			<input type='submit' value='Dodaj'>

			{$ilosc=1}
			<select name='ilosc' id='ilosc'>
				{while $ilosc<=$towar['StanMagazynowyDysponowany']}
					<option value={$ilosc}>{$ilosc}</option>
					{$ilosc++}
				{/while}
			</select>
		</form>
		</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/delete/{$towar['IdTowar']}" role="button">Usuń</a></td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
