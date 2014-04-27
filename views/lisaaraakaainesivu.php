<div class="container">

    <!--<form class="form-signin" role="form" method="POST">-->
    <form action="addIngredientHandler.php" method="POST">

        <h2 class="form-signin-heading">Anna raaka-aineen tiedot</h2>

        <div class="input-group">
            <span class="input-group-addon">Raaka-aineen nimi (pakollinen tieto)</span>
            <input type="text" name="name" class="form-control" placeholder="pakollinen tieto" required autofocus/>
        </div>

        <br>

        <div class="input-group">
            <span class="input-group-addon">Yksikköhinta</span>
            <input type="text" name="unitprice" class="form-control"/>
            <span class="input-group-addon">€ / kg</span>
        </div>

        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Lisää raaka-aine</button>
    </form>

</div> 
