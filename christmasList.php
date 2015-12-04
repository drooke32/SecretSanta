<?php
require_once 'helpers/HTMLHelper.php';
require_once 'db/DBHelper.php';

$DB = new DBHelper();
session_start();
$items = $DB->GetUserChristmasList($_SESSION['user']);


$HTML = new HTMLHelper();
$HTML->DefaultHeader('christmasList');
$HTML->OpenBody();
    $HTML->Element('span', 'container-darkened');$HTML->Close('span');
    $HTML->Banner("My List", $_SESSION['name']);
    $HTML->Element('div', 'error hidden');$HTML->close('div');  
    $HTML->Element('div', 'row');
        $HTML->Element('div', 'twelve columns', array('id'=>'list-container'));
            if(count($items) > 0){
                foreach($items as $item){
                    echo $HTML->ListItem($item['itemID'], $item['item'], $item['location'], true);
                }
            }else{
                echo "<h3 class='centered no-items'> No Christmas list yet!</h3>";
            }
        $HTML->Close('div');
    $HTML->Close('div');
    $HTML->Element('div', 'add-button');
        $HTML->Element('span', 'span1');$HTML->Close('span');
        $HTML->Element('span', 'span2');$HTML->Close('span');
    $HTML->Close('div');
    //item form
    $HTML->Element('form', 'modal-container', array('id'=>'item-form'));
        $HTML->Element('label', null, array('for'=>'item'), false); echo 'Description'; $HTML->Close('label');
        $HTML->Element('textarea',"u-full-width", array('id'=>'item', 'name'=>'item', 'placeholder'=>"Ex. An amazing giftcard!"));$HTML->Close('textarea');
        $HTML->Element('label', null, array('for'=>'location'), false); echo 'Location'; $HTML->Close('label');
        $HTML->Element('input',"u-full-width", array('type'=>'text','name'=>'location', 'id'=>'location', 'placeholder'=>"Ex. Winners"));$HTML->Close('input');
        $HTML->Element('input',"", array('type'=>'hidden','name'=>'item-action', 'id'=>'item-action'));
        $HTML->Element('input',"", array('type'=>'hidden','name'=>'edit-id', 'id'=>'edit-id'));
        $HTML->Element('div', 'button-row');
            $HTML->Element('button','flat-button dialog-button u-pull-right', array('id'=>'item-submit')); echo "Add Item"; $HTML->Close('button');
            $HTML->Element('button','flat-button dialog-button u-pull-right close-button'); echo "Cancel"; $HTML->Close('button');
        $HTML->Close('div');
    $HTML->Close('form');
    
    //delete form
    $HTML->Element('form', 'modal-container', array('id'=>'delete-form'));
        $HTML->Element('input',"", array('type'=>'hidden', 'name'=>'delete-id', 'id'=>'delete-id'));
        $HTML->Element('input',"", array('type'=>'hidden', 'name'=>'item-action', 'value'=>'delete', 'id'=>'delete-action'));
        $HTML->Element('h3', 'centered'); echo "Confirm Delete"; $HTML->Close('h3');
        $HTML->Element('div', 'button-row');
            $HTML->Element('button','flat-button dialog-button u-pull-right', array('id'=>'delete-submit')); echo "Yes, Delete"; $HTML->Close('button');
            $HTML->Element('button','flat-button dialog-button close-button u-pull-right'); echo "Oops, No!"; $HTML->Close('button');
        $HTML->Close('div');
    $HTML->Close('form');
    
$HTML->CloseBody();
