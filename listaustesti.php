<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once 'libs/tietokantayhteys.php'; 
require_once 'libs/models/Kayttaja.php';

//include ('libs/models/Kayttaja.php');
//echo "111";

//Lista asioista array-tietotyyppiin laitettuna:
$lista = Kayttaja::getKayttajat();
//$lista = array("Kiraaahvi", "Trumpetti", "Jeesus", "Parta");
?>
<!DOCTYPE HTML>
<html>
  <head><title>Otsikko</title></head>
  <body>
    <h1>Listaelementtitesti</h1>
    <ul>
    <?php foreach($lista as $asia) { ?>
        <li><?php echo $asia->getKayttajatunnus(); ?></li>
    <?php } ?>
    </ul>
  </body>
</html>

