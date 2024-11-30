<?php
include('signupvalid.php')
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


textarea{
    width:100%
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
  padding: 14px 20px;
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
       
    ?>


<?php  
         if(isset($_SESSION['insert'])){
        //  echo $_SESSION['insert'];
        header("location: loginn.php");
          unset($_SESSION['insert']);
         }
         if(isset($err)){
            echo $err;
             unset($err);
            }     ?>


 </span>


<h2>SIGNUP</h2>


<form action=""  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="imgcontainer">
  </div>


  <div class="container">
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter your name" name="name" >


     <span class="error">    
      <?php
        if(isset($nameErr)) {
            echo $nameErr;
            unset($nameErr);
    }?>
     </span><br>
                   


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter your Email" name="email" >
    <span class="error">    
    <?php
   
  if(isset($emailErr)) {
   echo $emailErr;
   unset($emailErr);
}
    ?>
    </span><br>


    <label for="phone"><b>Phone</b></label>
    <input type="text" placeholder="Enter your phone number" name="phone" >
    <span class="error">    
    <?php
   
   if(isset($phoneErr)) {
    echo $phoneErr;
    unset($phoneErr);
}
    ?>
    </span><br>


    <label for="address"><b>Address</b></label><br>
    <input type="text" placeholder="Enter your address" name="address" >
    <span class="error">    
    <?php
   
   if(isset($addErr)) {
    echo $addErr;
    unset($addErr);
}
    ?>
    </span><br>    
   
    <label for="password"><b>Password</b></label>
    <input type="text" placeholder="Enter your password" name="password" >
    <span class="error">    
    <?php
   
   if(isset($passwordErr)) {
    echo $passwordErr;
    unset($passwordErr);
}
    ?>
    </span><br>
   
       
    <button type="submit">Submit</button>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> -->
    <button type="button" class="cancelbtn" onclick="location.href = 'loginn.php'">Login</button>
  </div>


 
</form>


</body>
</html>
