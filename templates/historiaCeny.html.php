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

		  <div class="table-responsive">
					<table class="table">
						<thead>
								<th>Cena</th>
								<th>Cennik od</th>
								<th>Cennik do</th>
								<th>Opis</th>
								<th>Aktualny</th>
								<th>Zmień aktywność</th>
						</thead>
						<tbody>
							{if isset($cennik)}
								{foreach $cennik as $cen}
											<tr>
												<td>{$cen[2]}</td>
												<td>{$cen[3]}</td>
												<td>{$cen[4]}</td>
												<td>{$cen[6]}</td>
												<td>{$cen[5]}</td>
												<td>
													<a href="http://{$smarty.server.HTTP_HOST}{$subdir}Cennik/zmienStanAktywnosci/{$cen[0]}">Zmień</a>
												</td>
											</tr>
								{/foreach}
							{/if}
					</tbody>
				</table>
			</div>










</div>
{include file="footer.html.php"}
