<?php
include "connection.php";

$s_id=$_POST["stateid"];
//echo $s_id;
$sql=$link->prepare("select * from cities where s_id=$s_id");
$sql->execute();
$fetch=$sql->fetchall();

foreach($fetch as $cnt)
{
  echo "<option value='".$cnt['city_id']."'>". $cnt['city_name']."</option>";
  
}
?>