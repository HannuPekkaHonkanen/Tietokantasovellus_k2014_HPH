<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Valmistusvaihe.php";

$uusiVaihe = new Valmistusvaihe();

$uusiVaihe->setReseptiID((int) $_SESSION["reseptiID"]);
$uusiVaihe->setNimi(trim($_POST["name"]));
$uusiVaihe->setOhjeet($_POST["description"]);
$uusiVaihe->setKuva($_POST["picture"]);

if ($uusiVaihe->onkoKelvollinen()) {

    $uusiVaihe->lisaaKantaan();

    $_SESSION["ilmoitus"] = "Vaihe lisättiin onnistuneesti.";
    $_SESSION["vaiheID"] = $uusiVaihe->getVaihenumero();

    header('Location: addQuantity.php');

//NOTE POISTA
//    $sivu = "annavaiheenmaarat.php";
//    $virheet = array();
//    $tiedot = array("resepti" => $uusiResepti, "virheet" => $virheet);
//    naytaNakyma($sivu, $tiedot);
} else {

    unset($_SESSION["ilmoitus"]);

    $sivu = "annavaiheentiedot.php";
    $virheet = $uusiVaihe->getVirheet();
    $tiedot = array("vaihe" => $uusiVaihe, "virheet" => $virheet);
    naytaNakyma($sivu, $tiedot);
}
