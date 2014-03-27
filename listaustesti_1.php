<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once "libs/tietokantayhteys.php"; 
require_once "libs/models/Kayttaja.php";
echo "111";

//Lista asioista array-tietotyyppiin laitettuna:
//$lista = Kayttaja::getKayttajat();
$lista = new Kayttaja("kjh", "Jeesus", "Parta");
?>
<!DOCTYPE HTML>
<html>
  <head><title>Otsikko</title></head>
  <body>
    <h1>Listaelementtitesti</h1>
    <?php echo $lista->getKayttajatunnus(); ?>
  </body>
</html>
