<?php
include "DBGateway.php";

function AddUser($name, $password){
    $cleanName = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    //Validate the data
    if(!GetUserByName($cleanName)){
        //clean the input
        //hash the password
        //call the query
        //check for errors 
    }
    //user already exists
    return false;
}

function GetUserByID($userID){
    //clean the input
    //call the query
    //check for errors
    return false;
}

function GetUserByName($name){
    //clean the input
    $cleanName = trim($name);
    $cleanName = filter_var($cleanName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    //call the query
    return DBSelect("SELECT * FROM Users WHERE username='".$cleanName."'");
}

function GetSecretUser($hashedID){
    //unhash the ID
    //clean input?
    //call Query
    //check for errors
    return false;
}