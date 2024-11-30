<?php
include('log_valid.php')
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 24px 0;
  border: none;
  cursor: pointer;
  width: 10%;
}


button:hover {
  opacity: 0.8;
}


.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #3f11f668;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}


img.avatar {
  width: 40%;
  border-radius: 50%;
}


.container {
  padding: 16px;
}


span.psw {
  float: right;
  padding-top: 16px;
}
.error{
            color : red;
            font-size : 13px;
        }
h3{
  color : red;
 
}        


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
   
<span>  
 <?php  
       
 if(isset($err)){
 echo $err;
 unset($err);
}     ?>
 </span>


<h2>LOGIN</h2>


<form action=""  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="imgcontainer">
    <!-- <img src="female-avatar-profile-icon-round-woman-face-vector-18307304.jpg" height="300px"; alt="Avatar" class="avatar"> -->
  </div>


  <div class="container">
    <label for="uname"><b>E-MAIL</b></label>
    <input type="text" placeholder="Enter your email" name="uname" >


     <span class="error">    
      <?php
       if(isset($emailErr)) {
         echo $emailErr;
         unset($emailErr);
       }?>
     </span><br>
                   


    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter your Password" name="psw" >
    <span class="error">    
    <?php
    if(isset($passwordErr)) {
    echo $passwordErr;
    unset($passwordErr);
    }?>
    </span><br>
   
    <input type="radio" name="userType" value="user" id="" checked>
                        <span style ="  font-size: 28px; "> user</span>


    <input type="radio" name="userType" value="admin" id="">
                        <span style ="  font-size: 28px; "> admin</span> <br>
       
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>


  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="location.href = 'signup.php'">Signup</button>
    <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
  </div>
</form>
<!-- <script>
  function fun(){
    header("location: signup.php");
  }
</script> -->


</body>
</html>
