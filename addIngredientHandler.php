<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Raakaaine.php";

$uusiRaakaaine = new Raakaaine();

$uusiRaakaaine->setNimi($_POST["name"]);
$uusiRaakaaine->lisaaKantaan();

if ($_POST["unitprice"] != "") {
    $uusiRaakaaine->setYksikkohinta($_POST["unitprice"]);
    $uusiRaakaaine->asetaYksikkohinta();
}
