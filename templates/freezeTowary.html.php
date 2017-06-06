{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów Wycofanych</h2>
</div>
<table class="table">
  <thead>
    <tr>
			<th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Cena</th><th>Wprowdz do Sprzedaży</th>
    </tr>
	</thead>
{if isset($tablicaTowarow2)}
  {foreach $tablicaTowarow2 as $towar}
  <tr>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$towar['IdTowar']}" role="button"><strong>{$towar['NazwaTowaru']}</strong></a></td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['KodTowaru']}</td>
    <td>{$towar['Kategoria']}</td>
    <td>{$towar['JednostkaMiary']}</td>
		<td>{$towar['Cena']}</td>
    <td><a type="button" class="btn btn-primary"href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/unfreeze/{$towar['IdTowar']}" role="button">Wprowdz do Sprzedaży</a></td>
	</tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
