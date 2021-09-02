<?php
error_reporting (E_ERROR);
include "connection.php";


$sql=$link->prepare("select * from register");
$sql->execute();

//print_r($sql);

while($row=$sql->fetch()){

   echo "<tr>
        <td>". $row['Reg_id']."</td>
        <td>". $row['Firstname']."</td>
        <td>". $row['Lastname']."</td>
        <td>".$row['Email']."</td>
        <td>".$row['Username']."</td>
        <td>".$row['Gender']."</td>
        <td>".$row['Country']."</td>
        <td>".$row['State']."</td>
        <td>".$row['City']."</td>
        <td><a class='btn btn-primary edit' id='".$row['Reg_id']."'>Edit</a></td>
        <td><a class='btn btn-primary delete' style='color:red;' id='".$row['Reg_id']."'>Delete</a></td>
        
    </tr>";
    }     
   
?>