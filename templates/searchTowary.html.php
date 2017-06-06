{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>

{if isset($tablicaTowarow) and !empty($tablicaTowarow)}
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kod Towaru</th><th>W sprzedaży</th><th>Akcja</th>
    </tr>
  </thead>
  {foreach $tablicaTowarow as $towar}
  <tr>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$towar['IdTowar']}" role="button">{$towar['NazwaTowaru']}</a></td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['StawkaVat']}</td>
    <td>{$towar['KodTowaru']}</td>
		<td>{if $towar['Freeze']==1} Nie {else} Tak {/if}  </td>
    <td>

          <div class="btn-group" role="group">
						<a type="button" class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/edit/{$towar['IdTowar']}" role="button">Edytuj</a>
						<a type="button" class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/zamroz/{$towar['IdTowar']}" role="button">Zamroź</a>
	</td>
  </tr>
  {/foreach}
</table>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
