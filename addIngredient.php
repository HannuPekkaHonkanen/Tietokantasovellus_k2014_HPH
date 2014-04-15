<?php

require_once 'libs/common.php';
require_once 'libs/models/Raakaaine.php';

$uusiRaakaaine = new Raakaaine();
//$uusiRaakaaine->setNimi("raaka-aineen nimi");

$sivu = "lisaaraakaainesivu.php";
naytaNakyma($sivu, array("raakaaine" => $uusiRaakaaine));

