<?php

class RedirectHelper {
    function Redirect($page){
        if(isset($_SESSION['logged']) && $_SESSION['resetRequired']){
            return '/changePassword.php';
        }
        return '/'.$page.'.php';
    }
    
    function AnchorLink($page){
        return $_SERVER['HTTP_HOST'].'/'.$page.'.php';
    }
}

