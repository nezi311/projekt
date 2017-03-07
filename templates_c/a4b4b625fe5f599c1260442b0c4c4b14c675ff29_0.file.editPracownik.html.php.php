<?php
/* Smarty version 3.1.31, created on 2017-03-07 18:50:21
  from "/opt/lampp/htdocs/Aplikacja_PO/templates/editPracownik.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58bef2dda31d28_22766781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4b4b625fe5f599c1260442b0c4c4b14c675ff29' => 
    array (
      0 => '/opt/lampp/htdocs/Aplikacja_PO/templates/editPracownik.html.php',
      1 => 1488909020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58bef2dda31d28_22766781 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-header">
  <h1>Edytuj dane pracownika</h1>
</div>


<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
  <h2><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h2>
<?php } else { ?>
  <?php if (isset($_smarty_tpl->tpl_vars['tablicaPracownik']->value)) {?>

  <div class="container">
    <form class="form-horizontal" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/update" method="POST" id="UpdatePracownika">
      <div class="form-group">
        <label class="control-label col-sm-2" for="imie">Imię :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="imie" name="imie" placeholder="Wprowadz imię" value=<?php echo $_smarty_tpl->tpl_vars['tablicaPracownik']->value[0]['imie'];?>
>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="nazwisko">Nazwisko :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Wprowadz nazwisko" value=<?php echo $_smarty_tpl->tpl_vars['tablicaPracownik']->value[0]['nazwisko'];?>
>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="dzial">Dział :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="dzial" name="dzial" placeholder="Wprowadz dzial" value=<?php echo $_smarty_tpl->tpl_vars['tablicaPracownik']->value[0]['dzial'];?>
>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="stanowisko">Stanowisko :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="stanowisko" name="stanowisko" placeholder="Wprowadz stanowisko" value=<?php echo $_smarty_tpl->tpl_vars['tablicaPracownik']->value[0]['stanowisko'];?>
>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="telefon">Telefon :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="telefon" name="telefon" placeholder="Wprowadz nr telefonu" value=<?php echo $_smarty_tpl->tpl_vars['tablicaPracownik']->value[0]['telefon'];?>
>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="login">Login :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadz login" value=<?php echo $_smarty_tpl->tpl_vars['tablicaPracownik']->value[0]['login'];?>
>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="uprawnienia">Uprawnienia :</label>
        <div class="col-sm-10">
          <select class="form-control" id="uprawnienia" name="uprawnienia">
            <?php if ($_smarty_tpl->tpl_vars['tablicaPracownik']->value[0]['uprawnienia'] == "Sprzedawca") {?>
              <option value="1">Kierownik sprzedaży</option>
              <option value="2"  selected>Sprzedawca</option>
            <?php } else { ?>
              <option value="1" selected>Kierownik sprzedaży</option>
              <option value="2">Sprzedawca</option>
            <?php }?>
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
  <?php }
}?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
