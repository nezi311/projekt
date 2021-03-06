{include file="header.html.php"}
<div class="page-header">
  <h1>Zamow Towar</h1>
</div>

  {if isset($error)}
    <div class="alert alert-danger" id="alert" role="alert">{$error}</div>
  {/if}
<div class="container">
  <form class="form-horizontal" action="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/insert" method="POST" id="DodajTowar">
    <div class="form-group">
      <label class="control-label col-sm-2" for="NazwaTowaru">Nazwa Towaru :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="NazwaTowaru" name="NazwaTowaru" placeholder="Wprowadz Nazwe Towaru">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="MinStanMagazynowy">Min Stan Magazynowy :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="MinStanMagazynowy" name="MinStanMagazynowy" placeholder="Wprowadz Min Stan Magazynowy">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="MaxStanMagazynowy">Max Stan Magazynowy :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="MaxStanMagazynowy" name="MaxStanMagazynowy" placeholder="Wprowadz Max Stan Magazynowy">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="StawkaVat">stawka Vat :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="StawkaVat" name="StawkaVat" placeholder="Wprowadz stawke Vat">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="KodTowaru">KodTowaru :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="KodTowaru" name="KodTowaru" placeholder="Wprowadz KodTowaru">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="IdKategoria">Kategoria :</label>
      <div class="col-sm-10">
        <select class="form-control" id="IdKategoria" name="IdKategoria">
          {foreach $tablicaKategorie as $kat}
          <option value="{$kat['IdKategoria']}">{$kat['NazwaKategorii']}</option>
          {/foreach}
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="IdJednostkaMiary">Jednostka miary :</label>
      <div class="col-sm-10">
        <select class="form-control" id="IdJednostkaMiary" name="IdJednostkaMiary">
          {foreach $tablicaJednostki as $jed}
          <option value="{$jed['IdJednostkaMiary']}">{$jed['Nazwa2']}</option>
          {/foreach}
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Dodaj</button>
      </div>
    </div>
  </form>
</div>


{include file="footer.html.php"}
