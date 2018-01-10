<?php
/* Smarty version 3.1.31, created on 2018-01-01 18:04:10
  from "C:\xampp\htdocs\PZ\templates\indexZamowienia.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a4a6a0ae94ab7_62395591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5773aa0108f3becd55e52832c057bd604716290' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\indexZamowienia.html.php',
      1 => 1494345239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a4a6a0ae94ab7_62395591 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Min Stan Magazynowy</th><th>Max Stan Magazynowy</th><th>Stawka Vat</th><th>Kategoria</th><th>Jednostka Miary</th><th>Status</th><th>Edytuj</th><th>Anuluj</th>
    </tr>
  </thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaZamowien']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaZamowien']->value, 'zamowienie');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['zamowienie']->value) {
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['NazwaTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['MinStanMagazynowy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['MaxStanMagazynowy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['StawkaVat'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['IdKategoria'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['IdJednostkaMiary'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['zamowienie']->value['Status'];?>
</td>
    <td><a href="" role="button">Edytuj</a></td>
    <td><a href="" role="button">Anuluj</a></td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>
</table>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
