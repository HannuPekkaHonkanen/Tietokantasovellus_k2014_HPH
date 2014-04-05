<?php
require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

echo 'sfdg';

$uusiKayttaja = new Kayttaja();
$uusiKayttaja->setKayttajaID("65");
$uusiKayttaja->setKayttajatunnus("t88");
$uusiKayttaja->setSalasana("tt");
$uusiKayttaja->setSahkoposti("ttt");
echo $uusiKayttaja->getKayttajatunnus();
//
$uusiKayttaja->lisaaKantaan3();
echo '-sfdasdasdasdg';