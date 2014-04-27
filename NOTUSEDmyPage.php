<?php
require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

if (onKirjautunut()) {
    $kayttajaid = (int)$_SESSION["kirjautunutid"];
    $kayttaja = Kayttaja::etsiKayttajaIDlla($kayttajaid);
    echo "testing: kirjautunut käyttäjä: ";
    echo $kayttaja->getKayttajatunnus();
    $sivu = "omaKeittokirja.php";
    naytaNakyma($sivu);
} else {
    echo 'et ole kirjautunut';
}
