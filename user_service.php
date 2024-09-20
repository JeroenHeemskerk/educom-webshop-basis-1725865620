<?php
require 'file_repository.php';

function userExists(string $email): bool
{
    if (empty(getUser($email))) {
        return false;
    }
    
    return true;
}

function createUserArray($firstName, $lastName, $email, $password):array
{
    $combineNames = array($firstName, $lastName);
    $fullName = implode(' ',$combineNames);
    $formattedName = ucwords(strtolower($fullName));
    $formattedEmail = (strtolower($email));
    $userArray= [$formattedEmail, $formattedName, $password, PHP_EOL];
    return $userArray;
}