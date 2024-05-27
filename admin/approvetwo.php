<?php

include "../connect.php";

$policeReport_id  = filterRequest("policeReport_id");
$policeReport_user = filterRequest("policeReport_user");

$policereplay_text = filterRequest("policereplay_text");

$data = array(
    "policeReport_status" => 2
);

updateData("policereport" , $data , "policeReport_id = $policeReport_id");

$stmt = $con->prepare("INSERT INTO `policereplay`(`policereplay_text`) VALUES (?)") ;
$stmt->execute(array($policereplay_text)) ;
$count = $stmt->rowCount();


//sendGCM("مرحباً" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , "users$policeReport_user" , "none" , "refreshDetaielsPage");


//insertNotifivation("success" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , $policeReport_user , "users$policeReport_user" , "none" , "refreshDetaielsPage");