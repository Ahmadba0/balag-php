<?php

include "../connect.php";

$policeReport_id  = filterRequest("policeReport_id");
$policeReport_user = filterRequest("policeReport_user");
/*
$policeReplay_text = filterRequest("policeReplay_text");

$stmt = $con->prepare("INSERT INTO `policereplay`(`policereplay_text`) VALUES (?)") ;
$stmt->execute(array($policeReplay_text)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}*/

$data = array(
    "policeReport_status" => 2
);

updateData("policereport" , $data , "policeReport_id = $policeReport_id");

//sendGCM("مرحباً" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , "users$policeReport_user" , "none" , "refreshDetaielsPage");


//insertNotifivation("success" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , $policeReport_user , "users$policeReport_user" , "none" , "refreshDetaielsPage");