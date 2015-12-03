<?php
require_once '../db/DBHelper.php';
session_start();
$return = new stdClass();
if(isset($_SESSION['user'])){
    $DB = new DBHelper();
    if($DB->CheckUserIsAdmin($_SESSION['user'])){
        if($matchedUsers = $DB->MatchUsers()){
            $return->success = true;
            $return->html = GenerateHTML($matchedUsers);
        }
        else{
            $return->success = false;
            $return->html = "Failed to match users";
        }
    }
    else{
        $return->success = false;
        $return->html = "You're not supposed to be here nerd!";
    }
}
else{
    $return->success = false;
    $return->html = "You're not supposed to be here nerd!";
}

echo json_encode($return);

function GenerateHTML($matchedUsers){
    $count = count($matchedUsers);
    $keys = array();
    $i = 1;
    foreach($matchedUsers as $key => $value){
        $keys[$key] = $i;
        $i++;
    }
    $html = "";
    foreach($matchedUsers as $user => $secret){
        $html .= "<div class='row'><div class='twelve columns'>";
        $html .= $keys[$user] . "   =>  " . $keys[$secret];
        $html .= "</div></div>";
    }    
    return $html;
}