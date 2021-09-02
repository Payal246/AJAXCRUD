<?php
include "connection.php";
$rid=$_POST['rid'];
$sql=$link->prepare("select Firstname,Lastname,Email,Username,Gender,Reg_id from register where Reg_id='$rid'");
$sql->execute();
$row=$sql->fetch();
echo json_encode($row);
?>