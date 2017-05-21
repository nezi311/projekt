<?php
/* Smarty version 3.1.31, created on 2017-05-21 13:03:18
  from "C:\xampp\htdocs\PZ\templates\oneTowar.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_592173f6312649_75578332',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca2ec33287bbb590fc4e0c84c710093839f19ac8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\oneTowar.html.php',
      1 => 1493138149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_592173f6312649_75578332 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow']->value) && !empty($_smarty_tpl->tpl_vars['tablicaTowarow']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
<div class="panel panel-primary">
  <div class="panel-heading"><h2><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
<h2></div>
  <div class="panel-body">
    <div class="col-md-12">
		<table class="table">
      <tr>
	  <th>Stan magazynowy:</th><td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StanMagazynowyDysponowany'];?>
</td>
  </tr>
  <tr>
      <th>Min stan magazynowy:</th><td><?php echo $_smarty_tpl->tpl_vars['towar']->value['MinStanMagazynowy'];?>
</td>
    </tr>
    <tr>
    	<th>Max stan magazynowy:</th><td><?php echo $_smarty_tpl->tpl_vars['towar']->value['MaxStanMagazynowy'];?>
</td>
    </tr>
    <tr>
    	<th>Stawka vat:</th><td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
</td>
    </tr>
    <tr>
      <th>Kod towaru:</th><td><?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
</td>
    </tr>
    <tr>
      <th>Jednostkamiary:</th><td><?php echo $_smarty_tpl->tpl_vars['towar']->value['IdJednostkaMiary'];?>
</td>
    </tr>
    <tr>
      <th>W sprzedaży:</th><td><?php $_prefixVariable1 = 1;
$_tmp_array = isset($_smarty_tpl->tpl_vars['towar']) ? $_smarty_tpl->tpl_vars['towar']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['Freeze'] = $_prefixVariable1;
$_smarty_tpl->_assignInScope('towar', $_tmp_array);
if ($_prefixVariable1) {?>tak<?php } else { ?>nie<?php }?></td>
    </tr>
    <tr>
      <th>Cena:</dt><th><?php echo $_smarty_tpl->tpl_vars['towar']->value['Cena'];?>
zł</th>
      </tr>
    </table>
	<div class="btn-group" role="group">
		<a type="button" class="btn btn-primary" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/edit/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Edytuj</a>
		<a type="button" class="btn btn-warning" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/zamroz/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wycofaj ze sprzedaży</a>
	</div>
  <img src="http://chart.apis.google.com/chart?cht=lc&amp;chs=600x400&chd=t:14,7,13,19,30,36,40,49&chxt=x,y&chxl=0:|I|II|III|IV|V|" alt="" />

</div>

</h4>
  </div>
</div>
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
