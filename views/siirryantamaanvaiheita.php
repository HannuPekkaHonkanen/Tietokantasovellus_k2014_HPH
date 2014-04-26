<div class="container">

    <font color="red">
    <?php
    foreach ($data->virheet as $virhe) {
        echo $virhe;
        echo "<br>";
    }
    ?>
    </font>


    <?php
    require 'reseptinyleistiedot.php';
    ?>

    <?php
    require 'vaiheetjamaarat.php';
    ?>

    <!--    <form action="http://google.com">
            <input type="submit" value="Anna ensimmäinen valmistusvaihe">
        </form>-->

    <p>
        <a class="btn btn-lg btn-primary" href="addPhase.php" role="button">Anna ensimmäinen valmistusvaihe &raquo;</a>
    </p>

    <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Lisää resepti</button>-->


</div> 
