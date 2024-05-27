<?php

include "../connect.php";

$center_city = filterRequest("center_city") ;
$center_region = filterRequest("center_region");
$center_phone = filterRequest("center_phone");
$center_password = sha1($_POST["center_password"]);
//$center_password = filterRequest("center_password");
$center_type = filterRequest("center_type");

$stmt = $con->prepare ("SELECT * FROM `center` WHERE `center_region` = ? AND `center_type`=?" );
$stmt -> execute ( array($center_region,$center_type));
$count = $stmt->rowCount();
if ($count>0) {
    printFailure("center is exists");
}else{
    $stmt = $con->prepare("INSERT INTO `center`(`center_city`, `center_region`,`center_phone`,`center_password`,`center_type`) VALUES (?,?,?,?,?)") ;
$stmt->execute(array($center_city , $center_region,$center_phone ,$center_password,$center_type)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
}






?>