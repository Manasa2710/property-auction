<?php
session_start();
if($_SESSION['site']=="in"){


?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="navstyle.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}


input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
button:hover {
  opacity: 0.8;
}
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
}


input[type=submit]:hover {
  opacity: 0.8;
}




.content{
    padding: 16px;
}


.container {
  padding: 16px;
}


.error{
  color: red;
}


.add{
    width: 10%;
  padding: 14px 18px;
  background-color: #3f11f668;
  }


</style>
</head>
<body>


<?php
  include 'conn.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 
  if( $_SERVER["REQUEST_METHOD"]=='POST'){
    if(isset($_POST["submit"])){
      $file = $_FILES['image']['name'];
       $name = $_POST['name'];
       $address = $_POST['address'];
       $description = $_POST['description'];
       $url = $_POST['url'];


       $q = "INSERT INTO `properties`(`id`,`image`,`name`,`address`,`description`,`url`)
        VALUES ('','$file','$name','$address','$description','$url') ";
        $query_run = mysqli_query($connection,$q);


        if($query_run){
          if( !empty($file) && !empty($name) && !empty($address) && !empty($description) ){
            move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$file);
          header('location: display.php');
        }
        else{
          echo "<script> alert('Enter all the details!')</script>";


        }}
    }
}
?>


<div class="topnav" id="myTopnav">
  <a href="admin_home.php" >Home</a>
  <div class="dropdown">
    <div class="active">
    <button class="dropbtn" >Property Management
      <i class="fa fa-caret-down"></i>
    </button>
    </div>
    <div class="dropdown-content">
      <a href="property_manage.php">Add property</a>
      <a href="display.php">View properties</a>
    </div>
  </div>
  <a href="contact_manage.php">Contact Management</a>
  <a class="logout" href="log_out.php">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>




<div class="content">
<h2>Add property</h2>


<form action="" method="post" enctype="multipart/form-data">
<label for="image">Property:</label></t>
<input type="file" name="image" id="image" required="required">
<br><br>
     <label >Property name:</label>
     <input type="text" name="name" value="">
     <label >Address</label>
     <input type="text" name="address" value="">
     <label >Description:</label><br>
     <textarea name="description" rows="5" cols="89"></textarea><br>
     <label >Youtube link:</label><br>
     <input type="url" name="url" id=""><br>
  </div>


  <div class="container" style="background-color:#f1f1f1">
  <input type="submit" class="add" name="submit" value="Add">
  </div>
</form>


</body>
</html>


<?php
 
}
else{
    session_destroy();
    header('Location: loginn.php');
}
?>
