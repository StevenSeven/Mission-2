<?php

include "conn.ini.php";

echo '  <form method="get" action="login.php">
            <fieldset><legend>Login : </legend><input type="text" name="login"/></fieldset>
            <fieldset><legend>Mot de passe : </legend><input type="password" name="motdepasse"/></fieldset>
            <input type="submit" name="submit" value="Se connecter"/>
        </form>';