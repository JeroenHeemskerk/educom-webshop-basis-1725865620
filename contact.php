<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css">
        
        <title>Educom Webshop Basis</title>
    
    </head>
    <body>
        <?php
        //initiate variables to collect form input
        $salutation = $firstName = $lastName = $email = $phone = $street = $housenumber = $housenumberAddition = $postalcode = $city = $commPreference = $message = '';

        $salutationErr = $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $streetErr = $housenumberErr = $housenumberAdditionErr = $postalcodeErr = $cityErr = $commPreferenceErr = $messageErr = ''; //iniate variables to enter error messages

        $emailRequired = $phoneRequired = $adressRequired = false;

        $valid = false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            function cleanString($string) {
                $string = trim($string);
                $string = stripslashes($string);
                $string = htmlspecialchars($string);
                return $string;
            }

            function getPostVar($key, $default=''){
                if(isset($_POST[$key])){
                    return cleanString($_POST[$key]);
                }
                return $default;
            }

            $salutation = getPostVar('salutation');
            $firstName = getPostVar('firstName');
            $lastName = getPostVar('lastName');
            $commPreference = getPostVar('commPreference');
            $email = getPostVar('email');
            $phone = getPostVar('phone');
            $street = getPostVar('street');
            $housenumber = getPostVar('housenumber');
            $housenumberAddition = getPostVar('housenumberAddition');
            $postalcode = getPostVar ('postalcode');
            $city = getPostVar('city');
            $message = getPostVar('message');

            /*validate that salutation is selected */

            if(empty($firstName)) {
                $firstNameErr = "Voornaam is vereist";
            } else {
                if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ]|\s]*$/",$firstName)) {
                   $firstNameErr = "Alleen letters en spaties zijn toegestaan";
                }
            }

            if(empty($lastName)) {
                $lastNameErr = "Achternaam is vereist";
            } else {
                if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ]|\s*$/",$lastName)) {
                    $lastNameErr = "Alleen letters en spaties zijn toegestaan";
                }
            }
            
         
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
                case "";
                    $commPreferenceErr = "Selecteer een communicatievoorkeur";
                    break;
                default:
                    $commPreferenceErr = "Onbekende communicatievoorkeur";
                    break;

            }
            
            if(empty($email)){
                if($emailRequired){
                    $emailErr = "E-mail is vereist";
                }
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr = "Ongeldig e-mailadres";
                }
            }

            if(empty($phone)){
                if($phoneRequired){
                    $phoneErr = "Telefoonnummer vereist";
                }
            } else {
                if(!preg_match('/^[0-9]{10}$/', $phone)){
                    $phoneErr = "Ongeldig telefoonnummer";
                }
            }

            if(!(
                empty($treet) && 
                empty($housenumber) &&
                empty($housenumberAddition) &&
                empty($postalcode) &&
                empty($city))
                
            ){
                $adressRequired = true;
            }

            if($adressRequired){
                if(empty($street)) {
                    $streetErr = "Straatnaam is vereist";
                } else {
                    if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ]|\s*$/",$street)) {
                        $streetErr = "Alleen letters en spaties zijn toegestaan";
                    } //valideer geldige straatnaam//
                }
                
    
                if(empty($housenumber)) {
                    $housenumberErr = "Huisnummer is vereist";
                } else {
                    if(!preg_match('/^\d{0,6}$/', $housenumber)){
                        $housenumberErr = "Alleen cijfers zijn toegestaan";
                    }
                    //valideer geldig huisnummer//

                } 

                if(!empty($housenumberAddition)) {
                    if(!preg_match('/^\w{0,6}$/', $housenumberAddition)){
                        $housenumberAdditionErr = "Ongeldige toevoeging";
                    }
                    //valideer geldige tekens//

                }

                if(empty ($postalcode)) {
                 $postalcodeErr = "Postcode is vereist";
                } else {
                    if(!preg_match('/^\d*[1-9]{1}[0-9]{3}\W*[a-zA-Z]{2}\W*$/', $postalcode)){
                        $postalcodeErr = "Ongeldige postcode";
                    } else {
                        $cleanPostalcode = str_replace(" ", "", $postalcode);
                        $uppercasePostalcode = strtoupper($cleanPostalcode);
                        $postalcode = $cleanPostalcode;
                    }
                    //valideer geldige postcode

                }  

                if(empty($city)) {
                    $cityErr = "Stad is vereist";
                } else {
                    if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ]*$/",$city)) {
                        $cityErr = "Alleen letters en spaties zijn toegestaan";
                    } //valideer geldige stadsnaam//
                }  
            }

            if(empty($message)) {
                $messageErr = "Bericht is vereist";
            } else {
                //validate appropriate length
            }
            
            //validate form
            if(empty($salutationErr)&&  empty($firstNameErr)&& empty($lastNameErr)&& empty($emailErr)&& empty($phoneErr)&& empty($streetErr)&& empty($housenumberErr)&& empty($housenumberAdditionErr)&& empty ($postalcodeErr)&& empty($cityErr)&& empty($commPreferenceErr)&& empty($messageErr)){
                $valid = true;
            }
            
        }
        ?>
        <!--navigation bar-->
        <div class="navbar">
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="about.html">ABOUT</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </div>
        
        <div class="content"><!--content-->      
            <!--contact formulier -->
            <?php if(!$valid){ /*Show only if form is not valid*/?>

            <h2>Contactformulier</h2>
            <form method="post">


                <div>
                    <label for="salutation">Aanhef</label>
                    <select id="salutation" name="salutation" required>
                        <option value="">Maak een keuze</option>
                        <option value="mrs" <?php if(isset($salutation) && $salutation=="mrs") echo 'selected';?> >Mevr.</option>
                        <option value="mr" <?php if(isset($salutation) && $salutation=="mr") echo 'selected';?> >Dhr.</option>
                        <option value="mx" <?php if(isset($salutation) && $salutation=="mx") echo 'selected';?> >Mx.</option>
                        <option value="undisclosed" <?php if(isset($salutation) && $salutation=="undisclosed") echo 'selected';?> >Zeg ik liever niet</option>
                    </select>
                    <span class="error"><?php echo $salutationErr;?></span>
                </div> 
                <div>     
                    <label for="firstName">Voornaam:</label>
                    <input type="text" id="firstName" name="firstName" value="<?php echo $firstName;?>">
                    <span class="error"><?php echo $firstNameErr;?></span>
                </div>
                <div>
                    <label for="lastName">Achternaam:</label>
                    <input type="text" id="lastName" name="lastName" value="<?php echo $lastName;?>">
                    <span class="error"><?php echo $lastNameErr;?></span>
                </div>

                <!--e-mail input-->
                <div>
                    <label for="email">E-mail adres:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email;?>">
                    <span class="error"><?php echo $emailErr;?></span>
                </div>
                <!--telefoon input-->
                <div>
                    <label for="phone">Telefoonnummer:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $phone;?>">
                    <span class="error"><?php echo $phoneErr;?></span>
                </div>
                <!--adres input-->
                <div>
                    <fieldset>
                        <div>
                            <label for="street">Straatnaam:</label>
                            <input type="text" id="street" name="street" value="<?php echo $street;?>">
                            <span class="error"><?php echo $streetErr;?></span>
                        </div>
                        <div>
                            <label for="housenumber">Huisnummer:</label>
                            <input type="text" id="housenumber" name="housenumber" value="<?php echo $housenumber;?>">
                            <span class="error"><?php echo $housenumberErr;?></span>
                        </div>
                        <div>
                            <label for="housenumberAddition">Toevoegingen:</label> 
                            <input type="text" id="housenumberAddition" name="housenumberAddition" value="<?php echo $housenumberAddition;?>">
                            <span class="error"><?php echo $housenumberAdditionErr;?></span>
                        </div>
                        <div>
                            <label for $postalcode">Postcode:</label>
                            <input type="text" id="postalcode" name="postalcode" value="<?php echo $postalcode;?>">
                            <span class="error"><?php echo $postalcodeErr;?></span>
                        </div>
                        <div>
                            <label for="city">Stad:</label>
                            <input type="text" id="city" name="city" value="<?php echo $city;?>">
                            <span class="error"><?php echo $cityErr;?></span>
                        </div>
                    </fieldset>
                </div>    
                <!--communicatievoorkeur"-->
                <p><b>Geef een communicatievoorkeur aan:  </b><span class="error"><?php echo $commPreferenceErr;?></span></p>

                <div  class="radiobuttons">
                    <ul>
                        <li>
                            <input type="radio" id="commPreferenceEmail" name="commPreference" value="email" <?php if($commPreference=="email") echo 'checked';?> required>
                            <label for="commPreferenceEmail">E-mail</label>
                        </li>
                        <li>
                            <input type="radio" id="commPreferencePhone" name="commPreference" value="phone" <?php if($commPreference=="phone") echo 'checked';?>  >
                            <label for="commPreferencePhone">Telefoon</label>
                        </li>
                        <li>
                            <input type="radio" id="commPreferencePost" name="commPreference" value="post" <?php if($commPreference =="post") echo 'checked';?>  >
                            <label for="commPreferencePost">Post</label>
                        </li>
                    </ul>
                </div>
                
                
                
                <!--bericht-->
                <div>
                    <h3>Bericht</h3>
                    <textarea name="message" rows="10" cols="30" placeholder="Type hier je bericht..."><?php echo $message;?></textarea>
                    <span class="error"><?php echo $messageErr;?></span>
                </div>
                <!--Een verstuur knop.-->
                <input type="submit"></input>
            </form> 


            <?php } else { /*shown if form is valid*/ ?>
            <div class="content">
                <block>
                    <h2>Bedankt voor uw bericht</h2>    
                    <h3>Er zal zo snel mogelijk contact worden opgenomen via onderstaande contactgegevens:</h3>
                    <p><?php echo "Naam: " . $firstName . " " . $lastName ?></P>
                    <p><?php echo "E-mail: " . $email ?></p>
                    <p><?php echo "Telefoon: " . $phone ?></p>
                    <p><?php echo "Adres: " . $street . " " . $housenumber, $housenumberAddition . " " . $postalcode . " " . $city; ?> </p>
                </block>
            </div>
            <?php } /*end of conditional*/?>
        </div>
        <footer>
            <!--copyright reken, jaartal en auteur-->
            <p>&copy;2024 Lonne Olmeyer</p>
        </footer>  
    </body>

 

</html>