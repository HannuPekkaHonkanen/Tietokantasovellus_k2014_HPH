<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!--
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        -->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">      

        <!--        <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                <meta name="author" content="">
                <link rel="shortcut icon" href="../../assets/ico/favicon.ico">-->

    </head>

    <body>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="frontPage.php#">KEITTOKIRJA</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php if (onKirjautunut()) { ?>
                        <li class="active"><a href="addRecipe.php#">Lisää resepti</a></li>
                        <?php } ?>
                        <li><a href="#">Linkki</a></li>
                        <!--
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        -->
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ruokalaji/raaka-aine/ateriakokonaisuus">
                        </div>
                        <button type="submit" class="btn btn-default">Hae</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (onKirjautunut()) { ?>
                            <li><a href="logout.php#">Kirjaudu ulos</a></li>
                            <li><a href="modifyUser.php#">Muokkaa tietojasi</a></li>
                            <li><a href="deleteUser.php#">Poista tunnuksesi</a></li>
                        <?php } else { ?>
                            <li><a href="addUser.php#">Rekisteröidy</a></li>
                            <li><a href="login.php#">Kirjaudu sisään</a></li>
                        <?php } ?>
                        <!--
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        -->

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div id="content">

           <?php if (isset($_SESSION["ilmoitus"])){
               echo $_SESSION["ilmoitus"];
               echo "<br><br>";
               unset($_SESSION["ilmoitus"]);
           }?>

            <?php require $sivu; ?>

        </div>
    </body>
</html>
