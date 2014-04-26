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

<h2 class="form-signin-heading"><?php echo $lisattavaResepti->getNimi(); ?></h2>

<?php echo $lisattavaResepti->getKuvaus(); ?>

<h4>Raaka-aineluokitus: <?php echo $lisattavaResepti->getRaakaaineluokitus(); ?></h4>

<h4>Käyttötilanneluokitus: <?php echo $lisattavaResepti->getKayttotilanneluokitus(); ?></h4>

<h4>Annosmäärä: <?php echo $lisattavaResepti->getAnnosmaara(); ?></h4>

<!--TODO NÄYTÄ KUVA TAI OTA KOKONAAN RESEPTIN TIEDOISTA POIS<input type="text" name="picture" class="form-control" placeholder="(URL-osoite)" value="<?php // echo $lisattavaResepti->getKuva();   ?>"/>-->

