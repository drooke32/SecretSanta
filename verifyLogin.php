<?php
require_once 'php/LoginHelper.php';
$LH = new LoginHelper();
//get data from the submitted form
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$return = new stdClass();
if($location = $LH->Login($username, $password)){        
    $return->success = true;
    $return->errorMessage = "";
    $return->data = array();
    $return->data['location'] = $location;
}
else{
    $return->success = false;
    $return->errorMessage = "Login failed";
}
echo json_encode($return);

