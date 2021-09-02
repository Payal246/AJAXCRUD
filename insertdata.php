<?php
include "connection.php";

$fname=$_POST['fnm'];
$lname=$_POST['lnm'];
$email=$_POST['eml'];
$uname=$_POST['unm'];
$pwd=$_POST['p'];
$gender=$_POST['gen'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$img=$_POST['img'];

 
$filename=$_FILES["img"]["name"];
$tempname=$_FILES["img"]["tmp_name"];
$path="image/".$filename;
$sql="insert into register(Firstname,Lastname,Email,Username,Password,Gender,Country,State,City,Image) values('$fname','$lname','$email','$uname','$pwd','$gender','$country','$state','$city','$filename')";
 //print_r($sql);
if($link->query($sql)){
            move_uploaded_file($tempname,$path);
         echo "Inserted";
        }
        else{
         
        }
        $link=null;
     
        //header("location:dashboard.php");

?>