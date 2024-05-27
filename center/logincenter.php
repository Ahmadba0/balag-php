<?php

include "../connect.php";


$center_city = filterRequest("center_city") ;
$center_region = filterRequest("center_region") ;
$center_type = filterRequest("center_type") ;
//$center_password = filterRequest("center_password") ;
$center_password = sha1($_POST["center_password"]);

$stmt = $con->prepare("SELECT * FROM `center` WHERE `center_city` = ? AND `center_region` = ? AND `center_type` = ? AND `center_password` = ? ") ;
$stmt->execute(array($center_city,$center_region,$center_type,$center_password)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>