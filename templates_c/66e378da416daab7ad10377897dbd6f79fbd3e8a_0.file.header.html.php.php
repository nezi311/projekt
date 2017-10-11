<?php
/* Smarty version 3.1.31, created on 2017-10-04 16:52:42
  from "/opt/lampp/htdocs/PZ/templates/header.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d4f5badcaf15_53357782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66e378da416daab7ad10377897dbd6f79fbd3e8a' => 
    array (
      0 => '/opt/lampp/htdocs/PZ/templates/header.html.php',
      1 => 1507127201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d4f5badcaf15_53357782 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title>Sklep hurtowni SZPUNAR</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Latest compiled and minified JavaScript -->
        <?php echo '<script'; ?>
 src="http://code.jquery.com/jquery-latest.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.min.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery-ui.min.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/sorttable.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/stat.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/collapsiderHide.js"><?php echo '</script'; ?>
>
          <!-- Bootstrap -->
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
vendor/twbs/bootstrap/dist/js/bootstrap.min.js" ><?php echo '</script'; ?>
>
      <!-- <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"><?php echo '</script'; ?>
> -->
        <!-- css -->
          <!-- Custom css -->
          <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/custom.css">
          <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/jquery-ui.min.css">
          <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/bootstrap.css" rel="stylesheet">
          <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

          <?php echo '<script'; ?>
>
$(document).ready(function() {
    $('#datyFaktura').formValidation({
        framework: 'bootstrap',
        err: {
            container: '#messages'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            dataSprzedazy: {
                validators: {
                    notEmpty: {
                        message: 'Wybierz datę.'
                    },
                    greaterThan: {
                      value: 2000-02-02,
                      message: 'The value must be greater than or equal to 18'
                    },
                    date: {
                      format: 'YYYY/MM/DD',
                      message: 'The value is not a valid date'
                    },
                    callback: {
                        message: 'The date is not in the range',
                        callback: function(value, validator) {
                            var m = new moment(value, 'YYYY/MM/DD', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            return m.isAfter('2020/01/01') && m.isBefore('2020/12/30');
                        }
                }
            },
            dataZaplaty: {
                validators: {
                    notEmpty: {
                        message: 'Wybierz datę.'
                    },
                    greaterThan: {
                      value: 2000-02-02,
                      message: 'The value must be greater than or equal to 18'
                    },
                    date: {
                      format: 'YYYY/MM/DD',
                      message: 'The value is not a valid date'
                    },
                    callback: {
                        message: 'The date is not in the range',
                        callback: function(value, validator) {
                            var m = new moment(value, 'YYYY/MM/DD', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            return m.isAfter('2020/01/01') && m.isBefore('2020/12/30');
                        }
                }
            }
        }
    });
});
<?php echo '</script'; ?>
>
        <!-- awaryjny bootstrap-->
        <!-- Latest compiled and minified CSS -->
        <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <!-- Optional theme -->
        <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

    </head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" style="font-family: comic, forte, century gothic" href="#">Szpunar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
<!-- To co ma Bartek -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">


          <!-- To co ma Bartek -->


            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-book"></span> Towary<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar" class="glyphicon glyphicon-list-alt"> Lista Towarów</a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/freeze" class="glyphicon glyphicon-list-alt"> Zamrożone Towary</a></li>
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/add" class="glyphicon glyphicon-plus"> Dodaj Towar</a></li>
                    <!-- <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienie" class="glyphicon glyphicon-list-alt"> Zamowione Towary</a></li> -->
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Cennik" class="glyphicon glyphicon-list-alt"> Cennik towarów</a></li>

                  </ul>

                </li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Kategoria"><span class="glyphicon glyphicon-list-alt"></span> Kategorie</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Statystyka"><span class="glyphicon glyphicon-signal"></span> Zestawienia</a></li>


            </li>



                    <form class="navbar-form navbar-left" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Szukaj/" method="post">
                      <div class="form-group">
                        <input type="text" name="towar" id="towar" class="form-control" placeholder="Wpisz nazwę produktu">
                      </div>
                      <button type="submit" class="btn btn-default">Szukaj</button>
                    </form>
      </ul>

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zamowienia"><span class="glyphicon glyphicon-barcode"></span> Zamówienia klientów</a></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Koszyk"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                  <!--<li><a href="#"><span class="glyphicon glyphicon-time"></span> Historia</a></li>-->


                                      <?php if ($_SESSION['role'] <= 1) {?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                              <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy" class="glyphicon glyphicon-user"> Pracownicy</a></li>
                                              <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/add" class="glyphicon glyphicon-plus"> Dodaj pracownika</a></li>
                                              <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient" class="glyphicon glyphicon-user"> Klienci</a></li>
                                            </ul>
                                          </li>
                                      <?php }?>
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-cog"></span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <?php if (!isset($_SESSION['login'])) {?>
                            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
AccessRoles/logform">Zaloguj</a></li>
                          <?php } else { ?>

                            <li><a href='http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/passReset'><?php echo $_SESSION['login'];?>
</a></li>
                            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
AccessRoles/logout">Wyloguj</a></li>
                          <?php }?>

                      </li>
                </ul>

              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
</nav>
<body>

<div id="wrap">
  <div class="row center-block">
    <div class="col-md-12">
<?php }
}
