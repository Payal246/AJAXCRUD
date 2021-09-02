


<html>
<head>
<title>User Registration</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<!-- <script src="js/form-validation.js"></script> -->
<!-- <script src="js/regform.js"></script> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" >
</head>

<body class="imageblur" style="background-image:url('join-background.jpg');">
<form action="" id="regForm" method="POST" enctype='multipart/form-data' >

<div class="container">
  <div class="row">
      <div class="col-sm-6 ">
        <img class="side" src="pics.png"></img> 
      </div>
    <div class="col-sm-6">
    <div class="center ">
          <div class="mb-4">
            <img class="image" src="logo.jpg" ></img>
              <h4>SIGN UP</h4>
          </div>

      <div  class="input-group mb-2">
      <!-- <i class="fa fa-user icon"></i> -->
      <input  type="text"  name="fnm" minlength="2"  id="fname" class="form-control"  placeholder="First Name">
      </div>
       

      <div class="input-group  mb-2">
        <input type="text" name="lnm"  id="last" class="form-control"  placeholder="Last Name">
      </div>
    

    <div class="input-group mb-2" >
      <input type="text" name="emil"  id="email" class="form-control"  placeholder="Email">
      <span id="email_response" ></span> 
    </div>
    

    <div class="input-group mb-2" >
      <input  type="text" name="unm"  id="uname" class="form-control"  placeholder="Username">
      <span id="user_response"></span>
    </div>
    

    <div class="input-group mb-2">
      <input type="password" name="pwd"  id="pwd" class="form-control"  placeholder="Password">
    </div>
    

      
      
      <div class="input-group mb-2">
              <div class=" rd">
                      <label  id="male" >Male</label>
                      <input id="ifemale" type="radio"  name="gender" value="male">
                    
                      <label  id="female" >Female</label>
                    <input id="ifemale" type="radio"  name="gender" value="female" >
              </div>
      </div>
          



      <div class="input-group mb-2">
          <select class="form-select" id="country" name="country">Country
                <option disabled selected hidden>Select Country</option>
                <?php
                include "connection.php";
                $sql=$link->prepare("select * from countries");
                $sql->execute();
                $fetch=$sql->fetchall();
                foreach($fetch as $cnt)
                {
                  echo "<option value=   '".$cnt['c_id']."'   >"   . $cnt['c_name'].   "</option>";
                  
                }
              ?>
          </select>
      </div>
      

      <div class="input-group mb-2">
        
          <select class="form-select" id="state" name="state">
            <option disabled selected hidden >Select State</option>
            </select>
      </div>
      

      <div class="input-group mb-2">
        
        <select class="form-select" id="city" name="city">
          <option disabled selected hidden>Select City</option>
          </select>
      </div>
       

      <div class="mb-2">
          <input type="file"  id="img" name="img" class="form-control"  >
      </div>
      


      <div class="md-2" id="term">
        <input class="form-check-input" type="checkbox" value="" name='td' >
        <label  class="form-check-label" for="flexCheckDefault">
          I accept the terms of use.
        </label>
      </div> 

      <div class="md-2">
    <button class="button button-block" type="submit" name="submit" id="btn_submit" value="submit" class="btn btn-primary ">Register</button>
      </div>

      <div class="md-2">
    <a href="dashboard.php" class="button button-block">Display Users</a>
      </div>

</div>
</div>
</div>

</form>
</table>

<script>
// State by country...........................//
$(document).ready(function(){
    $('#regForm').on('submit',function(){
        var fname=$('#fname').val();
        var lname=$('#last').val();
        var email=$('#email').val();
        var uname=$('#uname').val();
        var pwd=$('#pwd').val();
        var g=$('#ifemale').val();
        var cnt=$('#country').val();
        var st=$('#state').val();
        var ct=$('#city').val();
        var img=$('#img').val();
            $.ajax({
                url:"insertdata.php",
                type:"POST",
                data:{
                    fnm:fname,
                    lnm:lname,
                    eml:email,
                    unm:uname,
                    p:pwd,
                    gen:g,
                    country:cnt,
                    state:st,
                    city:ct,
                    img:img,
                },
                    cache:false,
                    success:function(data)
                    {
                        //  alert($('#fname').val());
                        $('#fname').val();
                        $('#lname').val();
                        $('#email').val();
                        $('#uname').val();
                        $('#pwd').val();
                        $('#ifemale').val();
                        $('#country').val();
                        $('#state').val();
                        $('#city').val();
                        $('#img').val();
                        // alert($('#img').val());
                         
                    }
            });
    });
});


//City by state......................................//

$(document).ready(function(){

    $('#country').on('change',function(){
  
  //alert("inside");
  var country_id=this.value;
    $.ajax({
          url:"selectstate.php" ,
        type:"POST",
        data:{countid:country_id},
        cache:false,
        success:function(result)
        {
        $('#state').html(result);
        $('#city').html('<option value="">select state first</option>');
        }
      });
    });

$('#state').on('change',function(){
  
//alert("inside");
var sid=this.value;
  $.ajax({
    //alert("inside");
        url:"selectcity.php" ,
      type:"POST",
      data:{stateid:sid},
      cache:false,
      success:function(result)
      {
        
      $('#city').html(result);
      
      }
    });
  });

    
 });

</script>
</body>
</html>

