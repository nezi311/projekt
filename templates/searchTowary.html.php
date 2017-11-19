{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<div class="row">
	<div class="col-md-3">
<div class="panel panel-primary">
<div class="panel-heading">Parametry</div>
<div class="panel-body">
	<form method="post">

		<div class="form-group">
			<label for="Nazwa">Nazwa:</label>
			<input class="form-control" type="text" id="towar" value="{$towar}" name="towar"/>
		</div>
		<div class="form-group">
			<label for="cenaMin">cena mininalna:</label>
			<input class="form-control" type="text" id="cenaMin" value="{$cenaMin}" name="cenaMin"/>
		</div>
		<div class="form-group">
			<label for="cenaMax">Cena maksymalna:</label>
			<input class="form-control" type="text" id="cenaMax" value="{$cenaMax}" name="cenaMax"/>
		</div>
		<div class="form-group">
			<label for="kodTowaru">Kod towaru</label>
			<input class="form-control" type="text" id="kodTowaru" value="{$kodTowaru}" name="kodTowaru"/>
		</div>
		<div class="form-group">
				<label for="WSprzedazy">W sprzedaży:</label>
				<div class="form-inline">
			<div class="checkbox">
					<label><input type="checkbox" name="sprzedawane" id="blankCheckbox" value="tru" {if $sprzedawane=="tru"}checked{/if}> tak</label>
			    <label><input type="checkbox" name="niesprzedawane" id="blankCheckbox" {if $niesprzedawane=="tru"}checked{/if} value="tru"> nie</label>
			</div>
		</div>
		</div>
		<input type="submit" value="Aktualizuj" class="btn btn-default" />

	</form>
</div>
</div>
</div>

<div class="col-md-9">
{if isset($tablicaTowarow) and !empty($tablicaTowarow)}
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Stan Magazynowy Dysponowany</th><th>Kod Towaru</th><th>W sprzedaży</th><th>Akcja</th>
    </tr>
  </thead>
  {foreach $tablicaTowarow as $towar}
  <tr>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/showone/{$towar['IdTowar']}" role="button"><strong>{$towar['NazwaTowaru']}</strong></a></td>
    <td>{$towar['StanMagazynowyDysponowany']}</td>
    <td>{$towar['KodTowaru']}</td>
		<td>{if $towar['Freeze']==1} Nie {else} Tak {/if}  </td>
    <td>

			<div class="btn-group" role="group">
						{if $towar['Freeze']==1}<a type="button" class="btn btn-info" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/unfreeze/{$towar['IdTowar']}" role="button">Wprowadź do sprzedaży</a>{else}<a type="button" class="btn btn-info" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/freeze/{$towar['IdTowar']}" role="button">Wycofaj ze sprzedaży</a>{/if}

					</div></td>
  </tr>
  {/foreach}
</table>
</div>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
