<?php
require_once '../db/DBHelper.php';
require_once '../helpers/RedirectHelper.php';
//get data from the submitted form
$password = isset($_POST['password']) ? $_POST['password'] : "";
$password2 = isset($_POST['password2']) ? $_POST['password2'] : "";
$return = new stdClass();
if(CheckPasswords($password, $password2)){    
    $RH = new RedirectHelper();
    $return->success = true;
    $return->errorMessage = "";
    $return->data = array();
    $return->data['location'] = $RH->Redirect('secretPerson');
}
else{
    $return->success = false;
    $return->errorMessage = "Password Change Failed";
}
echo json_encode($return);

function CheckPasswords($first, $second){
    session_start();
    if($first === $second){
        $DB = new DBHelper();
        if($DB->ChangePassword($_SESSION['user'], $first)){
            $_SESSION['resetRequired'] = false;
            return true;
        }
    }
    return false;
}

