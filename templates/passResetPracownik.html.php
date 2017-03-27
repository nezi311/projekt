{include file="header.html.php"}
<div class="page-header">
  <h1>Reset hasła pracownika</h1>
</div>
{if isset($error)}
  <div class="alert alert-danger" id="alert" role="alert">{$error}</div>
{/if}
<div class="container">
  <form class="form-horizontal" action="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/reset" method="POST" id="ResetHasla">

    <div class="form-group" style="display:none;">
      <label class="control-label col-sm-2" for="id">Id:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="id" name="id" value={$idPracownik}>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="haslo1">Nowe hasło :</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="haslo1" name="haslo1" placeholder="Wprowadź hasło">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="haslo2">Powtórz hasło :</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="haslo2" name="haslo2" placeholder="Powtórz hasło">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Resetuj</button>
      </div>
    </div>
  </form>
</div>


{include file="footer.html.php"}
