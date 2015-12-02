<?php

function AddItem($itemString, $location, $userID){
    $query = "INSERT INTO Items (item, location, userID) VALUES('".$itemString."','".$location."',".$userID.")";
    return DBQuery($query);
}

function DeleteItem($itemID){
    $query = "DELETE FROM Items WHERE itemID=".$itemID;
    return DBQuery($query);
}

function EditItem($itemID, $itemString){
    $query = "UPDATE Items SET item='".$itemString."' WHERE itemID=".$itemID;
    return DBQuery($query);
}

function GetItemByID($itemID){
    $query = "SELECT * FROM Items WHERE itemID=".$itemID;
    return DBSelect($query);
}

function GetAllItemsByUserID($userID){
    $query = "SELECT * FROM Items WHERE userID=".$userID;
    return DBSelect($query);
}