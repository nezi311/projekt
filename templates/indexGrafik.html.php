{include file="header.html.php"}

<div class="page-header">
	<h2>Grafik</h2>
</div>
<div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#formAdd">Dodaj do grafiku</a>
      </h4>
    </div>
    <div id="formAdd" class="panel-collapse collapse">
      <br>
      <form class="form-horizontal" action="http://{$smarty.server.HTTP_HOST}{$subdir}Grafik/insert" method="POST" id="DodajElementHarmonogramu">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pracownik">Pracownik :</label>
          <div class="col-sm-10">
            <select class="form-control" id='pracownik' name='pracownik'>
              {if isset($tablicaPracownicy)}
                {foreach $tablicaPracownicy as $elementPracownik}
                <<option value="{$elementPracownik['id']}">{$elementPracownik['imie']} &nbsp; {$elementPracownik['nazwisko']}</option>
                {/foreach}
              {/if}
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="data">Data :</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="data" name="data" placeholder="Wprowadz date">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="tytul">Tytuł :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tytul" name="tytul" placeholder="Praca indywidualna">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="dostepnyod">Godzna rozpoczęcia :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="dostepnyod" name="dostepnyod" placeholder="08:00"> <!--  pattern="[0-9]{2}+\:+[0-9]{2}" -->
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="dostepnydo">Godzina zakończenia :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="dostepnydo" name="dostepnydo"  placeholder="16:00"> <!-- pattern="[0-9]{2}+\:+[0-9]{2}" -->
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Dodaj</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
{if isset($tablicaGrafik)}
<table class="table">
  <h3>{$tablicaGrafik[0]['dzien']|substr:0:7}<h3>
  <thead>
    <tr>
      <th>Data</th><th>Imie</th><th>Nazwisko</th><th>Tytul</th><th>Od</th><th>Do</th><th>Rozpoczecie pracy</th><th>Zakonczenie pracy</th><th>Edytuj</th><th>Archiwizuj</th>
    </tr>
  </thead>

  {foreach $tablicaGrafik as $grafik}
  <tr>
    <td>{$grafik['dzien']}</td>
    <td>{$grafik['imie']}</td>
    <td>{$grafik['nazwisko']}</td>
    <td>{$grafik['tytul']}</td>
    <td>{$grafik['dostepnyod']}</td>
    <td>{$grafik['dostepnydo']}</td>
    <td>{$grafik['rozpoczeciepracy']}</td>
    <td>{$grafik['zakonczeniepracy']}</td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Grafik/edit/{$grafik['id']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Grafik/delete/{$grafik['id']}" role="button">Archiwizuj</a></td>
  </tr>
  {/foreach}
</table>
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
