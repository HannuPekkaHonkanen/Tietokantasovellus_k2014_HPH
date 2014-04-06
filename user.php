<?php
require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

//echo $_GET["id"];
$id = (int)$_GET["id"];
//$iiid=2;
//$iid = (int)$iiid;
//echo $iid;
//echo $id;

$kayttaja = Kayttaja::etsiKayttajaIDlla($id);
//echo $kayttaja->getKayttajatunnus();
//echo $kayttaja->getKayttajatunnus();

$sivu = "kayttajasivu.php";
//naytaNakyma($sivu,$kayttaja);
naytaNakyma($sivu, array("kayttaja" => $kayttaja));
