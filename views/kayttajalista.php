<div class="container">
    <h1>Käyttäjälista (hakutulos)</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <!--<th>#</th>-->
                <th>Käyttäjätunnus</th>
                <th>Tyyppi</th>
                <th>Pääraaka-aine</th>
                <th>Muokkaa (jos oma)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->users as $kayttaja) { ?>
                <tr>
                        <!--<td>1</td>-->
                    <td><A href="user.php?id=<?php echo $kayttaja->getKayttajaID(); ?>"><?php echo $kayttaja->getKayttajatunnus(); ?></A></td>
                    <td>Alkuruoka</td>
                    <td>kissa</td>
                    <td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Muokkaa</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if ($data->sivunro > 0){ ?>
    <?php // if (1==1){ ?>
        <A href="listUsernames.php?sivunro=<?php echo $data->sivunro - 1; ?>">Edellinen sivu</A>
    <?php } ?>
    <?php if ($data->sivunro < $data->sivuja){ ?>
    <?php // if (1==1){ ?>
        <A href="listUsernames.php?sivunro=<?php echo $data->sivunro + 1; ?>">Seuraava sivu</A>
    <?php } ?>

    Yhteensä <?php echo $kayttaja::lukumaara() ?> käyttäjää.
</div>

