<div class="container">
    <!--NOTE TÄTÄ EI KÄYTETÄ SOVELLUKSESSA-->
    <h1>Vaihelista (hakutulos)</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <!--<th>#</th>-->
                <th>ReseptiID</th>
                <th>Vaihenumero</th>
                <th>Nimi</th>
                <th>Ohjeet</th>
                <th>Kuva</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->vaiheet as $vaihe) { ?>
                <tr>
                        <!--<td>1</td>-->
                    <!--<td><A href="recipe.php?id=<?php // echo $resepti->getReseptiID(); ?>"><?php // echo $resepti->getNimi(); ?></A></td>-->
                    <td><?php echo $vaihe->getReseptiID(); ?></td>
                    <td><?php echo $vaihe->getJarjestysnumero(); ?></td>
                    <td><?php echo $vaihe->getNimi(); ?></td>
                    <td><?php echo $vaihe->getOhjeet(); ?></td>
                    <td><?php echo $vaihe->getKuva(); ?></td>
                    <!--<td><button type="button" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Muokkaa</button></td>-->
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!--Yhteensä <?php // echo $resepti::lukumaara() ?> reseptiä.-->

</div>

