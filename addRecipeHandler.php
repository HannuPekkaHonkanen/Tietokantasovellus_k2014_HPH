<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Resepti.php";

$uusiResepti = new Resepti();

$uusiResepti->setNimi(trim($_POST["name"]));
$uusiResepti->setKuvaus($_POST["description"]);
$uusiResepti->setRaakaaineluokitus($_POST["ingredientClass"]);
$uusiResepti->setKayttotilanneluokitus($_POST["useSituation"]);
$uusiResepti->setAnnosmaara($_POST["numberOfPortions"]);
$uusiResepti->setKuva($_POST["picture"]);

if (onKirjautunut()) {
    $uusiResepti->setKayttajaID($_SESSION["kirjautunutid"]);
//    TODO TÄMÄ KAIKKI POIS? echo "RESEPTI LISÄTTIIN";
} else {
    echo 'ET OLE KIRJAUTUNUT';
}

if ($uusiResepti->onkoKelvollinen()) {

    $uusiResepti->lisaaKantaan();
    
    $sivu = "annavaiheetjamaarat.php";
    $virheet = array();
    $tiedot=array("resepti" => $uusiResepti, "virheet" => $virheet);
    naytaNakyma($sivu, $tiedot);

    $_SESSION["ilmoitus"] = "Reseptin yleistiedot lisättiin onnistuneesti.";

    
} else {
    
    unset($_SESSION["ilmoitus"]);

    $sivu = "annaReseptinYleistiedot.php";
    $virheet = $uusiResepti->getVirheet();
    $tiedot=array("resepti" => $uusiResepti, "virheet" => $virheet);
    naytaNakyma($sivu, $tiedot);
    
}
