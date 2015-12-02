<?php
require_once 'helpers/HTMLHelper.php';
require_once 'db/DBHelper.php';

$DB = new DBHelper();
session_start();
$items = $DB->GetUserChristmasList($_SESSION['user']);
$secretPerson = $DB->GetSecretUsername($_SESSION['user']);

$HTML = new HTMLHelper();
$HTML->DefaultHeader('secretPerson');
$HTML->OpenBody();
    $HTML->Banner("");
    $HTML->Element('div', 'row button-row centered');
        $HTML->Element('div', 'twelve columns');
            $HTML->Element('button', 'button-primary', array('id'=>'show-secret'));
                $HTML->Element('span', 'fa fa-search fa-fw');$HTML->Close('span'); echo "Show Secret Person";
            $HTML->Close('button');
        $HTML->Close('div');
    $HTML->Close('div');
    $HTML->Element('div', 'row secret-container hidden');
        $HTML->Element('div', 'twelve columns centered');
            $HTML->Element('h4'); echo "Secret Person: ".$secretPerson; $HTML->Close('h4');
        $HTML->Close('div');
        $HTML->Element('div', 'twelve columns');
            foreach($items as $item){
                $HTML->ListItem($item['itemID'], $item['item'], $item['location'], true);
            }
        $HTML->Close('div');
    $HTML->Close('div');
$HTML->CloseBody();



