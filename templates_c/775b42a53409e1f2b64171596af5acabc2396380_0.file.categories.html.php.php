<?php
/* Smarty version 3.1.31, created on 2017-04-25 14:20:25
  from "/opt/lampp/htdocs/PZ/templates/categories.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ff3f092d8c28_05725146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '775b42a53409e1f2b64171596af5acabc2396380' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/categories.html.php',
      1 => 1493122785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ff3f092d8c28_05725146 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
<div class="page-header">
<h1>Lista kategorii</h1>
</div>
<?php if (count($_smarty_tpl->tpl_vars['allKategorie']->value) === 0) {?>
	<div class="alert alert-danger" role="alert">Brak kategorii w bazie!</div>
<?php } else { ?>
<table class="table sortable">
	<thead>
		<tr>
			<th>Nazwa kategorii</th>
			<th>Liczba towarów</th>
			<th class="sorttable_nosort">Działanie</th>
		</tr>
	</thead>
	<tbody>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allKategorie']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
		<tr>
			<th><?php echo $_smarty_tpl->tpl_vars['category']->value['NazwaKategorii'];?>
</th>
			<td><?php echo $_smarty_tpl->tpl_vars['category']->value['ilosc'];?>
</td>

			<td>
          <div class="btn-group" role="group">
        <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['category']->value['IdKategoria'];?>
">zmień nazwę</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal<?php echo $_smarty_tpl->tpl_vars['category']->value['NazwaKategorii'];?>
">Usuń</button>
</td>
<div id="myModal<?php echo $_smarty_tpl->tpl_vars['category']->value['IdKategoria'];?>
" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edycja</h4>
      </div>
      <div class="modal-body">

                    <form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/Edytuj/<?php echo $_smarty_tpl->tpl_vars['category']->value['IdKategoria'];?>
" method="post">
                        <div class="form-group">
                        <label for="name">Nazwa kategorii</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['NazwaKategorii'];?>
" />
                        </div>
                        <input type="submit" value="Zmień nazwę" class="btn btn-primary" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                    </form>

      </div>
    </div>
  </div>
</div>

			<?php if ($_smarty_tpl->tpl_vars['category']->value['ilosc'] > 0) {?>
			<div class="modal fade" id="Modal<?php echo $_smarty_tpl->tpl_vars['category']->value['NazwaKategorii'];?>
" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="gridSystemModalLabel">Usuwanie kategori</h4>
			      </div>
			      <div class="modal-body">
							Nie można usunąć kategorii <strong><?php echo $_smarty_tpl->tpl_vars['category']->value['NazwaKategorii'];?>
</strong>, ponieważ znajdują się w niej towary
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<?php } else { ?>
			<div class="modal fade" id="Modal<?php echo $_smarty_tpl->tpl_vars['category']->value['NazwaKategorii'];?>
" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="gridSystemModalLabel">Usuwanie kategori</h4>
			      </div>
			      <div class="modal-body">
							Czy na pewno chcesz usunąć kategorię <strong><?php echo $_smarty_tpl->tpl_vars['category']->value['NazwaKategorii'];?>
</strong>?
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
			        <a type="button" class="btn btn-warning" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/Usun/<?php echo $_smarty_tpl->tpl_vars['category']->value['IdKategoria'];?>
">usuń</a>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<?php }?>
		</tr>
		 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	</tbody>
</table>

<?php }?>
<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Dodaj kategorię
</a>
<div class="collapse" id="collapseExample">
  <div class="well">
		<form id="addcategory" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria/Wstaw/" method="post">
		    <div class="form-group">
		    <label for="name">Nowa kategoria</label>
		    <input type="text" class="form-control" name="nazwa" placeholder="Wprowadź nazwę kategorii"/>
		    </div>
		    <input type="submit" value="Dodaj" class="btn btn-default" />
		</form>
  </div>
</div>
<br/><br/>



</div>


<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>

<?php }
$_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
