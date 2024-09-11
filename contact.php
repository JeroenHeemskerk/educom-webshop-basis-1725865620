<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <?php
        //initiate variables 


        //validate POST data

        // GET data 
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
            <form>
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
        
    </body>

 <footer>
  <!--copyright reken, jaartal en auteur-->
  <p>&copy;2024 Lonne Olmeyer</p>
 </footer>

</html>
