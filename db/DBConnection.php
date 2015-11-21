<?php

function Connect(){
    $username='root';$password='';$database="SecretSanta";
    $link = mysql_connect("localhost",$username,$password);
    mysql_select_db($database, $link);
}

