<?php

require_once 'libs/common.php';
require_once 'libs/models/Kayttaja.php';

$sivu = "rekisteroitymissivu.php";

$uusiKayttaja = new Kayttaja();
////$kayttaja->setKayttajaID($tulos->kayttajaid);
$uusiKayttaja->setKayttajatunnus("testin");
$uusiKayttaja->setSalasana("testin");
$uusiKayttaja->setSahkoposti("testin");

//naytaNakyma($sivu);
//naytaNakyma($sivu, array("kayttaja" => "XXX"));
naytaNakyma($sivu, array("kayttaja" => $uusiKayttaja));

