<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Resepti.php";
$lisattavaResepti = Resepti::etsiReseptiIDlla((int) $_SESSION["reseptiID"]);
?>

<?php // foreach (Valmistusvaihe::haeVaiheetReseptiIDlla($lisattavaResepti->getReseptiID()) as $vaihe) {   ?>
<?php require_once 'libs/models/Valmistusvaihe.php'; ?>

<?php foreach (Valmistusvaihe::haeVaiheetReseptiIDlla($lisattavaResepti->getReseptiID()) as $vaihe) { ?>
    <h3><?php echo $vaihe->getNimi(); ?></h3>
    <?php echo $vaihe->getOhjeet(); ?><br><br>
    <?php // echo $vaihe->getKuva(); ?>
    <!--TODO NÄYTÄ KUVA TAI OTA KOKONAAN RESEPTIN TIEDOISTA POIS-->
    <!--<button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Muokkaa</button>-->
    <hr>
<?php } ?>

