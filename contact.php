<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <?php
        //initiate variables 
        $salutation = $firstName = $lastName = $email = $phone = $street = $housenumber = $housenumberAddition = $postal = $city = $commPreference = $message = '';

        $salutationErr = $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $streetErr = $housenumberErr = $housenumberAdditionErr = $postalErr = $cityErr = $commPreferenceErr = $messageErr = '';

        $valid = false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $salutation = test_input($_POST[salutation]);
            $firstName = test_input($_POST[firstName]);
            $lastName = test_input($_POST[lastName]);
            $email = test_input($_POST[email]);
            $phone = test_input($_POST[phone]);
            $street = test_input($_POST[street]);
            $housenumber = test_input($_POST[housenumber]);
            $housenumberAddition = test_input($_POST[housenumberAddition]);
            $postal = test_input($_POST[postal]);
            $city = test_input($_POST[city]);
            $commPreference = test_input($_POST[commPreference]);
            $message = test_input($_POST[message]);
            
            if(empty($_POST["salutation"])) {
                $salutationErr = "Aanhef is vereist";
            } else {
                $salutation = test_input($_POST["salutation"]);
            }

            if(empty($_POST["firstName"])) {
                $firstNameErr = "Voornaam is vereist";
            } else {
                $firstName = test_input($_POST["firstName"]);
            }

            if(empty($_POST["lastName"])) {
                $lastNameErr = "Achternaam is vereist";
            } else {
                $lastName = test_input($_POST["lastName"]);
            }

            switch ($commPreference) {
                case "email":
                    if(empty($_POST["email"])) {
                        $emailErr = "E-mail is vereist";
                    } else {
                        $email = test_input($_POST["email"]);
                    }
                    break;
                case "phone":
                    if(empty($_POST["phone"])) {
                        $phoneErr = "Telefoonnummer is vereist";
                    } else {
                        $phone = test_input($_POST{"phone"});
                    }
                    break;
                case "postal":
                    if(empty($_POST["street"])) {
                        $streetErr = "Straatnaam is vereist";
                    } else {
                        $street = test_input($_POST["street"]);
                    }
        
                    if(empty($_POST["housenumber"])) {
                        $housenumberErr = "Huisnummer is vereist";
                    } else {
                        $housenumber = test_input($_POST["housenumber"]);
                    } 

                    if(empty($_POST["postal"])) {
                        $postalErr = "Postcode is vereist";
                    } else {
                        $postal = test_input($_POST["postal"]);
                    }  

                    if(empty($_POST["city"])) {
                        $cityErr = "Stad is vereist";
                    } else {
                        $city = test_input($_POST["city"]);
                    }  
                case (empty($_POST["commPreference"])):
                    if(empty($_POST["commPreference"])) {
                    $commPreferenceErr = "Selecteer een communicatievoorkeur";
                    } else {
                        $commPreference = test_input($_POST["commPreference"]);
                    }
                }
                break;
            }

            //Validate adress complete if one or more fields are filled

            if(empty($_POST["message"])) {
                $messageErr = "Bericht is vereist";
            } else {
                $message = test_input($_POST["message"]);
            }

            

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //validate form

        $valid = //validate

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
            <h2>Contactformulier</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                </div> 
                <div>     
                    <label for="firstName">Voornaam:</label>
                    <input type="text" id="firstName" name="firstName">
                </div>
                <div>
                    <label for="lastName">Achternaam:</label>
                    <input type="text" id="lastName" name="lastName">
                </div>

                <!--contactgegevens-->
                <h3>Contactgegevens</h3>
                <!--e-mail input-->
                <div>
                    <label for="email">E-mail adres:</label>
                    <input type="email" id="email" name="email">
                </div>
                <!--telefoon input-->
                <div>
                    <label for="phone">Telefoonnummer:</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                <!--adres input-->
                <div>
                    <fieldset>
                        <div>
                            <label for="street">Straatnaam:</label>
                            <input type="text" id="street" name="street">
                        </div>
                        <div>
                            <label for="housenumber">Huisnummer:</label>
                            <input type="text" id="housenumber" name="housenumber">
                        </div>
                        <div>
                            <label for="housenumberAddition">Toevoegingen:</label> 
                            <input type="text" id="housenumberAddition" name="housenumberAddition">
                        </div>
                        <div>
                            <label for="postal">Postcode:</label>
                            <input type="text" id="postal" name="postal">
                        </div>
                        <div>
                            <label for="city">Stad:</label>
                            <input type="text" id="city" name="city">
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
                </div>
                


                <!--bericht-->
                <h3>Bericht</h3>
                <textarea name="message" rows="10" cols="30" placeholder="Type hier je bericht..."></textarea><br>
                <!--Een verstuur knop.-->
                <input type="submit"></input>
            </form> 

        </div>
        <footer>
        <!--copyright reken, jaartal en auteur-->
        <p>&copy;2024 Lonne Olmeyer</p>
        </footer>  
    </body>

 

</html>
