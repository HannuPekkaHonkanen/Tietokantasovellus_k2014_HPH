<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php // foreach (Valmistusvaihe::haeVaiheetReseptiIDlla($data->resepti->getReseptiID()) as $vaihe) {   ?>
<?php require_once 'libs/models/Valmistusvaihe.php'; ?>

<?php foreach (Valmistusvaihe::haeVaiheetReseptiIDlla(1) as $vaihe) { ?>
    <h3><?php echo $vaihe->getNimi(); ?></h3>
    <?php echo $vaihe->getOhjeet(); ?><br><br>
    <!--TODO NÄYTÄ KUVA TAI OTA KOKONAAN RESEPTIN TIEDOISTA POIS-->
    <?php // echo $vaihe->getKuva(); ?>
    <!--<button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Muokkaa</button>-->
    <hr>
<?php } ?>

