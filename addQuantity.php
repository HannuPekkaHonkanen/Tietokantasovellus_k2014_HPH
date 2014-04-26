<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'libs/common.php';
require_once "libs/models/Maara.php";

$uusiMaara = new Maara();

$sivu = "annamaarantiedot.php";
$virheet=array();
$tiedot=array("maara" => $uusiMaara, "virheet" => $virheet);
naytaNakyma($sivu, $tiedot);
