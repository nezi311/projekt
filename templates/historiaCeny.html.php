{include file="header.html.php"}

<div class="page-header">
	{if isset($cennik)}
		<h2>Historia ceny dla towaru : {$cennik[0]['NazwaTowaru']}</h2>
	{/if}
</div>
<div class="container">
	{if isset($error) and $error!=""}
	<div class="alert alert-danger" role="alert">{$error}</div>
	{/if}
					<table class="table">
						<thead>
							<tr>
								<th>Obecna Cena</th>
								<th>Cennik od</th>
								<th>Cennik do</th>
								<th>Opis</th>
								<th>Aktualny</th>
								<th>Zmień aktywność</th>
							</tr>
						</thead>
						<tbody>
							{foreach $cennik as $hstcn}
										<tr>
											<td>{$hstcn['cena']}<td>
											<td>{$hstcn['dataOd']}<td>
											<td>{$hstcn['dataDo']}<td>
											<td>{$hstcn['opis']}<td>
											<td>{$hstcn['aktualny']}<td>
											<td><a class="btn" href="http://{$smarty.server.HTTP_HOST}{$subdir}Cennik/zmienStanAktywnosci/{$hstcn['idCennik']}">Zmień</a><td>
										</tr>

							{/foreach}
						</tbody>
					</table>











</div>

{include file="footer.html.php"}
