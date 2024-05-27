<?php
include "../connect.php";


$center_type = filterRequest("center_type") ;


$stmt = $con->prepare("SELECT * FROM `center` WHERE `center_type` = ?") ;
$stmt->execute(array($center_type)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>