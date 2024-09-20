<?php
$email = $password = '';
$emailErr = $passwordErr = '';
$valid =false;

if($_SERVER['REQUEST_METHOD']=="POST") {
    
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
        require 'user_service.php';
        if (authenticateUser($email, $password)) {
            require 'session_manager.php';
        } else {
            $passwordErr = "Wachtwoord onjuist";
        }
    } else {
            $emailErr = "Er is geen account met dit e-mailadres geregistreerd";
            echo "Link naar register pagina";
        }

    //$valid = true;
};


if($valid == false){
    echo '<h2>Login</h2>
    <div class="content">
    <form method="post" action="index.php?">
        <input type=hidden name="page" value="login">
        <fieldset>
        <div>
            <label for=email>E-mail:</label>
            <input type="email" id="email" name="email" value="' . $email . '">
            <div>
                <span class="error">'.$emailErr.'</span>
            </div>
        </div>
        <div>
            <label for=password>Wachtwoord:</label>
            <input type="password" id="password" name="password" value="'.$password.'">
            <div>
                <span class="error">'.$passwordErr.'</span>
            </div>
        </div>
        <div>
            <input type="submit">
        </div>
        </fieldset>
    </form>
    </div>';
} else {
    echo 
    '<div class="content">
        <h2>Welkom terug, [naam uit login sessie]!</h2>
        <p>Hier komt een bevestiging</p>
    </div>';
};