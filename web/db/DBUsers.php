<?php
require "Encryptor.php";

function AddUser($name, $password){
    $cleanName = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
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
    $cleanName = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    return DBSelect("SELECT * FROM Users WHERE username='".$cleanName."'");
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

/**
 * 
 * @return result
 */
function ClearSecretUsers(){
    return DBQuery("UPDATE Users SET secretPerson=null");
}