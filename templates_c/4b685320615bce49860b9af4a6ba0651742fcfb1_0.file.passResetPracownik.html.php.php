<?php
/* Smarty version 3.1.31, created on 2017-06-05 20:25:18
  from "E:\xampp\htdocs\PZ\templates\passResetPracownik.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5935a20eb8bf37_95479958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b685320615bce49860b9af4a6ba0651742fcfb1' => 
    array (
      0 => 'E:\\xampp\\htdocs\\PZ\\templates\\passResetPracownik.html.php',
      1 => 1490318218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5935a20eb8bf37_95479958 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-header">
  <h1>Reset hasła pracownika</h1>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
  <div class="alert alert-danger" id="alert" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>
<div class="container">
  <form class="form-horizontal" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/reset" method="POST" id="ResetHasla">

    <div class="form-group" style="display:none;">
      <label class="control-label col-sm-2" for="id">Id:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="id" name="id" value=<?php echo $_smarty_tpl->tpl_vars['idPracownik']->value;?>
>
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


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
