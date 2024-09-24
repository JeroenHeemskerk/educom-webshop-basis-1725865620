<?php

function setUserSession($user):void{ //krijgt variabelen van login pagina, wijst ze toen aan sessie variabelen
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
}


