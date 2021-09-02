<?php
include "connection.php";
$rid=$_POST['rid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$gender=$_POST['gender'];
$sql=$link->prepare("UPDATE register SET Firstname='$fname',Lastname='$lname',Email='$email',Username='$uname',Gender='$gender' where Reg_id='$rid'");
$sql->execute();
$row=$sql->fetch();
echo json_encode($row);

?>