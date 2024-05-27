<?php

include "../connect.php";

$policeReport_id  = filterRequest("policeReport_id");
$policeReport_user = filterRequest("policeReport_user");

$data = array(
    "policeReport_status" => 1
);

updateData("policereport" , $data , "policeReport_id = $policeReport_id");

//sendGCM("مرحباً" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , "users$policeReport_user" , "none" , "refreshDetaielsPage");


insertNotifivation("success" , "لقد تم رؤية طلبك وهو في حالة المعالجة" , $policeReport_user , "users$policeReport_user" , "none" , "refreshDetaielsPage");