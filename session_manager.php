<?php

function setUserSession($user):array{ //krijgt variabelen van login pagina, wijst ze toen aan sessie variabelen
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    return $_SESSION;
}

function sessionActive($user):bool{
    if (!empty(setUserSession($user))){
        $sessionActive = true;
    } else {
        $sessionActive = false;
    }
    return $sessionActive;
}