<?php

$file = "users/users.txt";


//return example: ['appel', 'peer@banaamail.com','welkom2024']
function getUser(string $email): ?array
{
    $userData = fopen("users/users.txt", "r");
    while (!feof($userData)){
        fgets($userData);
        
    } 
    //open bestand en loop door de regels
        //check of email bevat
        //zo ja > transfrom naar array en return deze

    //als user niet bestaat? > null
}

function saveUser(array $userData): void
{
    //transofrmeren naar string
    //wegschrijven naar bestand
    //nieuwe regel toevegen aan bestand
}

function userExists(string $email): bool
{
    if (empty(getUser($email))) {
        return false;
    }

    return true;
}

function transformRecordToArray(string $record): array
{
    $result = explode('|', $record);
    return $result;
}

function transformArrayToRecord(array $userData): string
{
    $result = implode('|', $userData);
    return $result;
}