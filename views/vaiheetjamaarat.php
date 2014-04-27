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

<?php // foreach (Valmistusvaihe::haeVaiheetReseptiIDlla($lisattavaResepti->getReseptiID()) as $vaihe) {   ?>
<?php require_once 'libs/models/Valmistusvaihe.php'; ?>

<?php foreach (Valmistusvaihe::haeVaiheetReseptiIDlla($lisattavaResepti->getReseptiID()) as $vaihe) { ?>
    <hr>
    <h4><?php echo $vaihe->getNimi(); ?></h4>
    <?php echo $vaihe->getOhjeet(); ?><br><br>
    <?php // echo $vaihe->getKuva(); ?>
    <!--TODO NÄYTÄ KUVA TAI OTA KOKONAAN RESEPTIN TIEDOISTA POIS-->
    <!--<button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Muokkaa</button>-->

    <!--<h4 class="form-signin-heading">Vaiheen raaka-aineet ja niiden määrät:</h4>-->

    <table class="table table-striped">
        <thead>
            <tr>
                <!--<th>#</th>-->
                <th>Raaka-aine</th>
                <th>Määrä</th>
                <th>Yksikkö</th>
                <!--<th>TODOmuokkaa???</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach (Maara::haeMaaratReseptiIDllaJaVaiheNROlla((int) $_SESSION["reseptiID"], (int) $vaihe->getVaihenumero()) as $maara) { ?>
                <tr>
                        <!--<td>1</td>-->
                <!--<td><A href="recipe.php?id=<?php // echo $resepti->getReseptiID();    ?>"><?php // echo $resepti->getNimi();    ?></A></td>-->
                               <td><?php echo Raakaaine::haeNimiRaakaaineIDlla($maara->getRaakaaineID()); ?></td>
                          <td><?php echo $maara->getMaara(); ?></td>
                          <td><?php echo $maara->getMittayksikko(); ?></td>
                        <!--<td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> TODOmuokkaa???</button></td>-->
                </tr>
            <?php } ?>
        </tbody>
    </table>

<!--    <br>-->

<?php } ?>

