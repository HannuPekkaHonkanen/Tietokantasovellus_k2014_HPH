<?php

require_once 'libs/common.php';

$_SESSION["ilmoitus"] = "Antamasi resepti on nyt KEITTOKIRJAssa!";
unset($_SESSION["reseptiID"]);
unset($_SESSION["vaiheNRO"]);

$sivu = "keittokirjaEtusivu.php";
naytaNakyma($sivu);