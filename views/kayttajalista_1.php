    <h1>Käyttäjälista</h1>
    <ul>
    <?php foreach($data->users as $kayttaja) { ?>
        <li><?php echo $kayttaja->getKayttajatunnus().$kayttaja->getSahkoposti(); ?></li>
    <?php } ?>
    </ul>
