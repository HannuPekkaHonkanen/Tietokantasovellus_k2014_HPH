<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

// tata ei tarvita koska lomake ei anna jattaa kenttia tyhjiksi
if (empty($_POST["username"]) || empty($_POST["password"])) {
    $_SESSION["ilmoitus"] = "Sekä tunnus että salasana tulee antaa!";
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
}

$kayttajatunnus = $_POST["username"];
$salasana = $_POST["password"];
$haettuKayttaja = Kayttaja::etsiKayttajaTunnuksilla($kayttajatunnus, $salasana);

if ($haettuKayttaja == NULL) {
    
    $_SESSION["ilmoitus"] = "Annoit väärät tunnukset!";
    $sivu = "kirjautumissivu.php";
    naytaNakyma($sivu);
    
} else {
    
    $_SESSION["kirjautunutid"] = $haettuKayttaja->getKayttajaID();
    header('Location: frontPage.php');
    
}
