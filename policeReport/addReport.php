<?php

include "../connect.php";

$policeReport_body = filterRequest("policeReport_body") ;
$policeReport_location = filterRequest("policeReport_location");
$policeReport_moreInformation = filterRequest("policeReport_moreInformation");
$policeReport_type = filterRequest("policeReport_type");
$policeReport_user = filterRequest("policeReport_user") ;
$file = imageUpload("file");

if($file != 'fail'){
$stmt = $con->prepare("INSERT INTO `policereport`(`policeReport_body`, `policeReport_location`,`policeReport_moreInformation`,`policeReport_type`, `policeReport_user`,`policeReport_image`) VALUES (?,?,?,?,?,?)") ;
$stmt->execute(array($policeReport_body , $policeReport_location ,$policeReport_moreInformation,$policeReport_type, $policeReport_user ,$file)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}
}else{
    echo "<pre>";
    echo json_encode(array("status" => "fail"));
    echo "</pre>";
}


?>