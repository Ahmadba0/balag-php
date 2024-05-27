<?php

include "../connect.php";

$usersid   = filterRequest("usersid") ;
$users_phone      = filterRequest("users_phone") ;

$stmt = $con->prepare("UPDATE `users` SET `users_phone`=?  WHERE `users_id` = ?") ;
$stmt->execute(array($users_phone, $usersid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "sucsses"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>