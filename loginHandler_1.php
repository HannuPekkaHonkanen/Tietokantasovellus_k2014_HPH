<?php

require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";


if (empty($_POST["username"]) || empty($_POST["password"])) {
    /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
//    exit(); // Lopetetaan suoritus tähän. Kutsun voi sijoittaa myös naytaNakyma-funktioon, niin sitä ei tarvitse toistaa joka paikassa
}

$kayttaja = $_POST["username"];
$salasana = $_POST["password"];
$haettuKayttaja = Kayttaja::etsiKayttajaTunnuksilla($kayttaja, $salasana);

/* Tarkistetaan onko parametrina saatu oikeat tunnukset */
if ($kayttaja == "Hannu" && $salasana == "hannu123") {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella eteenpain. */
//    $tunnistettuKayttaja = Kayttaja::etsiKayttajaTunnuksilla($kayttaja, $salasana);
    $_SESSION['kirjautunut'] = $tunnistettuKayttaja;
    header('Location: listaustesti.php');
} else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
}
