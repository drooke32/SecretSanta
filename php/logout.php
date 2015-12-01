<?php
require_once '../helpers/RedirectHelper.php';

$RH = new RedirectHelper();
$return = new stdClass();
session_start();
$_SESSION['logged'] = false;
session_reset();

$return->success = true;
$return->errorMessage = "";
$return->location = $RH->Redirect('login');

echo json_encode($return);


