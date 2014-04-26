<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'libs/common.php';
require_once 'libs/models/Resepti.php';

$uusiResepti = new Resepti();

$sivu = "annaReseptinYleistiedot.php";
$virheet=array();
$tiedot=array("resepti" => $uusiResepti, "virheet" => $virheet);

naytaNakyma($sivu, $tiedot);

