<?php

include "../connect.php";

$phone = filterRequest("phone");
$password = sha1($_POST['password']) ; 
$data = array("users_password" => $password);
updateData("users", $data, "users_phone = '$phone'");