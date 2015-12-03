<?php
require_once 'helpers/HTMLHelper.php';
session_start();
$HTML = new HTMLHelper();
$HTML->DefaultHeader('changePassword');
$HTML->OpenBody();
    $HTML->Banner("Password Reset",$_SESSION['name']);
    $HTML->Element('div', 'error hidden'); echo "Password Reset Failed"; $HTML->close('div');    
    $HTML->Element('form', null, array('method'=>'post'));
        $HTML->Element('div', 'row');
            $HTML->Element('div', 'twelve columns');
                $HTML->Element('label', null, array('for'=>'password'), false); echo 'New Password'; $HTML->Close('label');
                $HTML->Element('input', 'u-full-width', array('id'=>'password', 'name'=>'password', 'type'=>'password'));
            $HTML->Close('div');
        $HTML->Close('div');
        $HTML->Element('div', 'row');
            $HTML->Element('div', 'twelve columns');
                $HTML->Element('label', null, array('for'=>'password2'), false); echo 'Confirm Password'; $HTML->Close('label');
                $HTML->Element('input', 'u-full-width', array('id'=>'password2', 'name'=>'password2', 'type'=>'password'));
            $HTML->Close('div');
        $HTML->Close('div');
        $HTML->Element('input', 'button-primary u-pull-right', array('type'=>'submit', 'value'=>'Submit', 'name'=>'submit', 'id'=>'password-submit'));
    $HTML->Close('form');
$HTML->CloseBody();

