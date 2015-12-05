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
 * Performs a database query and returns false on failure, or the last inserted
 * primary ID.
 * 
 * @param string the insert query to be executed
 * @return false if failure, or the last inserted ID
 */
function DBInsert($query){
    $connection = DBConnect();
    $result = mysqli_query($connection, $query);  

    if($result === false) {
        return false;
    }
    return mysqli_insert_id($connection);
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
        //testing/local connection
        //$connection = mysqli_connect('localhost','root','','secretsanta');
        
        //live connection
        $connection = mysqli_connect('192.168.99.10', 'drooke', 'P@ssw0rd', 'SecretSanta_Prod', '3306');
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

function CleanString($string){
    return filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
}
