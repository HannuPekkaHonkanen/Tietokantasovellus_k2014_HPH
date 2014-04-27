<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Resepti.php";
require_once "libs/models/Valmistusvaihe.php";
require_once "libs/models/Maara.php";
require_once "libs/models/Raakaaine.php";
$lisattavaResepti = Resepti::etsiReseptiIDlla((int) $_SESSION["reseptiID"]);
?>

<?php  $vaihe=Valmistusvaihe::haeVaiheReseptiIDllaJaVaiheNROlla((int) $_SESSION["reseptiID"], (int) $_SESSION["vaiheNRO"]); ?>
    <hr>
    <h4><?php echo $vaihe->getNimi(); ?></h4>
    <?php echo $vaihe->getOhjeet(); ?><br><br>
    <?php // echo $vaihe->getKuva(); ?>
    <!--TODO NÄYTÄ KUVA TAI OTA KOKONAAN RESEPTIN TIEDOISTA POIS-->
    <!--<button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Muokkaa</button>-->

    <!--<h4 class="form-signin-heading">Vaiheen raaka-aineet ja niiden määrät:</h4>-->


