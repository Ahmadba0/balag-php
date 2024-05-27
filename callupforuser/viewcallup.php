<?php
//تنازليا
//البلدية
include "../connect.php";


$callup_phoneuser = filterRequest("callup_phoneuser") ;


$stmt = $con->prepare("SELECT * FROM `callup` WHERE `callup_phoneuser` = ?") ;
$stmt->execute(array($callup_phoneuser)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>