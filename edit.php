<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navstyle.css">
</head>
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
   
<body>
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
<?php
  include 'conn.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);


  $id=$_GET['updateid'];
 
    if(isset($_POST["submit"])){
       $file = $_FILES['image']['name'];
       $name = $_POST['name'];
       $address = $_POST['address'];
       $description = $_POST['description'];
       $url = $_POST['url'];
       


       $query = "UPDATE `properties` SET id=$id, image= '$file',
       name='$name',address='$address',description='$description',url='$url' WHERE id=$id" ;
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          header("location: display.php");
        }
        else{
          die(mysqli_error($connection));
        }  
    }
?>
<div class="content">
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
  <input type="submit" class="add" name="submit" value="Update">
  </div>
</form>
</body>
</html>
