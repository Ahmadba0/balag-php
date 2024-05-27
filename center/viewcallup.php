<?php
//
include "../connect.php";


$callup_centerid = filterRequest("callup_centerid") ;



$stmt = $con->prepare("SELECT * FROM `callup` WHERE `callup_centerid` = ?") ;
$stmt->execute(array($callup_centerid)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>