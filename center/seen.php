<?php

include "../connect.php";

$report_id      = filterRequest("report_id") ;
$user_id = filterRequest('userid');


$stmt = $con->prepare("UPDATE `policereport` SET `policeReport_status` = ? WHERE `policeReport_id` = ?") ;
$stmt->execute(array(1,$report_id)) ;
$count = $stmt->rowCount();

if ($count>0) {
    insertNotifivation("بلاغنا" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , $user_id , "users$user_id" , "none" , "refreshDetaielsPage" , $report_id);
    echo json_encode(array("status" => "sucsses"));
} else {
    echo json_encode(array("status" => "fail"));
}
?>
