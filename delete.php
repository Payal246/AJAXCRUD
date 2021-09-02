<?php
include "connection.php";
$rid=$_POST['rid'];
$sql=$link->prepare("delete from register where Reg_id='$rid' LIMIT 1");
$data=$sql->execute();

?>