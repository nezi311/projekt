{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>

<div class="panel panel-primary">
<div class="panel-heading">Parametry</div>
<div class="panel-body">
	<form method="post">

	<div class="form-inline">
		<div class="form-group">
			<label for="Nazwa">Nazwa:</label>
			<input class="form-control" type="text" id="towar" name="towar"/>
		</div>
		<div class="form-group">
			<label for="cenaMin">cena mininalna:</label>
			<input class="form-control" type="text" id="cenaMin" name="cenaMin"/>
		</div>
		<div class="form-group">
			<label for="cenaMax">Cena maksymalna:</label>
			<input class="form-control" type="text" id="cenaMax" name="cenaMax"/>
		</div>
		<div class="form-group">
				<label for="WSprzedazy">W sprzedaży:</label>
			<div class="checkbox">
					<input type="checkbox" name="sprzedawane" id="blankCheckbox" value="tru"> tak
			    <input type="checkbox" name="niesprzedawane" id="blankCheckbox" value="tru"> nie
			</div>
		</div>
		{if isset($allKategorie)}
		<div class="form-group" div id="kat">
					<label for="kategoria">Kategoria</label>
					<select class="form-control" name="kategoria" id="kryterium"> <!--Supplement an id here instead of using 'name'-->
						<option value="0" {if $kat==0}selected{/if}>Wszystkie kategorie</option>
				{foreach $allKategorie as $kategoria}
							<option value={$kategoria['IdKategoria']} {if $kat==$kategoria['IdKategoria']}selected{/if}>{$kategoria['NazwaKategorii']}</option>
							{/foreach}
					</select>
		</div>
		{/if}
		<input type="submit" value="Aktualizuj" class="btn btn-default" />

	</div>
	</form>
</div>
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
