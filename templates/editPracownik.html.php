{include file="header.html.php"}
<div class="page-header">
  <h1>Edytuj dane pracownika</h1>
</div>


{if isset($error)}
  <h2>{$error}</h2>
{else}
  {if isset($tablicaPracownik)}


  <div class="container">
    <form class="form-horizontal" action="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/update" method="POST" id="UpdatePracownika">
      <div class="form-group">
        <label class="control-label col-sm-2" for="imie">Imię :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="imie" name="imie" placeholder="Wprowadz imię" value={$tablicaPracownik[0]['imie']}>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="nazwisko">Nazwisko :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Wprowadz nazwisko" value={$tablicaPracownik[0]['nazwisko']}>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="dzial">Dział :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="dzial" name="dzial" placeholder="Wprowadz dzial" value={$tablicaPracownik[0]['dzial']}>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="stanowisko">Stanowisko :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="stanowisko" name="stanowisko" placeholder="Wprowadz stanowisko" value={$tablicaPracownik[0]['stanowisko']}>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="telefon">Telefon :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="telefon" name="telefon" placeholder="Wprowadz nr telefonu" value={$tablicaPracownik[0]['telefon']}>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="login">Login :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadz login" value={$tablicaPracownik[0]['login']}>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="uprawnienia">Uprawnienia :</label>
        <div class="col-sm-10">
          <select class="form-control" id="uprawnienia" name="uprawnienia">
              <option value="1" selected>Kierownik sprzedaży</option>
              <option value="2">Sprzedawca</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Zmień</button>
        </div>
      </div>
    </form>
  </div>
  {/if}
{/if}


{include file="footer.html.php"}
