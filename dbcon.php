<?php 
$db_host="localhost";
$db_user="username";
$db_password="password";
$db_name="erp";


$conn = new mysqli($db_host,$db_user,$db_password,$db_name);

if($conn->connect_error){
    die("connection faild");
}