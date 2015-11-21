<?php
include "DBHelper.php";



function AddItem($itemString, $userID){
    //TODO handle cleaning before generating the query
    $query = "INSERT INTO Items VALUES(".$itemString.",".$userID.")";
    Query($query);
    //check for errors
}

function DeleteItem($itemID){
    //TODO handle cleaning before generating the query
    $query = "DELETE FROM Items WHERE itemID=".$itemID;
    Query($query);
    //check for errors
}

function EditItem($itemID, $itemString){
    //TODO handle cleaning before generating the query
    $query = "UPDATE Items SET item='".$itemString."' WHERE itemID=".$itemID;
    Query($query);
    //check for errors
}

function GetItem($itemID){
    //TODO handle cleaning before generating the query
    $query = "SELECT * Items WHERE itemID=".$itemID;
    Query($query);
    //check for errors
}

function GetAllItems($userID){
    //TODO handle cleaning before generating the query
    $query = "SELECT * Items WHERE userID=".$userID;
    Query($query);
    //check for errors
}