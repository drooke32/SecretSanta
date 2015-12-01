<?php

class RedirectHelper {
    function Redirect($page){
        if(isset($_SESSION['logged']) && $_SESSION['resetRequired']){
            return '/SecretSanta/changePassword.php';
        }
        return '/SecretSanta/'.$page.'.php';
    }
}

