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
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$towar['IdTowar']}" role="button"><strong>{$towar['NazwaTowaru']}</strong></a></td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['StawkaVat']}</td>
    <td>{$towar['KodTowaru']}</td>
		<td>{if $towar['Freeze']==1} Nie {else} Tak {/if}  </td>
    <td>

			<div class="btn-group-vertical" role="group">
						{if $towar['Freeze']==1}<a type="button" class="btn btn-info" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/unfreeze/{$towar['IdTowar']}" role="button">Wprowadź do sprzedaży</a>{else}<a type="button" class="btn btn-info" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/freeze/{$towar['IdTowar']}" role="button">Wycofaj ze sprzedaży</a>{/if}

					</div></td>
  </tr>
  {/foreach}
</table>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
