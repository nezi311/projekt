{include file="header.html.php"}

<div class="page-header">
	<h2>Towary w koszyku</h2>
</div>
<table class="table" style='width:50%;'>
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Kod Towaru</th><th>Stawka Vat</th><th>Ilość</th>
    </tr>
  </thead>
{if isset($tablicaTowarow2)}
  {foreach $tablicaTowarow2 as $towar}
  <tr>
    <td>{$towar['NazwaTowaru']}</td>
		<td>{$towar['KodTowaru']}</td>
    <td>{$towar['StawkaVat']}%</td>
    <td>{$towar['ilosc']} {$towar['NazwaSkrocona']}</td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
