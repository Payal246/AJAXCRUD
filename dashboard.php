<?php
error_reporting (E_ERROR);
include "connection.php";

?>


<html>
<head><title>Dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />




<!-- <link rel="stylesheet" href="css/style.css" > -->
</head>
<body>
<table class='displaytable'>
<thead>
<tr>
            <td>Register ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Username</td>
            <td>Gender</td>
            <td>Country</td>
            <td>State</td>
            <td>City</td>
            <td>Actions</td>   
</tr>
</thead>
<tbody id="tbluser">
</tbody>
</table>

<form id="form1" method="POST" enctype='multipart/form-data' action="">
            <table border="1">
                <tr> 
                    <td>First Name</td>
                    <td><input type="text" id="fname" ></td>
                </tr>
                <tr> 
                    <td>Last Name</td>
                    <td><input type="text" id="last" ></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td><input type="text" id="email" ></td>
                </tr>
                <tr> 
                    <td>User Name</td>
                    <td><input type="text" id="uname" ></td>
                </tr>
                <tr> 
                    <td>Gender</td>
                    <td><input type="radio"  id="ifemale" name="gender" value="male" >Male
                    <input type="radio"  id="ifemale" name="gender" value="female" >Female</td>
                </tr>
                
                <tr>
                    <td><input type="hidden" id="id" ></td>
                    <td><input type="submit"  id="update" value="Update"></td>
                </tr>
            </table>
</form>




</body>
</html>
<script>
$(document).ready(function(){
$.ajax({
    url:'displaydata.php',
    type:'POST',
    success:function(data){
      $('#tbluser').html(data);

    }
  });

});

 $('#tbluser').on('click','.delete',function(){
        var regid=$(this).attr("id");
            
                Swal.fire({
                        title: 'Do you want to delete?',
                        showDenyButton: true,
                        //  showCancelButton: true,
                        confirmButtonText: `Delete`,
                        denyButtonText: `Cancel`,
                        }).then((result) => {
                        
                        if (result.isConfirmed) {
                            //var regid=$(this).attr("id");
                            $.ajax  ({
                                url:'delete.php',
                                type:'POST',
                                data:{rid:regid},
                                success:function(data){
                                
                                            Swal.fire({
                                            icon: 'success',
                                            title: 'success',
                                            text: 'Your record is deleted',
                                            });
                                            setInterval('location.reload()', 2500); 
                                }
                            });
                        } else if (result.isDenied) {
                            Swal.fire(' Do not want to delete? OK....', '', 'info');
                        }
                        });

        });     
               
$('#tbluser').on('click','.edit',function(){
         var regid=$(this).attr('id');
         $.ajax({
             url:'displaysingle.php',
             type:'POST',
             data:{rid:regid},
             dataType:"json",
             success:function(data){
               //alert('Success');
                
                 $('#fname').val(data.Firstname);
                 $('#last').val(data.Lastname);
                 $('#email').val(data.Email);
                 $('#uname').val(data.Username);
                 $('#ifemale').val(data.Gender);
                 $('#id').val(data.Reg_id);
                //  $('#country').val(data.Country);
                //  $('#state').val(data.State);
                //  $('#city').val(data.City);
                 //$('.modaltitle').html("Edit user");
                 
             }
         });
     });


        $('#form1').on('submit',function(){
          var fnme=$('#fname').val();
          var lnme=$('#last').val();
          var emil=$('#email').val();
          var unme=$('#uname').val();
          var gendr=$('#ifemale').val();
          var rid=$('#id').val();
            $.ajax({
              url:'updatedata.php',
              type:'POST',
              dataType:'json',
              data:{
                fname:fnme,
                lname:lnme,
                email:emil,
                uname:unme,
                gender:gendr,
                rid:rid,
              },
              success:function(data){
                $('#fname').val();
                $('#lname').val();
                $('#email').val();
                $('#uname').val();
                $('#ifemale').val();
              }
            });
          
        });

     
   

</script>