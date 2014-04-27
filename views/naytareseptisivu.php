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

    <form action="createShoppinglist.php">

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

        <br>

        <button class="btn btn-lg btn-primary" type="submit">Tee ostoslista tämän reseptin raaka-aineista &raquo;</button>

    </form>

</div> 
