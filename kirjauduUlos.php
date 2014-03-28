<?php

require_once 'libs/common.php';

//Poistetaan istunnosta merkintä kirjautuneesta käyttäjästä -> Kirjaudutaan ulos
unset($_SESSION['kirjautunut']);

//Yleensä kannattaa ulkos kirjautumisen jälkeen ohjata käyttäjä kirjautumissivulle
header('Location: login.php');
?>
