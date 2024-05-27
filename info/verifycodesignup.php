<?php

//لا يوجد حاجة له


include "../connect.php";


$phone = filterRequest("phone");

$verify = filterRequest("verifycode");

$stmt = $con->prepare("SELECT * FROM `users` WHERE users_phone = '$phone' AND users_verifycode = '$verify'");

$stmt->execute();

$count = $stmt->rowCount();

if($count > 0){
    $data = array(
        "users_approve" => "1"
    );
    updateData("users" , $data , "users_phone = '$phone'");
}else{
    printFailure("verifycode not correct");
}