<?php

include "../connect.php";
//$policerepaly_text = filterRequest("policerepaly_text") ;
//reportid
$policereplay_report = filterRequest("policereplay_report") ;
$user_id = filterRequest('user_id');


/*$stmt = $con->prepare("INSERT INTO `policereplay`(`policereplay_text`, `policereplay_report`) VALUES (?,?)") ;
$stmt->execute(array($policerepaly_text , $policereplay_report)) ;
$count = $stmt->rowCount();*/

$stmt = $con->prepare("UPDATE `policereport` SET `policeReport_status` = ? WHERE `policeReport_id` = ?") ;
$stmt->execute(array(2,$policereplay_report)) ;
$count = $stmt->rowCount();

if ($count>0) {
    insertNotifivation("بلاغنا" , "تم الرد على طلبلك ونرجو منك التتقييم" , $user_id , "users$user_id" , "none" , "refreshDetaielsPage" , $policereplay_report);
        
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}



?>

