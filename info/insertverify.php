<?php

include "../connect.php";

$usersphone   = filterRequest("usersphone") ;
$users_verify      = filterRequest("users_verify") ;

$stmt = $con->prepare("UPDATE `users` SET `users_verifycode`=?  WHERE `users_phone` = ?") ;
$stmt->execute(array($users_verify, $usersphone )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "sucsses"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>