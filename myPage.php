<?php

require_once 'libs/common.php';
include ('libs/models/Kayttaja.php');

if (onKirjautunut()) {
    $kayttaja=$_SESSION['kirjautunut'];
//    echo "olet kirjautunut";
////    $kayttaja->getKayttajatunnus();
//    echo $kayttaja; //. $kk;
//            ->getKayttajatunnus();
    $sivu = "omaKeittokirja.php";
    naytaNakyma($sivu);
} else{
    echo 'et ole kirjautunut';
}
