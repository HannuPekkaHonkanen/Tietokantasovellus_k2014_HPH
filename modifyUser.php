<?php
require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Kayttaja.php";

if (onKirjautunut()) {
    $kayttajaid = (int)$_SESSION["kirjautunutid"];
//    echo "olet kirjautunut";
////    $kayttaja->getKayttajatunnus();
//    echo $kayttaja; //. $kk;
//            ->getKayttajatunnus();
//    $kayttaja=new Kayttaja();
//    $kayttaja->setKayttajatunnus("jhjhjh");
    $kayttaja = Kayttaja::etsiKayttajaIDlla($kayttajaid);
//    echo 'kukkku';
//    $dfg = "kjh";
//    echo $dfg;
//    echo $kayttajaid;
//    $ksks = $kayttaja->getKayttajatunnus();
//    echo $ksks;
//    echo 'kukkku';
$sivu = "muokkaakayttajaasivu.php";
naytaNakyma($sivu, array("kayttaja" => $kayttaja));
//    echo 'kukkku';
} else {
    echo 'et ole kirjautunut';
}
