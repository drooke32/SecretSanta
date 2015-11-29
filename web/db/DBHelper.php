<?php
require "DBUsers.php";
require "DBItems.php";
require "DBGateway.php";

class DBHelper {
    
    function GetUserItemsList(){
        if(GetAllItemsByUserID($_SESSION["user_id"])){

        }
        else{

        }
    }

    function GetSecretUsersItemsList(){

    }


    function MatchUsers(){
        if($userIDs = GetAllUserIDs()){
            $matchedIDs = array();
            $secretIDs = $userIDs;
            $notMatched = true;
            while($notMatched){
                shuffle($secretIDs);
                $notMatched = false;
                for($i = 0; $i < count($userIDs); $i++ ){
                    //check if the user is matched to themselves, alter the notmatched flag if they are
                    if($userIDs[$i]['userID'] === $secretIDs[$i]['userID']){
                        $notMatched = true;
                    }
                    $matchedIDs[$userIDs[$i]['userID']] = $secretIDs[$i]['userID'];
                }
                if($notMatched){ //clear out the matched array
                    $matchedIDs = array();
                }
            }
            //if you're here, they should all be matched successfully
            foreach($matchedIDs as $userID => $secretID){
               SaveSecretUser($userID, $secretID);
            }
            return true;
        }
        return false;
    }
}
