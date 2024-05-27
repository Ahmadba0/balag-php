<?php

include "../connect.php";


$number = filterRequest("number");
$city = filterRequest("city");
$region = filterRequest("region");

$stmt = $con->prepare("SELECT * FROM `users` WHERE users_number = '$number' ");

$stmt->execute();

$count = $stmt->rowCount();

if($count > 0){
    $data = array(
        "users_city" => $city,
        "users_region" => $region,
    );
    updateData("users" , $data , "users_number = '$number'");
}else{
    printFailure(" not correct");
}


/*
include "../connect.php";

$city = filterRequest("city");
$region = filterRequest("region");


        $data=array(
            "users_city" => $city,
            "users_region" => $region,
        );
    
        //sendEmail($email,"verify ecommerce" , "verify code $verifycode");
        insertData("users" , $data);*/