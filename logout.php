<?php

require_once 'libs/common.php';

//Poistetaan istunnosta merkintä kirjautuneesta käyttäjästä -> Kirjaudutaan ulos
unset($_SESSION["kirjautunutid"]);

//Yleensä kannattaa uloskirjautumisen jälkeen ohjata käyttäjä kirjautumissivulle
//header('Location: login.php');
$sivu = "keittokirjaEtusivu.php";
naytaNakyma($sivu);
?>
