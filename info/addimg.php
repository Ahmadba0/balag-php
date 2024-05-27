<?php
include "../connect.php";

$number = filterRequest("number");
$file = imageUpload("file");


    if($file != 'fail'){
        $stmt = $con->prepare("UPDATE `users` SET `users_image`=? WHERE `users_number` = ?") ;
        $stmt->execute(array($file , $number)) ;
        $count = $stmt->rowCount();
        
        if ($count>0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "fail"));
        }
        }else{
            echo "<pre>";
            echo json_encode(array("status" => "fail"));
            echo "</pre>";
        }



?>