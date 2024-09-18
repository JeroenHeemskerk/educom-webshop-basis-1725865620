<?php
$firstName = $lastName = $email = $password = $passwordRepeat = '';

$firstNameErr = $lastNameErr = $emailErr = $passwordErr = $passwordRepeatErr = '';

$errorArray = array($firstNameErr, $lastNameErr, $emailErr, $passwordErr, $passwordRepeatErr);

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
        $passwordRepeat = "Herhaal het gekozen wachtwoord";
    }

    if(!empty($password&&$passwordRepeat)){
        if(!($password === $passwordRepeat)){
            $passwordRepeatErr = "Herhaald wachtwoord komt niet overeen";
        }
    }

    
    if(empty($errorArray))
    {
        $valid = true;
    };

};


if(!$valid)
{
    echo '<h2>Maak een account aan</h2>
    <div class="content">
    <form method="post" action="index.php?page=register">
        <fieldset>
            <label for=firstName>Voornaam:</label>
            <input type="text" id="firstName" name="firstName" value= "' . $firstName . '"> 
            <label for=lastName>Achternaam:</label>
            <input type="text" id="lastName" name="lastName" value= "' . $lastName . '">
    
            <label for=email>E-mail:</label>
            <input type="email" id="email" name="email" value="' . $email . '">
        
            <label for=password>Wachtwoord:</label>
            <input type="password" id="password" name="password" value='.$password.'>
            <label for=passwordRepeat>Herhaal je wachtwoord:</label>
            <input type="password" id="passwordRepeat" name="passwordRepeat" value='.$passwordRepeat.'>
    
            <input type="submit">
        </fieldset>
    </form>
    </div>';
} else {
    echo "hoi";
};
?>
