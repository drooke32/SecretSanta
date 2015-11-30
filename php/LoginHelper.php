<?php
require_once '/db/DBHelper.php';
require_once 'RedirectHelper.php';

class LoginHelper {

    function Logout(){
        $RH = new RedirectHelper();
        session_destroy();
        $RH->Redirect('login');    
    }

    function Login($username, $password){
        $DB = new DBHelper();
        $RH = new RedirectHelper();
        if(isset($_SESSION['loginError'])){
            unset($_SESSION['loginError']);
        }  
        if($user = $DB->CheckLogin($username, $password)){
            $_SESSION['user'] = $user['userID'];
            $_SESSION['resetRequired'] = $user['passwordreset'];
            $_SESSION['logged'] = true;
            //generate the redirect url
            return $RH->Redirect('secretPerson');
        }
        return false;
    }

}