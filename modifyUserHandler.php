<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

//echo 'kukkuu';

//if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"])) {
//    /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
//    $sivu = "rekisteroitymissivu.php";
//
//    $kayttaja = new Kayttaja();
////$kayttaja->setKayttajaID($tulos->kayttajaid);
////    $kayttaja->setKayttajatunnus("testin");
////    $kayttaja->setSalasana("testin");
////    $kayttaja->setSahkoposti("testin");
////naytaNakyma($sivu, array("kayttaja" => new Kayttaja()));
//    naytaNakyma($sivu, array("kayttaja" => $kayttaja));
////    exit(); // Lopetetaan suoritus tähän. Kutsun voi sijoittaa myös naytaNakyma-funktioon, niin sitä ei tarvitse toistaa joka paikassa
//}
//$kayttajatunnus = $_POST["username"];
//$salasana = $_POST["password"];
//$sahkoposti = $_POST["email"];
//            $kayttaja = new Kayttaja($tulos->kayttajaid, $tulos->kayttajatunnus, $tulos->salasana, $tulos->sahkoposti);
$kayttajaid = (int) $_SESSION["kirjautunutid"];
$muokattuKayttaja = Kayttaja::etsiKayttajaIDlla($kayttajaid);
//$xuusiKayttaja->setKayttajaID(987987);
$muokattuKayttaja->setKayttajatunnus($_POST["username"]);
$muokattuKayttaja->setSalasana($_POST["password"]);
$muokattuKayttaja->setSahkoposti($_POST["email"]);
//$xuusiKayttaja->setKayttajaID(987);
//$xuusiKayttaja->setKayttajatunnus("t");
//$xuusiKayttaja->setSalasana("tt");
//$xuusiKayttaja->setSahkoposti("ttt");
//echo $uusiKayttaja;
$muokattuKayttaja->muokkaa();


///* XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXTarkistetaan onko parametrina saatu oikeat tunnukset */
//if ($uusiKayttaja == NULL) {
//    /* XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXVäärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
//    echo 'väärät tunnukset';
//    $sivu = "kirjautumissivu.php";
//    naytaNakyma($sivu);
//} else {
//    echo 'tervetuloa';
////    $_SESSION['kirjautunut'] = $uusiKayttaja->getKayttajatunnus();
//    header('Location: frontPage.php');
//}
