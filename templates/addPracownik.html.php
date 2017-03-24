{include file="header.html.php"}
<div class="page-header">
  <h1>Dodaj Pracownika</h1>
</div>

  {if isset($error)}
    <div class="alert alert-danger" id="alert" role="alert">{$error}</div>
  {/if}
<div class="container">
  <form class="form-horizontal" action="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/insert" method="POST" id="DodajPracownika">
    <div class="form-group">
      <label class="control-label col-sm-2" for="imie">Imię :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="imie" name="imie" placeholder="Wprowadz imię">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nazwisko">Nazwisko :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Wprowadz nazwisko">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="dzial">Dział :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="dzial" name="dzial" placeholder="Wprowadz dzial">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="stanowisko">Stanowisko :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="stanowisko" name="stanowisko" placeholder="Wprowadz stanowisko">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="telefon">Telefon :</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="telefon" name="telefon" placeholder="Wprowadz nr telefonu">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="login">Login :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadz login">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="haslo">Haslo :</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="haslo" name="haslo" placeholder="Wprowadz hasło">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="uprawnienia">Uprawnienia :</label>
      <div class="col-sm-10">
        <select class="form-control" id="uprawnienia" name="uprawnienia">
          <option value="1">Kierownik sprzedaży</option>
          <option value="2">Sprzedawca</option>
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
