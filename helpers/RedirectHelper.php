<?php

class RedirectHelper {
    function Redirect($page){
        //$live = "/SecretSanta";
        $live = "";
        if(isset($_SESSION['logged']) && $_SESSION['resetRequired']){
            return $live.'/changePassword.php';
        }
        return $live.'/'.$page.'.php';
    }
    
    function AnchorLink($page){
        //$live = "/SecretSanta";
        $live = "";
        return $_SERVER['HTTP_HOST'].$live.'/'.$page.'.php';
    }
}

