{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>

{if isset($tablicaTowarow) and !empty($tablicaTowarow)}
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Min Stan Magazynowy</th><th>Max Stan Magazynowy</th><th>Stan Magazynowy Rzeczywisty</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Stan</th><th>Edytuj</th><th>Zamroz </th><th>usun</th>
    </tr>
  </thead>
  {foreach $tablicaTowarow as $towar}
  <tr>
    <td>{$towar['NazwaTowaru']}</td>
    <td>{$towar['MinStanMagazynowy']}</td>
    <td>{$towar['MaxStanMagazynowy']}</td>
    <td>{$towar['StanMagazynowyRzeczywisty']}</td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['StawkaVat']}</td>
    <td>{$towar['KodTowaru']}</td>
    <td>{$towar['IdKategoria']}</td>
    <td>{$towar['IdJednostkaMiary']}</td>
		<td>{$towar['Freeze']}</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/edit/{$towar['IdTowar']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/zamroz/{$towar['IdTowar']}" role="button">Zamroź</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/delete/{$towar['IdTowar']}" role="button">Usuń</a></td>
  </tr>
  {/foreach}
</table>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
