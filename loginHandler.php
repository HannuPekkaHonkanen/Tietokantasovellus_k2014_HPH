<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";


if (empty($_POST["username"]) || empty($_POST["password"])) {
    $_SESSION["ilmoitus"] = "Sekä tunnus että salasana tulee antaa!";
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
}

$kayttajatunnus = $_POST["username"];
$salasana = $_POST["password"];
$haettuKayttaja = Kayttaja::etsiKayttajaTunnuksilla($kayttajatunnus, $salasana);
echo $haettuKayttaja->getKayttajatunnus;
echo "\x07";
sleep(2);

/* Tarkistetaan onko parametrina saatu oikeat tunnukset */
if ($haettuKayttaja == NULL) {
    /* TODO Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    echo 'väärät tunnukset';
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
} else {
    $_SESSION["kirjautunutid"] = $haettuKayttaja->getKayttajaID();
//    $_SESSION["kirjautunut"] = $haettuKayttaja;
    header('Location: frontPage.php');
//    echo $haettuKayttaja->getKayttajatunnus;
}
