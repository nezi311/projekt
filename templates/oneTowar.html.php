{include file="header.html.php"}


{if isset($tablicaTowarow) and !empty($tablicaTowarow)}
  {foreach $tablicaTowarow as $towar}
<div class="panel panel-primary">
  <div class="panel-heading"><h2>{$towar['NazwaTowaru']}<h2></div>
  <div class="panel-body">
    <div class="col-md-4">
		<table class="table">
      <tr>
	  <th>Stan magazynowy:</th><td>{$towar['StanMagazynowyDysponowany']}</td>
  </tr>
  <tr>
      <th>Min stan magazynowy:</th><td>{$towar['MinStanMagazynowy']}</td>
    </tr>
    <tr>
    	<th>Max stan magazynowy:</th><td>{$towar['MaxStanMagazynowy']}</td>
    </tr>
    <tr>
    	<th>Stawka vat:</th><td>{$towar['StawkaVat']}</td>
    </tr>
    <tr>
      <th>Kod towaru:</th><td>{$towar['KodTowaru']}</td>
    </tr>
    <tr>
      <th>Jednostkamiary:</th><td>{$towar['IdJednostkaMiary']}</td>
    </tr>
    <tr>
      <th>W sprzedaży:</th><td>{if $towar['Freeze']=1}tak{else}nie{/if}</td>
    </tr>
    <tr>
      <th>Cena:</dt><th>{$towar['Cena']}zł</th>
      </tr>
    </table>
	<div class="btn-group" role="group">
		<a type="button" class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/edit/{$towar['IdTowar']}" role="button">Edytuj</a>
		<a type="button" class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/zamroz/{$towar['IdTowar']}" role="button">Wycofaj ze sprzedaży</a>
	</div>
</div>
</h4>
  </div>
</div>
  {/foreach}
</table>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
