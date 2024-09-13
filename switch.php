<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css">

        <title>Educom Webshop Basis</title>

    </head>

    <body>
        <?php

        $salutation = $firstName = $lastName = $email = $phone = $street = $housenumber = $housenumberAddition = $postal = $city = $commPreference = $message = '';

        $salutationErr = $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $streetErr = $housenumberErr = $housenumberAdditionErr = $postalErr = $cityErr = $commPreferenceErr = $messageErr = ''; //iniate variables to enter error messages

        $valid = false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            function cleanString($string) {
                $string = trim($string);
                $string = stripslashes($string);
                $string = htmlspecialchars($string);
                return $string;
            }
            
            if(empty($_POST["salutation"])) {
                $salutationErr = "Aanhef is vereist";
            } else {
                $salutation = cleanString($_POST["salutation"]);
            }
            
            if(empty($_POST["firstName"])) {
                $firstNameErr = "Voornaam is vereist";
            } else {
                $firstName = cleanString($_POST["firstName"]);
                if (!preg_match("/^[a-zA-Z-']*$/",$firstName)) {
                   $firstNameErr = "Alleen letters en spaties zijn toegestaan";
                }
            }

            if(empty($_POST["lastName"])) {
                $lastNameErr = "Achternaam is vereist";
            } else {
                $lastName = cleanString($_POST["lastName"]);
                if (!preg_match("/^[a-zA-Z-']*$/",$firstName)) {
                    $firstNameErr = "Alleen letters en spaties zijn toegestaan";
                }
            }
            
            if(empty($_POST["commPreference"])) {
            $commPreferenceErr = "Selecteer een communicatievoorkeur";
            } else {
                switch ($commPreference) {
                    case "email":
                        $emailRequired = true;
                        break;
                    case "phone":
                        $phoneRequired = true;
                        break;
                    case "post":
                        $adressRequired = true;
                        break;
                }
            
            if(empty($_POST["email"])){
                if($emailRequired){
                    $emailErr = "E-mail is vereist"
                }
            } else {
                $email = cleanString($_POST["email]"]);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr = "Ongeldig e-mailadres";
                }
            }

            if(empty($_POST["phone"])){
                if($phoneRequired){
                    $phoneErr = "Telefoonnummer vereist";
                }
            } else {
                $phone = cleanString ($_POST["phone"]);
                if(!preg_match('/^[0-9]{10}=$/', $phone)){
                    $phoneErr = "Ongeldig telefoonnummer";
                } //TESTEN//
            }

            if(!(
                empty($treet) && 
                empty($housenumber) &&
                empty($housenumberAddition) &&
                empty ($postal) &&
                empty ($city))
                
            ){
                $adressRequired = true;
            }

            if($adressRequired){
                if(empty($_POST["street"])) {
                    $streetErr = "Straatnaam is vereist";
                } else {
                    $street = cleanString($_POST["street"]);
                    if (!preg_match("/^[a-zA-Z-']*$/",$street)) {
                        $streetErr = "Alleen letters en spaties zijn toegestaan";
                    }

                }
    
                if(empty($_POST["housenumber"])) {
                    $housenumberErr = "Huisnummer is vereist";
                } else {
                    $housenumber = cleanString($_POST["housenumber"]);

                } 

                if(!empty($_POST["housenumberAddition"])) {
                    $housenumberAddition = cleanString($_POST["housenumberAddition"]);

                }

                if(empty($_POST["postal"])) {
                    $postalErr = "Postcode is vereist";
                } else {
                    $postal = cleanString($_POST["postal"]);

                }  

                if(empty($_POST["city"])) {
                    $cityErr = "Stad is vereist";
                } else {
                    $city = cleanString($_POST["city"]);
                    if (!preg_match("/^[a-zA-Z-']*$/",$firstName)) {
                        $firstNameErr = "Alleen letters en spaties zijn toegestaan";
                    }
                }  
            }

        ?>

    </body>
</html>