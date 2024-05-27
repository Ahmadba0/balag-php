<?php

//لا يوجد حاجة له



include "../connect.php";

$phone = filterRequest("phone");

$verify = filterRequest("verifycode");


$stmt = $con -> prepare ("SELECT * FROM `users` WHERE users_phone = ? AND users_verifycode = ?" );
$stmt -> execute (
    
    array($phone , $verify )
);
$count = $stmt->rowCount();

result($count);

?>