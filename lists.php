<?php
require_once 'helpers/HTMLHelper.php';
require_once 'db/DBHelper.php';

$DB = new DBHelper();
$HTML = new HTMLHelper();
session_start();
$userSelected = isset($_POST['user-select']) ? $_POST['user-select'] : false;

$HTML->DefaultHeader('lists');

$HTML->OpenBody();
    $HTML->Banner("",$_SESSION['name']);
    $HTML->Element('form', null, array('method'=>'post'));
        $HTML->Element('div', 'row');
            $HTML->Element('div', 'twelve columns');
                $HTML->Element('select', 'u-full-width', array('id'=>'user-select', 'name'=>'user-select'));
                    $users = $DB->GetAllSecretUsers();
                    $selected = $userSelected == false ? 'selected' : '';
                    $HTML->SelectListOption("none", "Select a person", array($selected, 'disabled', 'hidden'));
                    foreach($users as $user){
                        $selected = $userSelected && $userSelected == $user['userID'] ? 'selected' : '';
                        $HTML->SelectListOption($user['userID'], ucfirst($user['username']), array($selected));
                    }
                $HTML->Close('select');
            $HTML->Close('div');
        $HTML->Close('div');
    $HTML->Close('form');
    if($userSelected){
        $items = $DB->GetUserChristmasList($userSelected);
        $HTML->Element('div', 'row');
            $HTML->Element('div', 'twelve columns', array('id'=>'list-container'));
                if(count($items) > 0){
                    foreach($items as $item){
                        echo $HTML->ListItem($item['itemID'], $item['item'], $item['location'], false);
                    }
                }else{
                    echo "<h3 class='centered no-items'> No Christmas list yet!</h3>";
                }
            $HTML->Close('div');
        $HTML->Close('div');
    }
    else{
        $HTML->Element('h3');echo 'No person selected';$HTML->Close('h3');
    }
    
$HTML->CloseBody();