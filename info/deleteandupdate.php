<?php

include "../connect.php";


$usersphone = filterRequest("usersphone") ;



$stmt = $con->prepare("DELETE FROM `users` WHERE `users_phone` = ?") ;
$stmt->execute(array($usersphone)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "sucsses"));
} else {
    echo json_encode(array("status" => "fail"));
}


?>
