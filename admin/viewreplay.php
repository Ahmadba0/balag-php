<?php
include "../connect.php";


$policerepaly_report = filterRequest("policerepaly_report") ;


$stmt = $con->prepare("SELECT * FROM `policereplay` WHERE `policereplay_report` = ?") ;
$stmt->execute(array($policerepaly_report)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>