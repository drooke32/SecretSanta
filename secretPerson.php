<?php
require_once 'helpers/HTMLHelper.php';
require_once 'db/DBHelper.php';



$HTML = new HTMLHelper();
$HTML->DefaultHeader('secretPerson');
$HTML->OpenBody();
    $HTML->Banner("Secret Person");
    $HTML->Element('div', 'row button-row centered');
        $HTML->Element('div', 'twelve columns');
            $HTML->Element('button', 'button-primary', array('id'=>'show-secret'));
                $HTML->Element('span', 'fa fa-search fa-fw');$HTML->Close('span'); echo "Show Secret Person";
            $HTML->Close('button');
        $HTML->Close('div');
    $HTML->Close('div');
    $HTML->Element('div', 'row secret-container hidden centered');
        $HTML->Element('div', 'twelve columns');
            $HTML->Element('h4'); echo "Secret Person: Test"; $HTML->Close('h4');
        $HTML->Close('div');
    $HTML->Close('div');
$HTML->CloseBody();



