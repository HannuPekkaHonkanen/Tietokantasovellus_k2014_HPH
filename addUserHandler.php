<?php

require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

//echo 'tervetuloa';

$uusiKayttaja = new Kayttaja();
$uusiKayttaja->setKayttajatunnus($_POST["username"]);
$uusiKayttaja->setSalasana($_POST["password"]);
$uusiKayttaja->setSahkoposti($_POST["email"]);
$uusiKayttaja->lisaaKantaanNimella();




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
