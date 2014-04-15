<?php

require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Raakaaine.php";

$uusiRaakaaine = new Raakaaine();

$uusiRaakaaine->setNimi($_POST["name"]);
$uusiRaakaaine->lisaaKantaanNimella();

if ($_POST["unitprice"] != "") {
    $uusiRaakaaine->setYksikkohinta($_POST["unitprice"]);
    $uusiRaakaaine->asetaYksikkohinta();
}
