<?php

require_once 'libs/common.php';
require_once 'libs/models/Kayttaja.php';


$uusiKayttaja = new Kayttaja();
////$kayttaja->setKayttajaID($tulos->kayttajaid);
$uusiKayttaja->setKayttajatunnus("testin");
$uusiKayttaja->setSalasana("testin");
$uusiKayttaja->setSahkoposti("testin");

$sivu = "rekisteroitymissivu.php";
naytaNakyma($sivu, array("kayttaja" => $uusiKayttaja));

