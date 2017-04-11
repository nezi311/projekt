<html>
    <head>
        <title>Sklep hurtowni SZPUNAR</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Latest compiled and minified JavaScript -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
          <script src="http://{$smarty.server.HTTP_HOST}{$subdir}/js/jquery.min.js"></script>
          <script src="http://{$smarty.server.HTTP_HOST}{$subdir}/js/jquery-ui.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- css -->
          <!-- Custom css -->
          <link rel="stylesheet" href="http://{$smarty.server.HTTP_HOST}{$subdir}css/custom.css">
          <link rel="stylesheet" href="http://{$smarty.server.HTTP_HOST}{$subdir}css/jquery-ui.min.css">
        <link href="http://{$smarty.server.HTTP_HOST}{$subdir}css/bootstrap.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Jakieś logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
<!-- To co ma Bartek -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">


          <!-- To co ma Bartek -->


            <li class="dropdown">
                  <a href="#" class="dropdown-toggle glyphicon glyphicon-book" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Zarządzanie Towarami <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar" class="glyphicon glyphicon-list-alt"> Lista Towarów</a></li>
                    <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/freeze" class="glyphicon glyphicon-list-alt"> Zamrożone Towary</a></li>
                    <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/add" class="glyphicon glyphicon-plus"> Dodaj Towar</a></li>
                    <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Zamowienie" class="glyphicon glyphicon-list-alt"> Zamowione Towary</a></li>
                  </ul>

                </li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Kategoria">Kategoria</a></li>


            </li>



                    {if $smarty.session.role<=1}
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Zarządzanie użytkownikami<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy" class="glyphicon glyphicon-user"> Pracownicy</a></li>
                            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/add" class="glyphicon glyphicon-plus"> Dodaj pracownika</a></li>
                          </ul>
                        </li>
                    {/if}
                    <form class="navbar-form navbar-left" action="http://{$smarty.server.HTTP_HOST}{$subdir}Szukaj/" method="post">
                      <div class="form-group">
                        <input type="text" name="towar" class="form-control" placeholder="Wpisz nazwę produktu">
                      </div>
                      <button type="submit" class="btn btn-default">Szukaj</button>
                    </form>
      </ul>

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Zamówienie</a></li>
                  <li><a href="#">Historia</a></li>
                  {if !isset($smarty.session.login)}
                    <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}AccessRoles/logform">Zaloguj</a></li>
                  {else}

                    <li><a href='http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/passReset'>{$smarty.session.login}</a></li>
                    <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}AccessRoles/logout">Wyloguj</a></li>
                  {/if}
                </ul>


              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
</nav>
<body>

<div id="wrap">
  <div class="row center-block">
    <div class="col-md-12">
