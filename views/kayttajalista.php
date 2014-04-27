<div class="container">
    <h1>Käyttäjälista</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <!--<th>#</th>-->
                <th>Käyttäjätunnus</th>
                <th>Sähköposti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->users as $kayttaja) { ?>
                <tr>
                    <td><?php echo $kayttaja->getKayttajatunnus(); ?></td>
                    <td><?php echo $kayttaja->getSahkoposti(); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if ($data->sivunro > 1){ ?>
    <?php // if (1==1){ ?>
        <A href="listUsernames.php?sivunro=<?php echo $data->sivunro - 1; ?>">Edellinen sivu</A>
    <?php } ?>
    <?php if ($data->sivunro < $data->sivuja){ ?>
    <?php // if (1==1){ ?>
        <A href="listUsernames.php?sivunro=<?php echo $data->sivunro + 1; ?>">Seuraava sivu</A>
    <?php } ?>

    Yhteensä <?php echo $kayttaja::lukumaara() ?> käyttäjää.
    Olet sivulla <?php echo $data->sivunro; ?>/<?php echo $data->sivuja; ?>.
</div>

