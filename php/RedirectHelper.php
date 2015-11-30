<?php

class RedirectHelper {
    function Redirect($page){
        if(isset($_SESSION['logged']) && $_SESSION['resetRequired']){
            return $_SERVER['HTTP_HOST'].'/SecretSanta/changePassword.php';
        }
        return $_SERVER['HTTP_HOST'].'/SecretSanta/'.$page.'.php';
    }
}

