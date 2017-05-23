{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Min Stan Magazynowy</th><th>Max Stan Magazynowy</th><th>Stawka Vat</th><th>Kategoria</th><th>Jednostka Miary</th><th>Status</th><th>Edytuj</th><th>Anuluj</th>
    </tr>
  </thead>
{if isset($tablicaZamowien)}
  {foreach $tablicaZamowien as $zamowienie}
  <tr>
    <td>{$zamowienie['NazwaTowaru']}</td>
    <td>{$zamowienie['MinStanMagazynowy']}</td>
    <td>{$zamowienie['MaxStanMagazynowy']}</td>
    <td>{$zamowienie['StawkaVat']}</td>
    <td>{$zamowienie['IdKategoria']}</td>
    <td>{$zamowienie['IdJednostkaMiary']}</td>
    <td>{$zamowienie['Status']}</td>
    <td><a href="" role="button">Edytuj</a></td>
    <td><a href="" role="button">Anuluj</a></td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
