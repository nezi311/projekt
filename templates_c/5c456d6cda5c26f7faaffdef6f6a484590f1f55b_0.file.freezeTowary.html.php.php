<?php
/* Smarty version 3.1.31, created on 2017-04-11 15:00:47
  from "/opt/lampp/htdocs/PZ/templates/freezeTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ecd37fc4b0c5_75331888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c456d6cda5c26f7faaffdef6f6a484590f1f55b' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/freezeTowary.html.php',
      1 => 1491915414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ecd37fc4b0c5_75331888 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Min Stan Magazynowy</th><th>Max Stan Magazynowy</th><th>Stan Magazynowy Rzeczywisty</th><th>Stan Magazynowy Dysponowany</th><th>Stawka Vat</th><th>Kod Towaru</th><th>Kategoria</th><th>Jednostka Miary</th><th>Stan</th><th>Edytuj</th><th>Odmroz</th><th>usun</th>
    </tr>
  </thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow2']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow2']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['MinStanMagazynowy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['MaxStanMagazynowy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyRzeczywisty'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['IdKategoria'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['IdJednostkaMiary'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Freeze'];?>
</td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/edit/<?php echo $_smarty_tpl->tpl_vars['pracownik']->value['id'];?>
" role="button">Edytuj</a></td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/zmienAktywnosc/<?php echo $_smarty_tpl->tpl_vars['pracownik']->value['id'];?>
" role="button">Odmroź</a></td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/delete/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Usuń</a></td>
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
