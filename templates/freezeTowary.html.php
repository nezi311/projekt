{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Stan Magazynowy</th><th>Min Stan Magazynowy</th><th>Max Stan Magazynowy</th><th>Stan Magazynowy Rzeczywisty</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Stan</th><th>Edytuj</th><th>Odmroz</th><th>usun</th>
    </tr>
  </thead>
{if isset($tablicaTowarow2)}
  {foreach $tablicaTowarow2 as $towar}
  <tr>
    <td>{$towar['NazwaTowaru']}</td>
    <td>{$towar['StanMagazynowy']}</td>
    <td>{$towar['MinStanMagazynowy']}</td>
    <td>{$towar['MaxStanMagazynowy']}</td>
    <td>{$towar['StanMagazynowyRzeczywisty']}</td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['StawkaVat']}</td>
    <td>{$towar['KodTowaru']}</td>
    <td>{$towar['IdKategoria']}</td>
    <td>{$towar['IdJednostkaMiary']}</td>
		<td>{$towar['Freeze']}</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/edit/{$pracownik['id']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/zmienAktywnosc/{$pracownik['id']}" role="button">Odmroź</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/passReset/{$pracownik['id']}" role="button">Usuń</a></td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
