<div class="container">

    <!--<form class="form-signin" role="form" method="POST">-->
    <form action="addUserHandler.php" method="POST">
        <!--<h2 class="form-signin-heading">Ole hyvä ja kirjaudu sisään</h2>-->
        <h2>Ole hyvä ja anna tiedot rekisteröitymistäsi varten</h2>
<!--        <input type="text" name="username" class="form-control" placeholder="keittokirjaTunnuksesi" 
autofocus/>
        <input type="password" name="password" class="form-control" placeholder="salasana" />-->
        <input type="text" name="username" class="form-control" placeholder="Keittokirja-tunnus (max 30 merkkiä)" value="<?php echo $data->kayttaja->getKayttajatunnus(); ?>" required/>
        <input type="password" name="password" class="form-control" placeholder="Keittokirja-salasana (max 30 merkkiä)" value="<?php echo $data->kayttaja->getSalasana(); ?>" required/>
        <input type="text" name="email" class="form-control" placeholder="Sähköposti (max 255 merkkiä)" value="<?php echo $data->kayttaja->getSahkoposti(); ?>" required/>
<!--        <input type="text" name="username" class="form-control" placeholder="Keittokirja-tunnus" 
               value="valueee" required/>
        <input type="password" name="password" class="form-control" placeholder="Keittokirja-salasana" 
               required/>
        <input type="text" name="email" class="form-control" placeholder="Sähköposti" required/>-->
        <!--                <label class="checkbox">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Rekisteröidy</button>
    </form>

</div> 

