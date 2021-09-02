<?php
include "connection.php";
$cid=$_POST['countid'];
$sql=$link->prepare("select * from states where c_id='$cid' ");
$sql->execute();
$fetch=$sql->fetchAll();
foreach($fetch as $cnt)
{
    echo "<option value='".$cnt['s_id']."'>".$cnt['s_name']."</option>";
}
?>