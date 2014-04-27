<div class="container">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Ostoslista / <?php echo $data->reseptinnimi ?></div>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
    <!--                <th>Reseptin nimi</th>
                    <th>Raaka-aineluokitus</th>
                    <th>Käyttötilanneluokitus</th>
                    <th>Annosmäärä</th>-->
                    <!--<th>TODO Muokkaa (jos oma)</th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data->ostoslistanrivit as $rivi) { ?>
                    <tr>
                            <!--<td>1</td>-->
                        <td><?php echo $rivi->getRaakaaineNimi(); ?></td>
                        <td><?php echo $rivi->getRaakaaineMaara(); ?></td>
                        <td><?php echo $rivi->getRaakaaineYksikko(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
