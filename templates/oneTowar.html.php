{include file="header.html.php"}


{if isset($tablicaTowarow) and !empty($tablicaTowarow)}
  {foreach $tablicaTowarow as $towar}
<div class="panel panel-primary">
  <div class="panel-heading"><div class="row">
  <div class="col-sm-10"><h2>{$towar['NazwaTowaru']}<h2></div>
  <div class="col-sm-2"><div class="btn-group-vertical" role="group">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2{$towar['IdTowar']}">Edytuj</button>
        {if $towar['Freeze']==1}<a type="button" class="btn btn-default" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/unfreeze/{$towar['IdTowar']}" role="button">Wprowadź do sprzedaży</a>{else}<a type="button" class="btn btn-default" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/freeze/{$towar['IdTowar']}" role="button">Wycofaj ze sprzedaży</a>{/if}

    	</div></div>
</div>  </div>

  <div class="panel-body">
    <div class="col-md-12">
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
      <th>W sprzedaży:</th><td>{if $towar['Freeze']==1}tak{else}nie{/if}</td>
    </tr>
    <tr>
      <th>Cena:</dt><th>{$towar['Cena']}zł</th>
      </tr>
    </table>
    <!-- <div class="btn-group-vertical" role="group">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2{$towar['IdTowar']}">Edytuj</button>
  		<a type="button" class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/zamroz/{$towar['IdTowar']}" role="button">Wycofaj ze sprzedaży</a>
  	</div> -->
  <!-- Modal -->
  <div id="myModal2{$towar['IdTowar']}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edycja</h4>
        </div>
        <div class="modal-body">
          <form action="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/edit/{$towar['IdTowar']}" method="post">
            <div class="form-group">
              <label for="NazwaTowaru">Nazwa Towaru :</label>

                <input type="text" class="form-control" id="NazwaTowaru" name="NazwaTowaru" placeholder="Wprowadz Nazwe Towaru" value="{$towar['NazwaTowaru']}">

            </div>
            <div class="form-group">
              <label  for="MinStanMagazynowy">Min Stan Magazynowy :</label>

                <input type="text" class="form-control" id="MinStanMagazynowy" name="MinStanMagazynowy" placeholder="Wprowadz Min Stan Magazynowy" value="{$towar['MinStanMagazynowy']}">

            </div>
            <div class="form-group">
              <label  for="MaxStanMagazynowy">Max Stan Magazynowy :</label>

                <input type="text" class="form-control" id="MaxStanMagazynowy" name="MaxStanMagazynowy" placeholder="Wprowadz Max Stan Magazynowy" value="{$towar['MaxStanMagazynowy']}">

            </div>
            <div class="form-group">
              <label  for="StawkaVat">stawka Vat :</label>

                <input type="text" class="form-control" id="StawkaVat" name="StawkaVat" placeholder="Wprowadz stawke Vat" value="{$towar['StawkaVat']}">

            </div>
            <div class="form-group">
              <label  for="KodTowaru">KodTowaru :</label>

                <input type="text" class="form-control" id="KodTowaru" name="KodTowaru" placeholder="Wprowadz KodTowaru" value="{$towar['KodTowaru']}">

            </div>
            <div class="form-group">
              <label  for="IdKategoria">Id Kategoria :</label>


                  <select class="form-control" id="IdKategoria" name="IdKategoria">
                    {foreach $tablicaKategorie as $kat}
                    <option value="{$kat['IdKategoria']}">{$kat['NazwaKategorii']}</option>
                    {/foreach}
                  </select>


            </div>
            <div class="form-group">
              <label  for="IdJednostkaMiary">jednostka miary :</label>

                <select class="form-control" id="IdJednostkaMiary" name="IdJednostkaMiary">
                  {foreach $tablicaJednostki as $jed}
                  <option value="{$jed['IdJednostkaMiary']}">{$jed['Nazwa2']}</option>
                  {/foreach}
                </select>

            </div>

            <input type="submit" value="Edytuj" class="btn btn-primary" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>

  <img src="http://chart.apis.google.com/chart?cht=lc&amp;chs=600x400&chd=t:14,7,13,19,30,36,40,49&chxt=x,y&chxl=0:|I|II|III|IV|V|" alt="" />

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
