<?php

require_once 'libs/common.php';
require_once 'libs/models/Resepti.php';

$uusiResepti = new Resepti();

$sivu = "reseptisivu.php";
$virheet=array();
$tiedot=array("resepti" => $uusiResepti, "virheet" => $virheet);

naytaNakyma($sivu, $tiedot);

