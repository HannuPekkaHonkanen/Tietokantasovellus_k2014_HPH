<?php

//require_once sisällyttää annetun tiedoston vain kerran
require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/Kayttaja.php';

$sivu = 1;
if (isset($_GET['sivu'])) {
    $sivu = (int) $_GET['sivu'];

    //Sivunumero ei saa olla pienempi kuin yksi
    if ($sivu < 1)
        $sivu = 1;
}
$montakokayttajaasivulla = 8;

//Lista asioista array-tietotyyppiin laitettuna:
$lista = Kayttaja::getKayttajat();
//$lista = NULL;
if ($lista == NULL) {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
//    header('Location: frontPage.php');
    echo 'hakutulos tyhjä';
} else {
    $sivu = "kayttajalista.php";
    naytaNakyma($sivu, array("users" => $lista));
//    naytaNakyma($sivu, $lista);
//    naytaNakyma($sivu);
//    header('Location: frontPage.php');
}