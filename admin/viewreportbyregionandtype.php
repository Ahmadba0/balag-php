<?php
//تصاعديا
include "../connect.php";


$policeReport_location = filterRequest("policeReport_location") ;
$policeReport_type = filterRequest("policeReport_type") ;


$stmt = $con->prepare("SELECT * FROM `usersreport` WHERE `policeReport_location` = ? AND `policeReport_type` = ? ORDER BY `policeReport_time` ASC") ;
$stmt->execute(array($policeReport_location, $policeReport_type)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>