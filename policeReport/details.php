<?php

include "../connect.php";


$report_id = filterRequest("report_id") ;


$stmt = $con->prepare("SELECT * FROM `policereport` WHERE `policeReport_id` = ? ") ;
$stmt->execute(array($report_id)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "sucsses","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
