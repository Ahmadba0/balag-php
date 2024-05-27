<?php

include "../connect.php";


$id = filterRequest("id") ;
$type = filterRequest("type") ;


$stmt = $con->prepare("SELECT * FROM `policereport` WHERE `policeReport_user` = ? AND `policeReport_type`=?") ;
$stmt->execute(array($id,$type)) ;
$count = $stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($count>0) {
    echo json_encode(array("status" => "sucsses","data" => $data));
} else {
    echo json_encode(array("status" => "fail"));
}
?>


