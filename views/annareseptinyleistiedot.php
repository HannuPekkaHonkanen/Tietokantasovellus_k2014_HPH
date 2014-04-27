<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<div class="container">

    <form action="addRecipeHandler.php" method="POST">
        
        <font color="red">
        <?php
        foreach ($data->virheet as $virhe) {
            echo $virhe;
            echo "<br>";
        }
        ?>
        </font>
        
        <h2 class="form-signin-heading">Reseptin yleistiedot:</h2>

        <div class="input-group">
            <span class="input-group-addon">Reseptin nimi (pakollinen tieto)</span>
            <input type="text" name="name" class="form-control" placeholder="Anna reseptin nimi !" value="<?php echo $data->resepti->getNimi(); ?>" required autofocus/>
        </div>

        <br>

        <div class="input-group">
            <span class="input-group-addon">Reseptin kuvaus (max 500 merkkiä)</span>
            <textarea name="description" class="form-control" rows="5" maxlength="500" placeholder="Reseptin yleiskuvaus (valmistusvaiheille annetaan erikseen ohjeet vaiheittain)"><?php echo $data->resepti->getKuvaus(); ?></textarea>
                <!--<input type="text" name="recipename" class="form-control"/>-->
                <!--<span class="input-group-addon">€ / kg</span>-->
        </div>

        <br>

        <div class="input-group">
            <span class="input-group-addon">Raaka-aineluokitus, jonka perusteella reseptejä voi hakea (pakollinen tieto)</span>
            <select name="ingredientClass" class="form-control">
                <?php $raakaaineluokitus=$data->resepti->getRaakaaineluokitus(); ?>
                <?php if (!empty($raakaaineluokitus)){echo "<option>"; echo $raakaaineluokitus;echo "</option>"; }?>
                <option>Marja</option>
                <option>Salaatti</option>
                <option>Kasvis</option>
                <option>Liha</option>
                <option>Siipikarja</option>
                <option>Riista</option>
                <option>Kala</option>
                <option>Vegaani</option>
            </select>
        </div>
        <br>

        <div class="input-group">
            <span class="input-group-addon">Käyttötilanneluokitus (pakollinen tieto)</span>
            <select name="useSituation" class="form-control">
                <?php $kayttotilanneluokitus=$data->resepti->getKayttotilanneluokitus(); ?>
                <?php if (!empty($kayttotilanneluokitus)){echo "<option>"; echo $kayttotilanneluokitus;echo "</option>"; }?>
                <option>Alkujuoma</option>
                <option>Ruokajuoma</option>
                <option>Jälkiruokajuoma</option>
                <option>Alkuruoka</option>
                <option>Pääruoka</option>
                <option>Jälkiruoka</option>
            </select>
        </div>

        <br>

        <div class="input-group">
            <span class="input-group-addon">Annosmäärä (pakollinen tieto)</span>
            <input type="text" name="numberOfPortions" class="form-control" placeholder="Anna annosmäärä !" value="<?php echo $data->resepti->getAnnosmaara(); ?>" required/>
            <span class="input-group-addon">kpl</span>
        </div>

        <br>

        <div class="input-group">
            <span class="input-group-addon">Kuvan URL-osoite</span>
            <input type="text" name="picture" class="form-control" placeholder="(URL-osoite)" value="<?php echo $data->resepti->getKuva(); ?>"/>
        </div>

        <br>

        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Tallenna yleistiedot</button>
    </form>


</div> 
