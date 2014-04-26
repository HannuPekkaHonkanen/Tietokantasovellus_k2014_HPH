<?php
// NOTE TÄTÄ EI KÄYTETÄ SOVELLUKSESSA

//require_once sisällyttää annetun tiedoston vain kerran
require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/Valmistusvaihe.php';

//$sivunumero = 1;
//if (isset($_GET["sivunro"])) {
//    $sivunumero = (int) $_GET["sivunro"];
//
//    //Sivunumero ei saa olla pienempi kuin yksi
//    if ($sivunumero < 1)
//        $sivunumero = 1;
//}
//
//$montakoSivulla = 10;

//Lista asioista array-tietotyyppiin laitettuna:
$reseptiID=1;
$lista = Valmistusvaihe::haeVaiheetReseptiIDlla($reseptiID);
//$lkm = Resepti::lukumaara();
//$sivuja = ceil($lkm / $montakoSivulla);

if ($lista == NULL) {
    /* Tästä voisi ohjata sopivalle sivulle. TODO */
//    header('Location: frontPage.php');
    echo "TODO hakutulos tyhjä";
} else {
    $sivu = "vaihelista.php";
    naytaNakyma($sivu, array("vaiheet" => $lista, "reseptiID" => $reseptiID));
}