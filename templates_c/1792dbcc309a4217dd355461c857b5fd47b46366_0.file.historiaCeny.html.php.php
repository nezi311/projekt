<?php
/* Smarty version 3.1.31, created on 2017-06-06 17:47:26
  from "/opt/lampp/htdocs/PZ/templates/historiaCeny.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5936ce8ee27ce6_21568730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1792dbcc309a4217dd355461c857b5fd47b46366' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/historiaCeny.html.php',
      1 => 1496764042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5936ce8ee27ce6_21568730 (Smarty_Internal_Template $_smarty_tpl) {
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

		  <div class="table-responsive">
					<table class="table">
						<thead>
								<th>Cena</th>
								<th>Cennik od</th>
								<th>Cennik do</th>
								<th>Opis</th>
								<th>Aktywny</th>
								<th>Zmień aktywność</th>
						</thead>
						<tbody>
							<?php if (isset($_smarty_tpl->tpl_vars['cennik']->value)) {?>
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cennik']->value, 'cen');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cen']->value) {
?>
											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['cen']->value[2];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cen']->value[3];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cen']->value[4];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cen']->value[6];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['cen']->value[5];?>
</td>
												<td>
													<a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cennik/zmienStanAktywnosc/<?php echo $_smarty_tpl->tpl_vars['cen']->value[0];?>
">Zmień</a>
												</td>
											</tr>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

							<?php }?>
					</tbody>
				</table>
			</div>










</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
