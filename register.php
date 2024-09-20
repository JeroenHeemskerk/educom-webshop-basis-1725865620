<?php
$firstName = $lastName = $email = $password = $passwordRepeat = '';

$fullName = '';

$firstNameErr = $lastNameErr = $emailErr = $emailExistsErr = $passwordErr = $passwordRepeatErr = '';

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

    $firstName = getPostVar('firstName');
    $lastName = getPostVar('lastName');
    $email = getPostVar('email');
    $password = getPostVar('password');
    $passwordRepeat = getPostVar('passwordRepeat');

    if (empty($firstName)){
        $firstNameErr = "Voornaam is verplicht";
    } else {
        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]*$/",$firstName)) {
            $firstNameErr = "Alleen letters en spaties zijn toegestaan";
        }
    }

    if (empty($lastName)){
        $lastNameErr = "Achternaam is verplicht";
    } else {
        if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\-\s]*$/",$lastName)) {
            $lastNameErr = "Alleen letters en spaties zijn toegestaan";
        }
    }

    if (empty($email)){
        $emailErr = "E-mail is verplicht";
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Ongeldig e-mailadres";
        }
    }

    if (empty($password)){
        $passwordErr = "Kies een wachtwoord";
    }

    if (empty($passwordRepeat)){
        $passwordRepeatErr = "Herhaal het gekozen wachtwoord";
    }

    if(!empty($password&&$passwordRepeat)){
        if(!($password === $passwordRepeat)){
            $passwordRepeatErr = "Herhaald wachtwoord komt niet overeen";
        }
    }
    
    if(empty($firstNameErr)&&(empty($lastNameErr))&&(empty($emailErr))&&(empty($passwordErr))&&(empty($passwordRepeatErr)))
    {
       require 'user_service.php';
       $userInput = createUserArray($firstName, $lastName, $email, $password);
       if(userExists($email)){
           $emailExistsErr = "Er bestaat al een account met dit e-mailadres";
       } else { 
           saveUser($userInput);
       }

       if(empty($firstNameErr)&&(empty($lastNameErr))&&(empty($emailErr))&&(empty($emailExistsErr))&&(empty($passwordErr))&&(empty($passwordRepeatErr)))
       {
       $valid = true;
       }
   }


};


if($valid == false){
    echo '<h2>Maak een account aan</h2>
    <div class="content">
    <form method="post" action="index.php?">
        <input type=hidden name="page" value="register">
        <fieldset>
        <div>
            <label for=firstName>Voornaam:</label>
            <input type="text" id="firstName" name="firstName" value= "' . $firstName . '"> 
            <span class="error">'.$firstNameErr.'</span>
        </div>
        <div>
            <label for=lastName>Achternaam:</label>
            <input type="text" id="lastName" name="lastName" value= "' . $lastName . '">
            <span class="error">'.$lastNameErr.'</span>
        </div>
        <div>
            <label for=email>E-mail:</label>
            <input type="email" id="email" name="email" value="' . $email . '">
            <span class="error">'.$emailErr.'</span>
            <span class="error">'.$emailExistsErr.'</span>
        </div>
        <div>
            <label for=password>Wachtwoord:</label>
            <input type="password" id="password" name="password" value="'.$password.'">
            <span class="error">'.$passwordErr.'</span>
        </div>
        <div>
            <label for=passwordRepeat>Herhaal je wachtwoord:</label>
            <input type="password" id="passwordRepeat" name="passwordRepeat" value="'.$passwordRepeat.'">
            <span class="error">'.$passwordRepeatErr.'</span>
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
        <h2>Welkom, '.$firstName.'!</h2>
        <p>Hier komt login</p>
        <p>'.$test.'</p>
    </div>';
};