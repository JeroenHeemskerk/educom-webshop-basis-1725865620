<?php
function showLoginPage ()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = validateLoginForm();
        if($data['valid'] == false){
            showLoginForm ($data); 
        } else {
            doLoginUser ($data);
        }
    } else {
        $data = '';
        showLoginForm($data);
    }
}

function validateLoginForm ()
{
    $email = $password = '';
    $emailErr = $passwordErr = '';
    $valid =false;

    require 'user_service.php';

    function cleanString($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    function getPostVar ($key, $default=''){
        if(isset($_POST[$key])){
            return cleanString($_POST[$key]);
        } else {
            return $default;
        }
    }

    $email = getPostVar('email');
    $password = getPostVar('password');

    if (empty($email)){
        $emailErr = "Vul een e-mailadres in";
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Ongeldig e-mailadres";
        }
    }

    if (empty($password)){
        $passwordErr = "Vul een wachtwoord in";
    }

    if(!empty($email&&$password)&&(userExists($email))){
        if (authenticateUser($email, $password)) {
            $valid = true;
            require 'session_manager.php';
        } else {
            $passwordErr = "Wachtwoord onjuist";
        }
    } else {
            $emailErr = "Er is geen account met dit e-mailadres geregistreerd";
            echo "Link naar register pagina";
        }

    $data = array('email' => $email, 'emailErr' => $emailErr, 'password' => $passwordErr, 'valid' => $valid);
    return $data;
}

function showLoginForm ($data)
{
    echo '<h2>Login</h2>
    <div class="content">
    <form method="post" action="index.php?">
        <input type=hidden name="page" value="login">
        <fieldset>
        <div>
            <label for=email>E-mail:</label>
            <input type="email" id="email" name="email" value="'; echo $data['email']??''; echo '">
            <div>
                <span class="error">' ; echo $data['emailErr']??''; echo '</span>
            </div>
        </div>
        <div>
            <label for=password>Wachtwoord:</label>
            <input type="password" id="password" name="password" value="'; echo $data['password']??''; echo '">
            <div>
                <span class="error">' ; echo $data['passwordErr']??''; echo '</span>
            </div>
        </div>
        <div>
            <input type="submit">
        </div>
        </fieldset>
    </form>
    </div>';
}

function doLoginUser ($data)
{
    echo 
    '<div class="content">
        <h2>Welkom terug, [naam uit login sessie]!</h2>
        <p>Hier komt een bevestiging</p>
    </div>';
    //start session
}

