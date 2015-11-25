<?php

function DBQuery($query){
    $connection = DBConnect();
    $result = mysqli_query($connection, $query);    
    mysqli_close($connection);
    return $result;
}

function DBSelect($query){
    $rows = array();
    $result = DBQuery($query);

    if($result === false) {
        return false;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function DBConnect(){
    static $connection;
    
    if(!isset($connection)) {
        $config = parse_ini_file('../config.ini'); 
        $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
    }
    if($connection === false) {
        return mysqli_connect_error(); 
    }
    return $connection;
}

function DBError(){
    $connection = DBConnect();
    return mysqli_error($connection);
}

