<?php

include "../connect.php";


$admin_type = filterRequest("admin_type") ;
$admin_password = filterRequest("admin_password") ;


$stmt = $con->prepare("SELECT * FROM `admin` WHERE `admin_type` = ? AND `admin_password` = ? ") ;
$stmt->execute(array($admin_type,$admin_password)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>