<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'libs/common.php';
require_once "libs/models/Valmistusvaihe.php";

$uusiVaihe = new Valmistusvaihe();

$sivu = "annavaiheentiedot.php";
$virheet=array();
$tiedot=array("vaihe" => $uusiVaihe, "virheet" => $virheet);
naytaNakyma($sivu, $tiedot);

