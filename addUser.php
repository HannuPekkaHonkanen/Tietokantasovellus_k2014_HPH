<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'libs/common.php';
require_once 'libs/models/Kayttaja.php';

$uusiKayttaja = new Kayttaja();

$sivu = "rekisteroitymissivu.php";
$virheet=array();
$tiedot=array("kayttaja" => $uusiKayttaja, "virheet" => $virheet);

naytaNakyma($sivu, $tiedot);

