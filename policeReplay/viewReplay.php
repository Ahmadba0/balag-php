<?php

include "../connect.php";


$policereplay_report = filterRequest("policereplay_report") ;


$stmt = $con->prepare("SELECT * FROM `policereplay` WHERE `policereplay_report` = ? ") ;
$stmt->execute(array($policereplay_report)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "sucsses","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
