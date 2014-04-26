<h2 class="form-signin-heading"><?php echo $data->resepti->getNimi(); ?></h2>

<?php echo $data->resepti->getKuvaus(); ?><br><br>

<h4>Raaka-aineluokitus: <?php echo $data->resepti->getRaakaaineluokitus(); ?></h4>

<h4>Käyttötilanneluokitus: <?php echo $data->resepti->getKayttotilanneluokitus(); ?></h4>

<h4>Annosmäärä: <?php echo $data->resepti->getAnnosmaara(); ?></h4>

<!--TODO NÄYTÄ KUVA TAI OTA KOKONAAN RESEPTIN TIEDOISTA POIS<input type="text" name="picture" class="form-control" placeholder="(URL-osoite)" value="<?php // echo $data->resepti->getKuva();  ?>"/>-->

<hr>
