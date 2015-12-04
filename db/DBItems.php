<?php

function AddItem($item, $location, $userID){
    $query = "INSERT INTO Items (item, location, userID) VALUES('".CleanString($item)."','".CleanString($location)."',".CleanString($userID).")";
    return DBInsert($query);
}

function DeleteItem($itemID){
    $query = "DELETE FROM Items WHERE itemID=".CleanString($itemID);
    return DBQuery($query);
}

function EditItem($itemID, $item, $location){
    $query = "UPDATE Items SET item='".CleanString($item)."', location='".CleanString($location)."' WHERE itemID=".CleanString($itemID);
    return DBQuery($query);
}

function GetItemByID($itemID){
    $query = "SELECT * FROM Items WHERE itemID=".CleanString($itemID);
    return DBSelect($query);
}

function GetAllItemsByUserID($userID){
    $query = "SELECT * FROM Items WHERE userID=".CleanString($userID);
    return DBSelect($query);
}