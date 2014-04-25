<div class="container">
    <h1>Reseptilista (TODO hakutulos)</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <!--<th>#</th>-->
                <th>Reseptin nimi</th>
                <th>Raaka-aineluokitus</th>
                <th>Käyttötilanneluokitus</th>
                <th>Annosmäärä</th>
                <th>XXXXXXXXXX Muokkaa (jos oma)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->reseptit as $resepti) { ?>
                <tr>
                        <!--<td>1</td>-->
                    <td><A href="recipe.php?id=<?php echo $resepti->getReseptiID(); ?>"><?php echo $resepti->getNimi(); ?></A></td>
                    <td><?php echo $resepti->getRaakaaineluokitus(); ?></td>
                    <!--<td><?php // echo $resepti->getReseptiID(); ?></td>-->
                    <td><?php echo $resepti->getKayttotilanneluokitus(); ?></td>
                    <td><?php echo $resepti->getAnnosmaara(); ?></td>
                    <td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Muokkaa</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if ($data->sivunro > 1){ ?>
    <?php // if (1==1){ ?>
        <A href="listRecipies.php?sivunro=<?php echo $data->sivunro - 1; ?>">Edellinen sivu</A>
    <?php } ?>
    <?php if ($data->sivunro < $data->sivuja){ ?>
    <?php // if (1==1){ ?>
        <A href="listRecipies.php?sivunro=<?php echo $data->sivunro + 1; ?>">Seuraava sivu</A>
    <?php } ?>

    Yhteensä <?php echo $resepti::lukumaara() ?> reseptiä.
    Olet sivulla <?php echo $data->sivunro; ?>/<?php echo $data->sivuja; ?>.
</div>

