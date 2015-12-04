<?php
require_once 'helpers/HTMLHelper.php';
require_once 'db/DBHelper.php';

$DB = new DBHelper();
session_start();
$items = $DB->GetUserChristmasList($_SESSION['user']);


$HTML = new HTMLHelper();
$HTML->DefaultHeader('christmasList');
$HTML->OpenBody();
    $HTML->Banner("My List", $_SESSION['name']);
    $HTML->Element('div', 'row');
        $HTML->Element('div', 'twelve columns');
            if(count($items) > 0){
                foreach($items as $item){
                    $HTML->ListItem($item['itemID'], $item['item'], $item['location'], true);
                }
            }else{
                echo "<h3 class='centered'> No Christmas list yet!</h3>";
            }
        $HTML->Close('div');
    $HTML->Close('div');
    $HTML->Element('div', 'add-button');
        $HTML->Element('span', 'span1');$HTML->Close('span');
        $HTML->Element('span', 'span2');$HTML->Close('span');
    $HTML->Close('div');
$HTML->CloseBody();
