<?php
//تصاعديا
include "../connect.php";


$policeReport_type = filterRequest("policeReport_type") ;
$policeReport_location = filterRequest("policeReport_location") ;


$stmt = $con->prepare("SELECT * FROM `usersreport` WHERE `policeReport_type` = ? AND `policereport_location` = ? ORDER BY `policeReport_time` ASC") ;
$stmt->execute(array($policeReport_type , $policeReport_location)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>