<?php
//
include "../connect.php";


$rating_reportid = filterRequest("rating_reportid") ;



$stmt = $con->prepare("SELECT * FROM `rating` WHERE `rating_reportid` = ?") ;
$stmt->execute(array($rating_reportid)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "success","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>