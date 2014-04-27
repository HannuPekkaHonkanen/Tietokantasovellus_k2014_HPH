<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


//require_once sisällyttää annetun tiedoston vain kerran
require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/Resepti.php';

// kun siirrytaan tai palataan reseptilistaan, poistetaan katseltavan tai muokattavan reseptin ID
unset($_SESSION["reseptiID"]);

$sivunumero = 1;
if (isset($_GET["sivunro"])) {
    $sivunumero = (int) $_GET["sivunro"];

    //Sivunumero ei saa olla pienempi kuin yksi
    if ($sivunumero < 1)
        $sivunumero = 1;
}

$montakoSivulla = 5;


$hakusana = $_POST["searchstring"];

$hakusana = "%" . $hakusana . "%";

$lista = Resepti::annaHaetutReseptitSivulla($sivunumero, $montakoSivulla, $hakusana);

$lkm = 0;

foreach ($lista as $resepti) {
    $lkm = $lkm + 1;
}

$sivuja = ceil($lkm / $montakoSivulla);

if ($lista == NULL) {
    $_SESSION["ilmoitus"] = "Hakusanalla ei löytynyt reseptejä.";
    header('Location: frontPage.php');
} else {
    $sivu = "reseptilista.php";
    naytaNakyma($sivu, array("reseptit" => $lista, "sivunro" => $sivunumero, "sivuja" => $sivuja, "resepteja" => $lkm));
}
