<?php
require "DBUsers.php";
require "DBItems.php";
require "DBGateway.php";

class DBHelper {

    function CheckLogin($username, $password){
        $username = strtolower($username);
        if($result = GetUserByName($username)){
            if(password_verify($password, $result[0]['password'])){
                return $result[0];
            }
            return false;
        }
        return false;
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
            return $matchedIDs;
        }
        return false;
    }
    
    function GetUserChristmasList($userID){
        return GetAllItemsByUserID($userID);
    }
    
    function ChangePassword($userID, $pass){
        return SavePassword($userID, $pass);
    }
    
    function GetSecretUser($userID){
        $user = GetUserByID($userID);
        $secret = GetSecretUser($user[0]['secretPerson']);
        return $secret[0];
    }
    
    function CheckUserIsAdmin($userID){
        $user = GetUserByID($userID);
        if($user[0]['username'] == "denis"){
            return true;
        }
        return false;
    }
    
    function AddChristmasListItem($item, $location, $userID){
        return AddItem($item, $location, $userID);
    }
    
    function EditChristmasListItem($item, $location, $itemID){
        return EditItem($itemID, $item, $location);
    }
    
    function DeleteChristmasListItem($itemID){
        return DeleteItem($itemID);
    }
    
    function GetError(){
        return DBError();
    }
    
    function GetAllSecretUsers(){
        return GetAllUsers();
    }
}
