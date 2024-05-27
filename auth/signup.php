<?php

include "../connect.php";

$name = filterRequest("name");
$password = sha1($_POST["password"]);
$email = filterRequest("email");
$verifycode = rand(10000,99999);
$number = filterRequest("number");

$stmt = $con->prepare ("SELECT * FROM `users` WHERE `users_email` = ? " );
$stmt -> execute ( array($email));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("phone or email is exists..");
} else {
    $data=array(
        "users_name" => $name,
        "users_password" => $password,
        "users_email" => $email,
        "users_verifycode" => $verifycode,
        "users_number" => $number,
    );

    //sendEmail($email,"verify ecommerce" , "verify code $verifycode");
    insertData("users" , $data);
}
