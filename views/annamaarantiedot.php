<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require_once "libs/common.php";
require_once "libs/tietokantayhteys.php";
require_once "libs/models/Valmistusvaihe.php";
require_once "libs/models/Maara.php";
require_once "libs/models/Raakaaine.php";
?>

<div class="container">

    <form action="addQuantityHandler.php" method="POST">

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

        <?php
//        echo "reseptiid ";
//        echo (int) $_SESSION["reseptiID"];
//        echo "<br>";
//        echo "vaihenro ";
//        echo (int) $_SESSION["vaiheNRO"];
//        echo "<br>";
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <!--<th>#</th>-->
                    <!--<th>Lisää raaka-aine</th>-->
<!--                    <th>Määrä</th>
                    <th>Yksikkö</th>
                    <th>Tallenna</th>-->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="ingredientid" class="form-control">
                            <?php foreach (Raakaaine::haeKaikki() as $raakaaine): ?>
                                <option value="<?php echo $raakaaine->getRaakaaineID(); ?>"><?php echo $raakaaine->getNimi(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>

                    <td>
                        <div class="input-group">
                            <span class="input-group-addon">Määrä</span>
                            <input type="text" name="quantity" class="form-control"/>
                        </div>
                    </td>

                    <td>
                        <select name="unit" class="form-control">
                            <option value="kpl">kpl</option>
                            <option>kpl</option>
                            <option>dl</option>
                            <option>l</option>
                            <option>g</option>
                            <option>kg</option>
                            <option>tl</option>
                            <option>rl</option>
                        </select>
                    </td>

                    <td>
                        <button class="btn btn-s btn-default" type="submit">Lisää raaka-aine</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </form>


    <form action="addPhase.php">

        <button class="btn btn-lg btn-primary" type="submit">Lisää uusi vaihe &raquo;</button>

    </form>

    <br>

    <form action="recipeReady.php">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Resepti valmis!</button>

    </form>

</div> 
