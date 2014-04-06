<?php

require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";


if (empty($_POST["username"]) || empty($_POST["password"])) {
    /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
//    exit(); // Lopetetaan suoritus tähän. Kutsun voi sijoittaa myös naytaNakyma-funktioon, niin sitä ei tarvitse toistaa joka paikassa
}

$kayttajatunnus = $_POST["username"];
$salasana = $_POST["password"];
$haettuKayttaja = Kayttaja::etsiKayttajaTunnuksilla($kayttajatunnus, $salasana);
    echo $haettuKayttaja->getKayttajatunnus;
    echo "\x07";
    sleep(2);
    
/* Tarkistetaan onko parametrina saatu oikeat tunnukset */
if ($haettuKayttaja == NULL) {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    echo 'väärät tunnukset';
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
} else {
    $_SESSION["kirjautunutid"] = $haettuKayttaja->getKayttajaID();
//    $_SESSION["kirjautunut"] = $haettuKayttaja;
    header('Location: frontPage.php');
//    echo $haettuKayttaja->getKayttajatunnus;
}
