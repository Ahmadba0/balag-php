<?php
include "../connect.php";
$phone = filterRequest("phone");

$verifycode     = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_phone = ? ");
$stmt->execute(array($phone));
$count = $stmt->rowCount();


result($count);

if ($count > 0) {
    $data = array("users_verifycode" => $verifycode);
    updateData("users", $data, "users_phone = '$phone'", false);
    //sendEmail($email, "Verify Code Ecommerce", "Verify Code $verifycode");
}else{
    
}