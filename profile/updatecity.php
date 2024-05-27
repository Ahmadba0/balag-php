<?php

include "../connect.php";

$usersid   = filterRequest("usersid") ;
$users_city      = filterRequest("users_city") ;
$users_region      = filterRequest("users_region") ;

$stmt = $con->prepare("UPDATE `users` SET `users_city`=? , `users_region` = ? WHERE `users_id` = ?") ;
$stmt->execute(array($users_city,$users_region, $usersid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "sucsses"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>