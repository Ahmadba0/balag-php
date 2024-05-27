<?php

include "../connect.php";


$phone = filterRequest("phone") ;


$stmt = $con->prepare("SELECT `users_verifycode` FROM `users` WHERE `users_phone` = ? ") ;
$stmt->execute(array($phone)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "sucsses","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>


