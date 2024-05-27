<?php

//لا يوجد حاجة له

include "../connect.php";

$phone = filterRequest("phone");
$verifycode = rand(10000,99999);


$data=array(
    "users_verifycode" => $verifycode
);
updateData("users" , $data , "users_phone = '$phone'"  );

//sendEmail($email , "verifycode ecommerce" , "verifycode $verifycode");

