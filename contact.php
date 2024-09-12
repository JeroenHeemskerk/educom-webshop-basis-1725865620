<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css">
        
        <title>Educom Webshop Basis</title>
    
    </head>
    <body>
        <?php
        //initiate variables 
        $salutation = $firstName = $lastName = $email = $phone = $street = $housenumber = $housenumberAddition = $postal = $city = $commPreference = $message = '';

        $salutationErr = $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $streetErr = $housenumberErr = $housenumberAdditionErr = $postalErr = $cityErr = $commPreferenceErr = $messageErr = '';

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
                $firstName = cleanString($_POST["firstName"]);
                if (!preg_match("/^[a-zA-Z-']*$/",$firstName)) {
                   $firstNameErr = "Alleen letters en spaties zijn toegestaan";
                }
            }

            if(empty($_POST["lastName"])) {
                $lastNameErr = "Achternaam is vereist";
            } else {
                $lastName = cleanString($_POST["lastName"]);
            }
            
            switch ($commPreference) { //switch werkt niet//
                case "email":
                    if(empty($_POST["email"])) {
                        $emailErr = "E-mail is vereist";
                    } else {
                        $email = cleanString($_POST["email"]);
                        $email = cleanString($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                           $emailErr = "Ongeldig e-mail adres";
                        }
                    }
                    break;
                case "phone":
                    if(empty($_POST["phone"])) {
                        $phoneErr = "Telefoonnummer is vereist";
                    } else {
                        $phone = cleanString($_POST["phone"]);
                        $phone = cleanString($_POST["phone"]);
                        if (!filter_var($phone, FILTER_VALIDATE_INT)){
                           $phoneErr = "Ongeldig telefoonummer";
                        }
                    }
                    break;
                case "postal":
                    if(empty($_POST["street"])) {
                        $streetErr = "Straatnaam is vereist";
                    } else {
                        $street = cleanString($_POST["street"]);
                    }
        
                    if(empty($_POST["housenumber"])) {
                        $housenumberErr = "Huisnummer is vereist";
                    } else {
                        $housenumber = cleanString($_POST["housenumber"]);
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
                    }  
                    break;
                case (empty($_POST["commPreference"])):
                    if(empty($_POST["commPreference"])) {
                    $commPreferenceErr = "Selecteer een communicatievoorkeur";
                    } else {
                        $commPreference = cleanString($_POST["commPreference"]);
                    }
                    break; 
                }
            

            //Validate adress complete if one or more fields are filled

            if(empty($_POST["message"])) {
                $messageErr = "Bericht is vereist";
            } else {
                $message = cleanString($_POST["message"]);
            }

            

            
            
            //validate form
            
        }

        if(empty($salutationErr, $firstNameErr, $lastNameErr, $emailErr, $phoneErr, $streetErr, $housenumberErr, $housenumberAdditionErr, $postalErr, $cityErr, $commPreferenceErr, $messageErr)){
            $valid = true}
        
        
        // in body, display form with errors or success message
        ?>
        <!--navigation bar-->
        <div class="navbar">
            <ul class="navbar">
                <li class="navbar"><a href="index.html">HOME</a></li>
                <li class="navbar"><a href="about.html">ABOUT</a></li>
                <li class="navbar"><a href="contact.php">CONTACT</a></li>
            </ul>
        </div>
        
        <div class="content"><!--content-->      
            <!--contact formulier -->
            <?php if($valid=false){?>
            <h2>Contactformulier</h2>
            <form method="post">
                <!--aanhef & naam -->
                <h3>Naam</h3>
                <div>
                    <label for="salutation">Aanhef</label>
                    <select id="salutation" name="salutation">
                        <option value="mrs">Mevr.</option>
                        <option value="mr">Dhr.</option>
                        <option value="mx">Mx.</option>
                        <option value="undisclosed">Zeg ik liever niet</option>
                    </select>
                    <span class="error"><?php echo $salutationErr;?></span>
                </div> 
                <div>     
                    <label for="firstName">Voornaam:</label>
                    <input type="text" id="firstName" name="firstName">
                    <span class="error"><?php echo $firstNameErr;?></span>
                </div>
                <div>
                    <label for="lastName">Achternaam:</label>
                    <input type="text" id="lastName" name="lastName">
                    <span class="error"><?php echo $lastNameErr;?></span>
                </div>
                
                <!--contactgegevens-->
                <h3>Contactgegevens</h3>
                <!--e-mail input-->
                <div>
                    <label for="email">E-mail adres:</label>
                    <input type="email" id="email" name="email">
                    <span class="error"><?php echo $emailErr;?></span>
                </div>
                <!--telefoon input-->
                <div>
                    <label for="phone">Telefoonnummer:</label>
                    <input type="tel" id="phone" name="phone">
                    <span class="error"><?php echo $phoneErr;?></span>
                </div>
                <!--adres input-->
                <div>
                    <fieldset>
                        <div>
                            <label for="street">Straatnaam:</label>
                            <input type="text" id="street" name="street">
                            <span class="error"><?php echo $streetErr;?></span>
                        </div>
                        <div>
                            <label for="housenumber">Huisnummer:</label>
                            <input type="text" id="housenumber" name="housenumber">
                            <span class="error"><?php echo $housenumberErr;?></span>
                        </div>
                        <div>
                            <label for="housenumberAddition">Toevoegingen:</label> 
                            <input type="text" id="housenumberAddition" name="housenumberAddition">
                            <span class="error"><?php echo $housenumberAdditionErr;?></span>
                        </div>
                        <div>
                            <label for="postal">Postcode:</label>
                            <input type="text" id="postal" name="postal">
                            <span class="error"><?php echo $postalErr;?></span>
                        </div>
                        <div>
                            <label for="city">Stad:</label>
                            <input type="text" id="city" name="city">
                            <span class="error"><?php echo $cityErr;?></span>
                        </div>
                    </fieldset>
                </div>    
                <!--communicatievoorkeur"-->
                <p><b>Geef een communicatievoorkeur aan:</b></p>
                <div>
                    <label for="commPreferenceEmail">E-mail</label>
                    <input type="radio" id="commPreferenceEmail" name="commPreference" value="email">
                    <label for="commPreferencePhone">Telefoon</label>
                    <input type="radio" id="commPreferencePhone" name="commPreference" value="phone">
                    <label for="commPreferencePostal">Post</label>
                    <input type="radio" id="commPreferencePostal" name="commPreference" value="postal">
                    <span class="error"><?php echo $commPreferenceErr;?></span>
                </div>
                
                
                
                <!--bericht-->
                <h3>Bericht</h3>
                <textarea name="message" rows="10" cols="30" placeholder="Type hier je bericht..."></textarea>
                <span class="error"><?php echo $messageErr;?></span>
                <!--Een verstuur knop.-->
                <input type="submit"></input>
            </form> 

            <?php } else {?>
            <h2>Bedankt voor uw bericht</h2>
            <p>Er zal zo snel mogelijk contact worden opgenomen via onderstaande contactgegevens:</p>
            <p></p>
            <?php}?>
        </div>
        <footer>
            <!--copyright reken, jaartal en auteur-->
            <p>&copy;2024 Lonne Olmeyer</p>
        </footer>  
    </body>

 

</html>
