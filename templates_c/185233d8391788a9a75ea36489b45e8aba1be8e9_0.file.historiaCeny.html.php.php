<?php
/* Smarty version 3.1.31, created on 2017-06-06 13:24:12
  from "E:\xampp\htdocs\PZ\templates\historiaCeny.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593690dcf30402_66809178',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '185233d8391788a9a75ea36489b45e8aba1be8e9' => 
    array (
      0 => 'E:\\xampp\\htdocs\\PZ\\templates\\historiaCeny.html.php',
      1 => 1496748251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_593690dcf30402_66809178 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<?php if (isset($_smarty_tpl->tpl_vars['cennik']->value)) {?>
		<h2>Historia ceny dla towaru : <?php echo $_smarty_tpl->tpl_vars['cennik']->value[0]['NazwaTowaru'];?>
</h2>
	<?php }?>
</div>
<div class="container">
	<?php if (isset($_smarty_tpl->tpl_vars['error']->value) && $_smarty_tpl->tpl_vars['error']->value != '') {?>
	<div class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
	<?php }?>
					<table class="table">
						<thead>
							<tr>
								<th>Obecna Cena</th>
								<th>Cennik od</th>
								<th>Cennik do</th>
								<th>Opis</th>
								<th>Aktualny</th>
								<th>Zmień aktywność</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cennik']->value, 'hstcn');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['hstcn']->value) {
?>
										<tr>
											<td><?php echo $_smarty_tpl->tpl_vars['hstcn']->value['cena'];?>
<td>
											<td><?php echo $_smarty_tpl->tpl_vars['hstcn']->value['dataOd'];?>
<td>
											<td><?php echo $_smarty_tpl->tpl_vars['hstcn']->value['dataDo'];?>
<td>
											<td><?php echo $_smarty_tpl->tpl_vars['hstcn']->value['opis'];?>
<td>
											<td><?php echo $_smarty_tpl->tpl_vars['hstcn']->value['aktualny'];?>
<td>
											<td><a class="btn" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cennik/zmienStanAktywnosci/<?php echo $_smarty_tpl->tpl_vars['hstcn']->value['idCennik'];?>
">Zmień</a><td>
										</tr>

							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

						</tbody>
					</table>











</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
