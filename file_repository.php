<?php

function getUser(string $email): ?array
{
    $userData = fopen("users/users.txt", "r");
    try {

        while (!feof($userData)){
            $line = fgets($userData);
            $parts = explode ('|', $line);
            if($parts[0] == $email) {
                $foundUser = array('email' => $parts[0], 'name' => $parts[1], 'password' => $parts[2]);
                return $foundUser;
            }
        }
        return null;
        }
        finally {
            fclose($userData);
        }
    }


function saveUser(array $userArray): void
{
    $newUser = transformArrayToRecord($userArray);
    $userData = fopen("users/users.txt", "a");
    try {
        fwrite($userData, $newUser);
    }
    finally {
        fclose($userData);
    }
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