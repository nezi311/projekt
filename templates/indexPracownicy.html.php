{include file="header.html.php"}

<div class="page-header">
	<h2>Lista pracowników</h2>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Imie</th><th>Nazwisko</th><th>Dział</th><th>Stanowisko</th><th>Telefon</th><th>Login</th><th>Uprawnienia</th><th>Aktywny</th><th>Edytuj</th><th>Zmień stan aktywności</th><th>Resetuj hasło</th>
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
    <td>{$pracownik['aktywny']}</td>
		
		{if $pracownik['uprawnienia']==0 and $smarty.session.role==0}
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/edit/{$pracownik['id']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/zmienAktywnosc/{$pracownik['id']}" role="button">Zmień</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/passReset/{$pracownik['id']}" role="button">Resetuj</a></td>

		{elseif $pracownik['uprawnienia']>0 and $smarty.session.role<=1}
		<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/edit/{$pracownik['id']}" role="button">Edytuj</a></td>
		<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/zmienAktywnosc/{$pracownik['id']}" role="button">Zmień</a></td>
		<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/passReset/{$pracownik['id']}" role="button">Resetuj</a></td>

		{else}
		<td><a href="#" role="button">Edytuj</a></td>
    <td><a href="#" role="button">Zmień</a></td>
    <td><a href="#">Resetuj</a></td>
		{/if}
	</tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
