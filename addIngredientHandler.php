<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Raakaaine.php";

$uusiRaakaaine = new Raakaaine();

$uusiRaakaaine->setNimi($_POST["name"]);
$yksikkohinta=$_POST["unitprice"];
$uusiRaakaaine->setYksikkohinta($yksikkohinta);

if ($uusiRaakaaine->onkoKelvollinen()) {

    $uusiRaakaaine->lisaaKantaanNimella();

    if ($yksikkohinta != "") {
        $uusiRaakaaine->vieYksikkohintaKantaan();
    }

    $_SESSION["ilmoitus"] = "Raaka-aine lisättiin onnistuneesti.";

    header('Location: frontPage.php');
    
} else {

    unset($_SESSION["ilmoitus"]);

    $sivu = "lisaaraakaainesivu.php";
    $virheet = $uusiRaakaaine->getVirheet();
    $tiedot = array("raakaaine" => $uusiRaakaaine, "virheet" => $virheet);
    naytaNakyma($sivu, $tiedot);
}
