<?php

include "../connect.php";

$policeReport_body = filterRequest("policeReport_body");
$file = imageUpload("file");

$stmt = $con->prepare("SELECT * FROM `policereport` WHERE policeReport_body = '$policeReport_body' ");

$stmt->execute();

$count = $stmt->rowCount();

if($file != 'fail'){

if($count > 0){
    $data = array(
        "policeReport_image3" => $file,
        
    );
    updateData("policereport" , $data , "policeReport_body = '$policeReport_body'");
}else{
    printFailure(" not correct");
}
}else{
    echo "<pre>";
    echo json_encode(array("status" => "fail"));
    echo "</pre>";
}





