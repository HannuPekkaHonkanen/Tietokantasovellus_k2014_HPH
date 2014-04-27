<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

if (onKirjautunut()) {
    $kayttajaid = (int) $_SESSION["kirjautunutid"];
    $kayttaja = Kayttaja::etsiKayttajaIDlla($kayttajaid);


    try {
        $kayttaja->poista();
    } catch (Exception $e) {
        $_SESSION["ilmoitus"] = "Käyttäjätunnuksesi poistaminen ei onnistunut. Luultavasti on olemassa reseptejä, joiden laatija olet.";

        $sivu = "keittokirjaEtusivu.php";
        naytaNakyma($sivu);
    }

    unset($_SESSION["kirjautunutid"]);

    $_SESSION["ilmoitus"] = "Käyttäjätunnuksesi poistettiin onnistuneesti.";

    $sivu = "keittokirjaEtusivu.php";
    naytaNakyma($sivu);
} else {
    echo 'et ole kirjautunut';
}
