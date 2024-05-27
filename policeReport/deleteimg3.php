<?php

include "../connect.php";


$report_id = filterRequest("report_id") ;
$imagename = filterRequest("imagename");
//$imagename1 = filterRequest("imagename1");
//$imagename2 = filterRequest("imagename2");

$stmt = $con->prepare("DELETE FROM `policereport` WHERE `policeReport_id` = ?") ;
$stmt->execute(array($report_id)) ;
$count = $stmt->rowCount();

if ($count>0) {
    deleteFile("../upload" , $imagename);
    //deleteFile("../upload" , $imagename1);
    //deleteFile("../upload" , $imagename2);
    echo json_encode(array("status" => "sucsses"));
} else {
    echo json_encode(array("status" => "fail"));
}


?>
