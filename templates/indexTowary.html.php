{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table sorttable">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kategoria</th><th>Jednostka Miary</th><th>Cena</th><th></th><th>Kup</th>
    </tr>
  </thead>
{if isset($tablicaTowarow)}
  {foreach $tablicaTowarow as $towar}
  <tr>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$towar['IdTowar']}" role="button">{$towar['NazwaTowaru']}</a></td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['StawkaVat']}</td>
    <td>{$towar['Kategoria']}</td>
    <td>{$towar['JednostkaMiary']}</td>
		<td>{$towar['Cena']}</td>
		<td>
		<div class="btn-group" role="group">
    <a type="button" class="btn btn-primary"href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/freeze/{$towar['IdTowar']}" role="button">Zamroź</a>
	</div>
	</td>
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

  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
