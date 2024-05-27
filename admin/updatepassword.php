<?php

include "../connect.php";

$adminid   = filterRequest("adminid") ;
$oldpassword      = filterRequest("oldpassword") ;
$newpassword = filterRequest('newpassword');

$stmt1 = $con->prepare("SELECT * FROM `admin` WHERE `admin_password` = ?");
$stmt1->execute(array($oldpassword));
$count1 = $stmt1->rowCount();
if ($count1>0) {
    $stmt = $con->prepare("UPDATE `admin` SET `admin_password`=?  WHERE `admin_id` = ?") ;
    $stmt->execute(array($newpassword,$adminid )) ;
    $count = $stmt->rowCount();

    if ($count>0) {
        echo json_encode(array("status" => "sucsses"));
    } else {
        echo json_encode(array("status" => "fail"));
}
}else{
    printFailure("admin is fasle");
}


?>