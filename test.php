<?php

$email = 'appel@gmail.com';
$userName = 'appel';
$password = 'appel';

$userArray = array();
array_push($userArray, $email, $userName, $password, PHP_EOL);

function getUser(string $email): ?array
{
    $userData = fopen("users/users.txt", "r");
    while (!feof($userData)){
        if(str_contains(fgets($userData), $email)){
            $foundUser = transformRecordToArray(fgets($userData));
            echo 'user found';
            return $foundUser;
        }}
    $foundUser = null;
    return $foundUser;
    
    fclose($userData);
}

function userExists(string $email): bool
{
    if (empty(getUser($email))) {
        return false;
    }
    
    return true;
}

function saveUser(array $userArray): void{
    $newUser = transformArrayToRecord($userArray);
    $userData = fopen("users/users.txt", "a");
    fwrite($userData, $newUser);
    fclose($userData);
}

if(userExists($email)){
    echo 'Er is al een account met dit e-mailadres';
} else { 
    saveUser($userArray);
}

function transformRecordToArray(string $userRecord): array
{
    $newArray = explode('|', $userRecord);
    return $newArray;
}

function transformArrayToRecord(array $userArray): string
{
    $newRecord = implode('|', $userArray);
    return $newRecord;
}




?>