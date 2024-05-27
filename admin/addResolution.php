<?php

include "../connect.php";

$resolution_text = filterRequest("resolution_text") ;
$resolution_adminid = filterRequest("resolution_adminid") ;


$stmt = $con->prepare("INSERT INTO `resolution`(`resolution_text`, `resolution_adminid`) VALUES (?,?)") ;
$stmt->execute(array($resolution_text , $resolution_adminid )) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}



?>