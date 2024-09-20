<?php

function getUser(string $email): ?array
{
    $userData = fopen("users/users.txt", "r");
    while (!feof($userData)){
        if(str_contains(fgets($userData), $email)){
            $foundUser = transformRecordToArray(fgets($userData));
            return $foundUser;
        }}
    $foundUser = null;
    return $foundUser;
    
    fclose($userData);
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