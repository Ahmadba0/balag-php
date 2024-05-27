<?php

include "../connect.php";

$name = filterRequest("name");
//$password = sha1($_POST["password"]);
//$email = filterRequest("email");
//$verifycode = rand(10000,99999);
$number = filterRequest("number");
$phone = filterRequest("phone");
$password = sha1($_POST["password"]);


$stmt = $con->prepare ("SELECT * FROM `users` WHERE `users_number` = ? OR `users_phone` = ?" );
$stmt -> execute ( array($number,$phone));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("national number is exists");
} else {
    $data=array(
        "users_name" => $name,
        "users_number" => $number,
        "users_phone" => $phone,
        "users_password"=>$password
    );

    //sendEmail($email,"verify ecommerce" , "verify code $verifycode");
    insertData("users" , $data);
}

        //"users_password" => $password,
        //"users_email" => $email,
        //"users_verifycode" => $verifycode,