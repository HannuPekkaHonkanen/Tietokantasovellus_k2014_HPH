<?php
require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

if (onKirjautunut()) {
    $kayttajaid = (int)$_SESSION["kirjautunutid"];
    $kayttaja = Kayttaja::etsiKayttajaIDlla($kayttajaid);
$sivu = "muokkaakayttajaasivu.php";
naytaNakyma($sivu, array("kayttaja" => $kayttaja));
} else {
    echo 'et ole kirjautunut';
}
