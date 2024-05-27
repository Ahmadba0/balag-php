<?php

include "../connect.php";

$centerid   = filterRequest("centerid") ;
//$oldpassword      = filterRequest("oldpassword") ;
//$newpassword = filterRequest('newpassword');
$oldpassword = sha1($_POST["oldpassword"]);
$newpassword = sha1($_POST["newpassword"]);


$stmt1 = $con->prepare("SELECT * FROM `center` WHERE `center_password` = ?");
$stmt1->execute(array($oldpassword));
$count1 = $stmt1->rowCount();
if ($count1>0) {
    $stmt = $con->prepare("UPDATE `center` SET `center_password`=?  WHERE `center_id` = ?") ;
    $stmt->execute(array($newpassword,$centerid )) ;
    $count = $stmt->rowCount();

    if ($count>0) {
        echo json_encode(array("status" => "sucsses"));
    } else {
        echo json_encode(array("status" => "fail"));
}
}else{
    printFailure("center is fasle");
}


?>