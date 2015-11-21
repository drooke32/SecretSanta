<?php
include 'testDBConnection.php';
//include 'DBConnection.php';

function Query($query){
    Connect();
    mysql_query($query);    
    mysql_close();
}

