<?php

require 'user_service.php';
require 'file_repository.php';

function getLoginInput (): string{
    $email = getPostVar('email');
    $password = getPostVar('password');

    return $email;
    return $password;
}

function showLoginPage ()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        return getLoginInput();
        if(validLoginForm($email, $password)){
            getUser($email);
            doLoginUser ($user); 
        } showLoginForm($email, $password);
    } showLoginForm();
}

function validLoginForm ($email, $password): bool{           
    if (authenticateUser($email, $password)) {
            return true;
    } return false;
}



function showLoginForm ()
{
    echo '<h2>Login</h2>
    <div class="content">
    <form method="post" action="index.php?">
        <input type=hidden name="page" value="login">
        <fieldset>
        <div>
            <label for=email>E-mail:</label>
            <input type="email" id="email" name="email" value="'; echo $email??''; echo '">
            <div>
                <span class="error"></span>
            </div>
        </div>
        <div>
            <label for=password>Wachtwoord:</label>
            <input type="password" id="password" name="password" value="'; echo $password??''; echo '">
            <div>
                <span class="error"></span>
            </div>
        </div>
        <div>
            <input type="submit">
        </div>
        </fieldset>
    </form>
    </div>';
}

function doLoginUser ($user)
{
    echo 
    '<div class="content">
        <h2>Welkom terug,'.$user['name'].'!</h2>
        <p>Hier komt een bevestiging</p>
    </div>';
    //start session
}

