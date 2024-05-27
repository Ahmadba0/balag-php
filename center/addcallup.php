<?php

include "../connect.php";
$callup_phoneuser = filterRequest("callup_phoneuser") ;
$callup_text = filterRequest("callup_text") ;
$callup_centerregion = filterRequest('callup_centerregion');
$callup_centercity = filterRequest('callup_centercity');
$callup_centertype = filterRequest('callup_centertype');
$callup_centerid = filterRequest('callup_centerid');


$stmt = $con->prepare("INSERT INTO `callup`(`callup_text`, `callup_phoneuser`,`callup_centerregion`,`callup_centercity`,`callup_centertype`,`callup_centerid`) VALUES (?,?,?,?,?,?)") ;
$stmt->execute(array($callup_text , $callup_phoneuser ,$callup_centerregion,$callup_centercity,$callup_centertype,$callup_centerid)) ;
$count = $stmt->rowCount();

if ($count>0) {
    echo json_encode(array("status" => "success"));
} else {
    echo json_encode(array("status" => "fail"));
}



?>