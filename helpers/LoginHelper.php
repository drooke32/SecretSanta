<?php
require_once '../db/DBHelper.php';
require_once 'RedirectHelper.php';

class LoginHelper {

    function Logout(){
        $RH = new RedirectHelper();
        if(session_status() == PHP_SESSION_ACTIVE){
            session_reset();
        }
        $RH->Redirect('login');    
    }

    function Login($username, $password){
        $DB = new DBHelper();
        $RH = new RedirectHelper();
        session_start();
        if($user = $DB->CheckLogin($username, $password)){
            $_SESSION['user'] = $user['userID'];
            $_SESSION['name'] = $user['username'];
            $_SESSION['resetRequired'] = $user['passwordreset'];
            $_SESSION['logged'] = true;
            //generate the redirect url
            return $RH->Redirect('secretPerson');
        }
        return false;
    }

}