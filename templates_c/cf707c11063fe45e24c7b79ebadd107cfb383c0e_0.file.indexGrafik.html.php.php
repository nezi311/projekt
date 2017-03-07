<?php
/* Smarty version 3.1.31, created on 2017-01-27 16:08:29
  from "/opt/lampp/htdocs/Aplikacja_PO/templates/indexGrafik.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_588b626d3e5002_81913314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf707c11063fe45e24c7b79ebadd107cfb383c0e' => 
    array (
      0 => '/opt/lampp/htdocs/Aplikacja_PO/templates/indexGrafik.html.php',
      1 => 1485529698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_588b626d3e5002_81913314 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
      <form class="form-horizontal" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Grafik/insert" method="POST" id="DodajElementHarmonogramu">
        <div class="form-group">
          <label class="control-label col-sm-2" for="pracownik">Pracownik :</label>
          <div class="col-sm-10">
            <select class="form-control" id='pracownik' name='pracownik'>
              <?php if (isset($_smarty_tpl->tpl_vars['tablicaPracownicy']->value)) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaPracownicy']->value, 'elementPracownik');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['elementPracownik']->value) {
?>
                <<option value="<?php echo $_smarty_tpl->tpl_vars['elementPracownik']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['elementPracownik']->value['imie'];?>
 &nbsp; <?php echo $_smarty_tpl->tpl_vars['elementPracownik']->value['nazwisko'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

              <?php }?>
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
            <input type="text" class="form-control" id="dostepnyod" name="dostepnyod" placeholder="08:00"> <!--  pattern="[0-9]<?php echo 2;?>
+\:+[0-9]<?php echo 2;?>
" -->
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="dostepnydo">Godzina zakończenia :</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="dostepnydo" name="dostepnydo"  placeholder="16:00"> <!-- pattern="[0-9]<?php echo 2;?>
+\:+[0-9]<?php echo 2;?>
" -->
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
<?php if (isset($_smarty_tpl->tpl_vars['tablicaGrafik']->value)) {?>
<table class="table">
  <h3><?php echo substr($_smarty_tpl->tpl_vars['tablicaGrafik']->value[0]['dzien'],0,7);?>
<h3>
  <thead>
    <tr>
      <th>Data</th><th>Imie</th><th>Nazwisko</th><th>Tytul</th><th>Od</th><th>Do</th><th>Rozpoczecie pracy</th><th>Zakonczenie pracy</th><th>Edytuj</th><th>Archiwizuj</th>
    </tr>
  </thead>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaGrafik']->value, 'grafik');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['grafik']->value) {
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['dzien'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['imie'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['nazwisko'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['tytul'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['dostepnyod'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['dostepnydo'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['rozpoczeciepracy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['grafik']->value['zakonczeniepracy'];?>
</td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Grafik/edit/<?php echo $_smarty_tpl->tpl_vars['grafik']->value['id'];?>
" role="button">Edytuj</a></td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Grafik/delete/<?php echo $_smarty_tpl->tpl_vars['grafik']->value['id'];?>
" role="button">Archiwizuj</a></td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</table>
<?php }
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
