<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Raakaaine.php";

$uusiRaakaaine = new Raakaaine();

$uusiRaakaaine->setNimi($_POST["name"]);
$yksikkohinta=$_POST["unitprice"];

// TODO LISÄÄ VIRHETARKISTUKSET $uusiRaakaaine
// TODO LISÄÄ VIRHETARKISTUKSET $yksikkohinta

$uusiRaakaaine->lisaaKantaan();



if ($yksikkohinta != "") { // TODO TÄMÄ $yksikkohinta VIRHETARK. LUOKKAAN Raakaaine!!!
    $uusiRaakaaine->setYksikkohinta($yksikkohinta);
    $uusiRaakaaine->vieYksikkohintaKantaan();
}

//TODO OHJAA JOLLEKIN SIVULLE
