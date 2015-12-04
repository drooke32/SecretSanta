<?php
require_once 'helpers/HTMLHelper.php';
require_once 'db/DBHelper.php';

$DB = new DBHelper();
session_start();
$secretPerson = $DB->GetSecretUser($_SESSION['user']);
$items = $DB->GetUserChristmasList($secretPerson['userID']);


$HTML = new HTMLHelper();
$HTML->DefaultHeader('secretPerson');
$HTML->OpenBody();
    $HTML->Banner("", $_SESSION['name']);
    $HTML->Element('div', 'row button-row centered');
        $HTML->Element('div', 'twelve columns');
            $HTML->Element('button', 'button-primary', array('id'=>'show-secret'));
                $HTML->Element('span', 'fa fa-search fa-fw');$HTML->Close('span'); echo "Show Secret Person";
            $HTML->Close('button');
        $HTML->Close('div');
    $HTML->Close('div');
    $HTML->Element('div', 'row secret-container hidden');
        $HTML->Element('div', 'twelve columns centered');
            $HTML->Element('h4'); echo "Secret Person: ".ucfirst($secretPerson['username']); $HTML->Close('h4');
        $HTML->Close('div');
        $HTML->Element('div', 'twelve columns');
            if(count($items) > 0){
                foreach($items as $item){
                    echo $HTML->ListItem($item['itemID'], $item['item'], $item['location'], false);
                }
            }else{
                echo "<h3 class='centered'> No Christmas list yet!</h3>";
            }
        $HTML->Close('div');
    $HTML->Close('div');
$HTML->CloseBody();



