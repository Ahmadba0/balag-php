<?php

include "../connect.php";
 
//$name = filterRequest("name");
//$password = sha1($_POST["password"]);
//$email = filterRequest("email");
//$verifycode = rand(10000,99999);
$number = filterRequest("number");
$password = sha1($_POST["password"]);
//$phone = filterRequest("phone"); 
/*
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND  users_password = ? AND users_approve = 1  ");
$stmt->execute(array($email, $password));
$count = $stmt->rowCount();
result($count) ; */

getData(
    "users" , " users_number = ? AND users_password = ?" , array($number,$password)
);