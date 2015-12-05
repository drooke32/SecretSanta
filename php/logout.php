<?php
require_once '../helpers/RedirectHelper.php';

$RH = new RedirectHelper();
$return = new stdClass();
session_start();
$_SESSION['logged'] = false;
session_unset();

$return->success = true;
$return->errorMessage = "";
$return->location = '/login.php';

echo json_encode($return);


