<?php

/**
 * Open a DB Connection, Execute a Query, and return the result
 * @param type $query query to be executed
 * @return type true, false, mysqli_result object
 */
function DBQuery($query){
    $connection = DBConnect();
    $result = mysqli_query($connection, $query);    
    return $result;
}

/**
 * Open a DB Connection, Execute a Query, and return an assoc array of results
 * @param type $query query to be executed
 * @return type assoc array of results or false
 */
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

/**
 * Connect to the DB
 * 
 * @staticvar type $connection
 * @return type false or a connection object
 */
function DBConnect(){
    $connection;
    
    if(!isset($connection)) {
        //currently broken
        //$config = parse_ini_file('..\..\config.ini'); 
        //$connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
        $connection = mysqli_connect('localhost','root','','secretsanta');
    }
    if($connection === false) {
        return mysqli_connect_error(); 
    }
    return $connection;
}

/**
 * Get the DB Error
 * 
 * @return type mysqli_error
 */
function DBError(){
    $connection = DBConnect();
    return mysqli_error($connection);
}

