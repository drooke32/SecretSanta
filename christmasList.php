<?php
require_once 'helpers/HTMLHelper.php';
require_once 'db/DBHelper.php';

$DB = new DBHelper();
session_start();
$items = $DB->GetUserChristmasList($_SESSION['user']);


$HTML = new HTMLHelper();
$HTML->DefaultHeader('secretPerson');
$HTML->OpenBody();
    $HTML->Banner("My List", $_SESSION['name']);
$HTML->CloseBody();
