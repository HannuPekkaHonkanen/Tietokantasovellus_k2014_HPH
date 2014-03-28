<?php
echo "testisivu_001";


require_once 'libs/common.php';
$sivu = "kirjautumissivu.php";
naytaNakyma($sivu);

header('Location: listaustesti.php');


//if (empty($_POST["username"]) || empty($_POST["password"])) {
//    /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
////    $sivu2 = "HannunListatesti";
////    naytaNakyma($sivu2);
//    naytaNakyma($sivu);
////    exit(); // Lopetetaan suoritus tähän. Kutsun voi sijoittaa myös naytaNakyma-funktioon, niin sitä ei tarvitse toistaa joka paikassa
//}
//
//    naytaNakyma("../HannunListatesti.php");
//
//    
//$kayttaja = $_POST["username"];
//$salasana = $_POST["password"];
//
///* Tarkistetaan onko parametrina saatu oikeat tunnukset */
//if ($kayttaja == "Hannu" && $salasana == "hannu123") {
//    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
////    $sivu = "html-demo/OMA_KEITTOKIRJA.html";
////    naytaNakyma($sivu);
//    naytaNakyma("HannunListatesti");
////    header('Location: html-demo/OMA_KEITTOKIRJA.html');
//} else {
//    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
//    naytaNakyma($sivu);
//}

