<?php
//تصاعديا
include "../connect.php";


$resolution_adminid = filterRequest("resolution_adminid") ;


$stmt = $con->prepare("SELECT * FROM `resolution` WHERE `resolution_adminid` = ? ORDER BY `resolution_time` ASC") ;
$stmt->execute(array($resolution_adminid)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>