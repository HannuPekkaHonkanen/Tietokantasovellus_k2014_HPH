<?php
require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

echo 'sfdg';

$uusiKayttaja = new Kayttaja();
//$uusiKayttaja->setKayttajaID("55");
//$uusiKayttaja->setKayttajatunnus("t");
//$uusiKayttaja->setSalasana("tt");
//$uusiKayttaja->setSahkoposti("ttt");
//
$uusiKayttaja->lisaaKantaan2();
