<?php

//require_once sisällyttää annetun tiedoston vain kerran
require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/Kayttaja.php';

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