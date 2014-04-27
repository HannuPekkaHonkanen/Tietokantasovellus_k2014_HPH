<?php

require_once 'libs/common.php';
require_once 'libs/models/Raakaaine.php';

$uusiRaakaaine = new Raakaaine();

$sivu = "lisaaraakaainesivu.php";
$virheet=array();
$tiedot=array("raakaaine" => $uusiRaakaaine, "virheet" => $virheet);
naytaNakyma($sivu, $tiedot);
