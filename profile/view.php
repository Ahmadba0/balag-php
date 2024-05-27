<?php

include "../connect.php";


$usersid = filterRequest("usersid") ;


$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_id` = ? ") ;
$stmt->execute(array($usersid)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "sucsses","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>