<div class="container">

    <!--<form class="form-signin" role="form" method="POST">-->
    <form action="loginHandler.php" method="POST">
        <h2 class="form-signin-heading">Ole hyvä ja kirjaudu sisään</h2>
<!--        <input type="text" name="username" class="form-control" placeholder="keittokirjaTunnuksesi" autofocus/>
        <input type="password" name="password" class="form-control" placeholder="salasana" />-->
        <input type="text" name="username" class="form-control" placeholder="Keittokirja-tunnuksesi" required autofocus/>
        <input type="password" name="password" class="form-control" placeholder="Keittokirja-salasanasi" required/>
        <!--                <label class="checkbox">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Kirjaudu sisään</button>
    </form>

</div> 

