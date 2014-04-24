<?php
require_once 'libs/common.php';
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Resepti.php";

$id = (int)$_GET["id"];

$resepti = Resepti::etsiReseptiIDlla($id);

$sivu = "reseptisivu.php";
$virheet=array();
$tiedot=array("resepti" => $resepti, "virheet" => $virheet);

naytaNakyma($sivu, $tiedot);
