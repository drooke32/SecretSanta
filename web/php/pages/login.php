<?php
require "../../db/DBUsers.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

////TESTING BULLSHEITTT

AddUser("test", "testpassword");
$result = GetUserByName("test");
SaveSecretUser("5", $result[0]['userID']);

$result2 = GetUserByID("5");

$result3 = GetSecretUser($result2[0]['secretPerson']);

echo $result3;

