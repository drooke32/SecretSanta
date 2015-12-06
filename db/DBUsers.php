<?php
require "Encryptor.php";

function AddUser($name, $password){
    $cleanName = CleanString($name);
    if(!GetUserByName($cleanName)){
        $hashedPassword = password_Hash($password, PASSWORD_DEFAULT);
        return DBQuery("INSERT INTO Users (username, password) VALUES('".$cleanName."', '".$hashedPassword."')");
    }
    return false;
}

function GetUserByID($userID){
    return DBSelect("SELECT * FROM Users WHERE userID=".$userID);
}

function GetUserByName($name){
    return DBSelect("SELECT * FROM Users WHERE username='".CleanString($name)."'");
}

function GetSecretUser($encryptedID){
    if($userID = DecryptUser($encryptedID)){
        return GetUserByID($userID);
    }
    return false;
}

function SaveSecretUser($userID, $secretID){
    $encryptedID = EncryptUser($secretID);
    return DBQuery("UPDATE Users SET secretPerson='".$encryptedID."' WHERE userID=".$userID);
}

function GetAllUserIDs(){
    return DBSelect("SELECT userID FROM Users");
}

function GetAllUsers(){
    return DBSelect("SELECT userID, username FROM Users");
}

function ClearSecretUsers(){
    return DBQuery("UPDATE Users SET secretPerson=null");
}

function SavePassword($userID, $newPass){
    $hash = password_hash($newPass, PASSWORD_DEFAULT);
    return DBQuery("UPDATE Users SET password='".$hash."', passwordreset=0 WHERE userID=".$userID);
}