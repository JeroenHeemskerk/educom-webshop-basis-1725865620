<?php
$userFile = fopen('users/users.txt', 'a+') or die ("File doesn't exist!");

$newUser = "h.kaas@gmail.com|Ham Kaas|HamKaas2!";
fwrite($userFile, $newUser);

$newUser = "tostibakkertje69@jemoeder.com|Tony Tosti|LekkerTosti5!";
fwrite($userFile, $newUser);



fclose($userFile);


?>