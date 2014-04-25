<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


//require_once sisällyttää annetun tiedoston vain kerran
require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/Kayttaja.php';

$sivunumero = 1;
if (isset($_GET["sivunro"])) {
    $sivunumero = (int) $_GET["sivunro"];

    //Sivunumero ei saa olla pienempi kuin yksi
    if ($sivunumero < 1)
        $sivunumero = 1;
}
//$sivunumero = 2;

$montakokayttajaasivulla = 10;

//Lista asioista array-tietotyyppiin laitettuna:
$lista = Kayttaja::getKayttajatSivulla($sivunumero, $montakokayttajaasivulla);
//$lista = Kayttaja::getKayttajat();
//$lista = NULL;
$kayttajaLkm=Kayttaja::lukumaara();
$sivuja = ceil($kayttajaLkm/$montakokayttajaasivulla);

if ($lista == NULL) {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
//    header('Location: frontPage.php');
    echo 'hakutulos tyhjä';
} else {
    $sivu = "kayttajalista.php";
    naytaNakyma($sivu, array("users" => $lista, "sivunro" => $sivunumero,"sivuja"=>$sivuja));
//    naytaNakyma($sivu, $lista);
//    naytaNakyma($sivu);
//    header('Location: frontPage.php');
}