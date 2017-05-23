{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów z kategori </h2>
</div>
<table class="table sorttable">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Cena</th><th>Edytuj</th><th>Zamroz</th><th>Kup</th><th>usun</th>
    </tr>
  </thead>
{if isset($allKategorie)}
  {foreach $allKategorie as $category}
  <tr>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$category['IdTowar']}" role="button">{$category['NazwaTowaru']}</a></td>
    <td>{$category['StanMagazynowyDysponowany']}</td>
    <td>{$category['StawkaVat']}</td>
    <td>{$category['KodTowaru']}</td>
    <td>{$category['NazwaKategorii']}</td>
    <td>{$category['Nazwa']}</td>
		<td>{$category['Cena']}</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/edit/{$category['IdTowar']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/freeze/{$category['IdTowar']}" role="button">Zamroź</a></td>
		<td>
		<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/koszyk/{$category['IdTowar']}" method="post">
			<input type='hidden' name='IdTowar' value={$category['IdTowar']}>

			<input type='submit' value='Dodaj'>

			{$ilosc=1}
			<select name='ilosc' id='ilosc'>
				{while $ilosc<=$category['StanMagazynowyDysponowany']}
					<option value={$ilosc}>{$ilosc}</option>
					{$ilosc++}
				{/while}
			</select>
		</form>
		</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/delete/{$category['IdTowar']}" role="button">Usuń</a></td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
