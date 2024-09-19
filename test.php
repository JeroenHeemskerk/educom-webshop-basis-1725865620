<?php

function createUserArray($firstName, $lastName, $email, $password):array
{
    $combineNames = array($firstName, $lastName);
    $userName = implode(' ',$combineNames);
    $userArray = array();
    array_push($userArray, $email, $userName, $password, PHP_EOL);
    return $userArray;
}

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