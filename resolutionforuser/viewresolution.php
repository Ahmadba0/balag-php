<?php
//تنازليا
//البلدية
include "../connect.php";




$stmt = $con->prepare("SELECT * FROM `resolution`  ") ;
$stmt->execute() ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>