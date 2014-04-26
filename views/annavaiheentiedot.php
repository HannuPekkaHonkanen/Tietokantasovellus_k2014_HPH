<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Valmistusvaihe.php";
//$lisattavaResepti = Resepti::etsiReseptiIDlla((int) $_SESSION["reseptiID"]);
?>

<div class="container">

    <form action="addPhaseHandler.php" method="POST">

        <?php
        require 'reseptinyleistiedot.php';
        ?>

        <?php
        require 'vaiheetjamaarat.php';
        ?>

        <font color="red">
        <?php
        foreach ($data->virheet as $virhe) {
            echo $virhe;
            echo "<br>";
        }
        ?>
        
        </font>

        <h2 class="form-signin-heading">Vaiheen tiedot:</h2>

        <div class="input-group">
            <span class="input-group-addon">Vaiheen nimi (pakollinen tieto)</span>
            <input type="text" name="name" class="form-control" placeholder="Anna vaiheen nimi !" value="<?php echo $data->vaihe->getNimi(); ?>" required autofocus/>
        </div>

        <br>

        <div class="input-group">
            <span class="input-group-addon">Vaiheen ohjeet (pakollinen tieto, max 500 merkkiä)</span>
            <textarea name="description" class="form-control" rows="5" maxlength="500" placeholder="Vaiheen ohjeet (vaiheelle annetaan erikseen raaka-aineet seuraavalla sivulla)"><?php echo $data->vaihe->getOhjeet(); ?></textarea>
                <!--<input type="text" name="recipename" class="form-control"/>-->
                <!--<span class="input-group-addon">€ / kg</span>-->
        </div>

        <br>

        <div class="input-group">
            <span class="input-group-addon">Kuvan URL-osoite</span>
            <input type="text" name="picture" class="form-control" placeholder="(URL-osoite)" value="<?php echo $data->vaihe->getKuva(); ?>"/>
        </div>

        <br>

        <!--        <div class="input-group">
                    <span class="input-group-addon">VIE TÄMÄ RAAKA-AINEESEEN Yksikköhinta</span>
                    <input type="text" name="unitprice" class="form-control"/>
                    <span class="input-group-addon">€ / kg</span>
                </div>-->

        <br>

        <button class="btn btn-lg btn-primary" type="submit">Siirry antamaan vaiheen raaka-aineet &raquo;</button>
    </form>


</div> 
