<?php

include "../connect.php";

$center_city = filterRequest("center_city") ;
$center_region = filterRequest("center_region");
$center_password = filterRequest("center_password");
$center_type = filterRequest("center_type");

$stmt = $con -> prepare ("SELECT * FROM `center` WHERE `center_region` = ? AND `center_type` = ?" );
$stmt -> execute (array($center_region , $center_type));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("center is exists..");
} else {
    $data=array(
        "center_city" => $center_city,
        "center_region" => $center_region,
        "center_password" => $center_password,
        "center_type" => $center_type,
    );

    //sendEmail($email,"verify ecommerce" , "verify code $verifycode");
    insertData("center" , $data);
}
