<?php

include "../connect.php";

$report_body   = filterRequest("report_body") ;
$report_id      = filterRequest("report_id") ;
$imagename    = filterRequest("imagename");

if(isset($_FILES['file'])){
    deleteFile("../uploade,$imagename");
    $imagename = uploadImg("file");
    
}

$stmt = $con->prepare("UPDATE `policereport` SET `policeReport_body`=? , `policeReport_image` = ? WHERE `policeReport_id` = ?") ;
$stmt->execute(array($report_body, $imagename ,$report_id)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "sucsses"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
