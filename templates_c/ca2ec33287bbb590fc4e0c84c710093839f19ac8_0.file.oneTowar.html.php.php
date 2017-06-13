<?php
/* Smarty version 3.1.31, created on 2017-06-13 14:58:25
  from "C:\xampp\htdocs\PZ\templates\oneTowar.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_593fe171655447_67407171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca2ec33287bbb590fc4e0c84c710093839f19ac8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PZ\\templates\\oneTowar.html.php',
      1 => 1497358702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_593fe171655447_67407171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow']->value) && !empty($_smarty_tpl->tpl_vars['tablicaTowarow']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
<div class="panel panel-primary">
  <div class="panel-heading"><div class="row">
  <div class="col-sm-10"><h2><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
<h2></div>
  <div class="col-sm-2"><div class="btn-group-vertical" role="group">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
">Edytuj</button>
        <?php if ($_smarty_tpl->tpl_vars['towar']->value['Freeze'] == 1) {?><a type="button" class="btn btn-default" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/unfreeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wprowadź do sprzedaży</a><?php } else { ?><a type="button" class="btn btn-default" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/freeze/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wycofaj ze sprzedaży</a><?php }?>

    	</div></div>
</div>  </div>

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
      <th>W sprzedaży:</th><td><?php if ($_smarty_tpl->tpl_vars['towar']->value['Freeze'] == 1) {?>nie<?php } else { ?>tak<?php }?></td>
    </tr>
    <tr>
      <th>Cena:</dt><th><?php echo $_smarty_tpl->tpl_vars['towar']->value['Cena'];?>
zł</th>
      </tr>
    </table>
    <!-- <div class="btn-group-vertical" role="group">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
">Edytuj</button>
  		<a type="button" class="btn btn-warning" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/zamroz/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" role="button">Wycofaj ze sprzedaży</a>
  	</div> -->
  <!-- Modal -->
  <div id="myModal2<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edycja</h4>
        </div>
        <div class="modal-body">
          <form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/edit/<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" method="post">
            <div class="form-group">
              <label for="NazwaTowaru">Nazwa Towaru :</label>

                <input type="text" class="form-control" id="NazwaTowaru" name="NazwaTowaru" placeholder="Wprowadz Nazwe Towaru" value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
">

            </div>
            <div class="form-group">
              <label  for="MinStanMagazynowy">Min Stan Magazynowy :</label>

                <input type="text" class="form-control" id="MinStanMagazynowy" name="MinStanMagazynowy" placeholder="Wprowadz Min Stan Magazynowy" value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['MinStanMagazynowy'];?>
">

            </div>
            <div class="form-group">
              <label  for="MaxStanMagazynowy">Max Stan Magazynowy :</label>

                <input type="text" class="form-control" id="MaxStanMagazynowy" name="MaxStanMagazynowy" placeholder="Wprowadz Max Stan Magazynowy" value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['MaxStanMagazynowy'];?>
">

            </div>
            <div class="form-group">
              <label  for="StawkaVat">stawka Vat :</label>

                <input type="text" class="form-control" id="StawkaVat" name="StawkaVat" placeholder="Wprowadz stawke Vat" value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
">

            </div>
            <div class="form-group">
              <label  for="KodTowaru">KodTowaru :</label>

                <input type="text" class="form-control" id="KodTowaru" name="KodTowaru" placeholder="Wprowadz KodTowaru" value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['KodTowaru'];?>
">

            </div>
            <div class="form-group">
              <label  for="IdKategoria">Id Kategoria :</label>


                  <select class="form-control" id="IdKategoria" name="IdKategoria">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaKategorie']->value, 'kat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kat']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['kat']->value['IdKategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['kat']->value['NazwaKategorii'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                  </select>


            </div>
            <div class="form-group">
              <label  for="IdJednostkaMiary">jednostka miary :</label>

                <select class="form-control" id="IdJednostkaMiary" name="IdJednostkaMiary">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaJednostki']->value, 'jed');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['jed']->value) {
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['jed']->value['IdJednostkaMiary'];?>
"><?php echo $_smarty_tpl->tpl_vars['jed']->value['Nazwa2'];?>
</option>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                </select>

            </div>

            <input type="submit" value="Edytuj" class="btn btn-primary" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>

  <!-- <img src="http://chart.apis.google.com/chart?cht=lc&amp;chs=600x400&chd=t:14,7,13,19,30,36,40,49&chxt=x,y&chxl=0:|I|II|III|IV|V|" alt="" /> -->

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
