<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Valmistusvaihe.php";
require_once "libs/models/Maara.php";

$uusiMaara = new Maara();

$uusiMaara->setReseptiID((int) $_SESSION["reseptiID"]);
$uusiMaara->setVaihenumero((int) $_SESSION["vaiheNRO"]);
$uusiMaara->setRaakaaineID((int) $_POST["ingredientid"]);
//$uusiMaara->setRaakaaineID(5);
$uusiMaara->setMaara($_POST["quantity"]);
$uusiMaara->setMittayksikko($_POST["unit"]);

if ($uusiMaara->onkoKelvollinen()) {

    $uusiMaara->lisaaKantaan();

    $_SESSION["ilmoitus"] = "Raaka-aineen määrä lisättiin onnistuneesti.";

    header('Location: addQuantity.php');

//NOTE POISTA
//    $sivu = "annavaiheenmaarat.php";
//    $virheet = array();
//    $tiedot = array("resepti" => $uusiResepti, "virheet" => $virheet);
//    naytaNakyma($sivu, $tiedot);
} else {

    unset($_SESSION["ilmoitus"]);

    $sivu = "annamaarantiedot.php";
    $virheet = $uusiMaara->getVirheet();
    $tiedot = array("maara" => $uusiMaara, "virheet" => $virheet);
    naytaNakyma($sivu, $tiedot);
}
