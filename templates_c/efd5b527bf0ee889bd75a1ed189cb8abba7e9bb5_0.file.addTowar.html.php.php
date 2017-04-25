<?php
/* Smarty version 3.1.31, created on 2017-04-25 18:13:48
  from "C:\xampp\htdocs\PZ\templates\addTowar.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ff75bcb401c2_25539551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efd5b527bf0ee889bd75a1ed189cb8abba7e9bb5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\addTowar.html.php',
      1 => 1492983111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ff75bcb401c2_25539551 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-header">
  <h1>Zamow Towar</h1>
</div>

  <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <div class="alert alert-danger" id="alert" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
  <?php }?>
<div class="container">
  <form class="form-horizontal" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/insert" method="POST" id="DodajTowar">
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
      <label class="control-label col-sm-2" for="IdKategoria">Id Kategoria :</label>
      <div class="col-sm-10">
        <select class="form-control" id="IdKategoria" name="IdKategoria">
          <option value="1">elektronika</option>
          <option value="2">inne</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="IdJednostkaMiary">jednostka miary :</label>
      <div class="col-sm-10">
        <select class="form-control" id="IdJednostkaMiary" name="IdJednostkaMiary">
          <option value="1">sztuka</option>
          <option value="2">litr</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Cena">Cena :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Cena" name="Cena" placeholder="Wprowadz Cene">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Dodaj</button>
      </div>
    </div>
  </form>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
