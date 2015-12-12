<?php
require_once '../db/DBHelper.php';
require_once '../helpers/HTMLHelper.php';

function AddNewItem($return){
    $DB = new DBHelper();
    $HTML = new HTMLHelper();
    $item = $_POST['item']; $location = $_POST['location']; $userID = $_SESSION['user'];
    if($location == null || $location == ""){
        $location = "N/A";
    }
    if($itemID = $DB->AddChristmasListItem($item, $location, $userID)){
        $return->success = true;
        $return->data = $HTML->ListItem($itemID, $item, $location, true);
        $return->type = 'add';
    }
    else{
        $error = $DB->GetError();
        $return->success = false;
        $return->error = "Failed to add item";
    }   
    return $return;
}

function EditExistingItem($return){
    $DB = new DBHelper();
    $item = $_POST['item']; $location = $_POST['location']; $itemID = $_POST['edit-id'];
    if($DB->EditChristmasListItem($item, $location, $itemID)){
        $return->success = true;
        $return->data = PackageData($item, $location,$itemID);
        $return->type = 'edit';
    }
    else{
        $return->success = false;
        $return->error = "Failed to edit item";
    } 
    return $return;
}

function DeleteExistingItem($return){
    $DB = new DBHelper();
    $itemID = $_POST['delete-id'];
    if($DB->DeleteChristmasListItem($itemID)){
        $return->success = true;
        $return->id = $itemID;
    }
    else{
        $return->success = false;
        $return->error = "Failed to delete item";
    }
    
    return $return;
}

function PackageData($item = null, $location = null, $itemID = null){
    $package = array();
    $package['Item'] = $item;
    $package['Location'] = $location;
    $package['Id'] = $itemID;    
    return $package;
}

session_start();
$return = new stdClass();
if(isset($_POST['item-action'])){
    $action = $_POST['item-action'];
    switch($action){
        case "add":
            $return = AddNewItem($return);
            break;
        case "edit":
            $return = EditExistingItem($return);
            break;
        case "delete":
            $return = DeleteExistingItem($return);
            break;
    }
}
else{
    $return->success = false;
    $return->error = "No action sent";
}

echo json_encode($return);