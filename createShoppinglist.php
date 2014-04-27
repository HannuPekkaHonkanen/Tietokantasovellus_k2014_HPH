<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/OstoslistanRivi.php';
require_once 'libs/models/Resepti.php';

$reseptiID=$_SESSION["reseptiID"];
//$reseptiID=6;

unset($_SESSION["reseptiID"]);

$lista = OstoslistanRivi::haeOstoslistanRivit($reseptiID);
$resepti=  Resepti::etsiReseptiIDlla($reseptiID);
$reseptinNimi=$resepti->getNimi();


if ($lista == NULL) {
    $_SESSION["ilmoitus"] = "Reseptissä ei ole raaka-aineita.";
    header('Location: frontPage.php');
} else {
    $sivu = "ostoslista.php";
    naytaNakyma($sivu, array("ostoslistanrivit" => $lista,"reseptinnimi" =>$reseptinNimi));
}