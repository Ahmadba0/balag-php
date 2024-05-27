<?php

include "../connect.php";


$rating_value = filterRequest("rating_value") ;
$rating_period = filterRequest("rating_period") ;
$rating_userid = filterRequest("rating_userid") ;
$rating_reportid = filterRequest("rating_reportid") ;



$stmt = $con->prepare("INSERT INTO `rating`(`rating_value`, `rating_userid`,`rating_reportid`,`rating_period`) VALUES (?,?,?,?)") ;
$stmt->execute(array($rating_value , $rating_userid ,$rating_reportid,$rating_period)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}



?>