{include file="header.html.php"}

<div class="page-header">
	<h2>Lista pracowników</h2>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Imie</th><th>Nazwisko</th><th>Dział</th><th>Stanowisko</th><th>Telefon</th><th>Login</th><th>Uprawnienia</th><th>Urlop</th><th>Edytuj</th><th>Usuń</th><th>Resetuj hasło</th>
    </tr>
  </thead>
{if isset($tablicaPracownicy)}
  {foreach $tablicaPracownicy as $pracownik}
  <tr>
    <td>{$pracownik['imie']}</td>
    <td>{$pracownik['nazwisko']}</td>
    <td>{$pracownik['dzial']}</td>
    <td>{$pracownik['stanowisko']}</td>
    <td>{$pracownik['telefon']}</td>
    <td>{$pracownik['login']}</td>
    <td>{$pracownik['uprawnienia']}</td>
    <td>{$pracownik['urlop']}</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/edit/{$pracownik['id']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/delete/{$pracownik['id']}" role="button">Archiwizuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/delete/{$pracownik['id']}" role="button">Resetuj</a></td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
