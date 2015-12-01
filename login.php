<?php 
require_once 'helpers/HTMLHelper.php';

$HTML = new HTMLHelper();
$HTML->DefaultHeader('login');

$HTML->OpenBody();
    $HTML->Banner("Secret Santa",false);
    $HTML->Element('div', 'error hidden'); echo "Invalid Username or Password"; $HTML->close('div');    
    $HTML->Element('form', null, array('method'=>'post'));
        $HTML->Element('div', 'row');
            $HTML->Element('div', 'twelve columns');
                $HTML->Element('label', null, array('for'=>'username'), false); echo 'Username'; $HTML->Close('label');
                $HTML->Element('input', 'u-full-width', array('id'=>'inputUsername', 'name'=>'username', 'type'=>'text'));
            $HTML->Close('div');
        $HTML->Close('div');
        $HTML->Element('div', 'row');
            $HTML->Element('div', 'twelve columns');
                $HTML->Element('label', null, array('for'=>'password'), false); echo 'Password'; $HTML->Close('label');
                $HTML->Element('input', 'u-full-width', array('id'=>'inputPassword', 'name'=>'password', 'type'=>'password'));
            $HTML->Close('div');
        $HTML->Close('div');
        $HTML->Element('input', 'button-primary u-pull-right', array('type'=>'submit', 'value'=>'Login', 'name'=>'login', 'id'=>'login-submit'));
    $HTML->Close('form');
$HTML->CloseBody();


