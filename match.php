<?php
require_once 'helpers/HTMLHelper.php';

session_start();
$HTML = new HTMLHelper();
$HTML->DefaultHeader('match');
$HTML->OpenBody();
    $HTML->Banner("", $_SESSION['name']);
    $HTML->Element('div', 'row button-row centered');
        $HTML->Element('div', 'twelve columns');
            $HTML->Element('button', 'button-primary', array('id'=>'match')); echo "Match Users"; $HTML->Close('button');
        $HTML->Close('div');
    $HTML->Close('div');
    $HTML->Element('div', 'row button-row centered');
        $HTML->Element('div', 'twelve columns');
            $HTML->Element('div', 'results-container'); $HTML->Close('div');
        $HTML->Close('div');
    $HTML->Close('div');    
$HTML->CloseBody();
