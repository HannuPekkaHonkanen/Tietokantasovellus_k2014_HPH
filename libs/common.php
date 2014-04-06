<?php

session_start();

function naytaNakyma($sivu, $data = array()) {
//  function naytaNakyma($sivu) {
    $data = (object) $data;
//    require_once 'views/pohja.php';
    require 'views/pohja.php';
    exit();
}

function onKirjautunut() {
    if (isset($_SESSION["kirjautunutid"])) {
//        $kayttaja = $_SESSION['kirjautunut'];
    return TRUE;
    }
    return FALSE;
}
