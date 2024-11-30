<?php
session_start();
if($_SESSION['site']=="in"){


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navstyle.css">
    <style>*{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
   
    body{
        background-color: #ffffff;
    }
   
    /*Basic structure of slider*/
    .container{
        width: 800px;
        height: 450px;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        overflow: hidden;
        border: 10px solid white;
        border-radius: 8px;
        box-shadow: -1px 5px 15px black;
    }
   
    /*Area of images*/
    .wrapper{
        width: 100%;
        display: flex;
        animation: slide 16s infinite;
    }
   
    img{
        width: 100%;
    }
    /*Animation activated by keyframes*/
    @keyframes slide{
        0%{
            transform: translateX(0);
        }
        25%{
            transform: translateX(0);
        }
        30%{
            transform: translateX(-100%);
        }
        50%{
            transform: translateX(-100%);
        }
        55%{
            transform: translateX(-200%);
        }
        75%{
            transform: translateX(-200%);
        }
        80%{
            transform: translateX(-300%);
        }
        100%{
            transform: translateX(-300%);
        }
    }</style>
</head>
<body>


<div class="topnav" id="myTopnav">
  <a href="admin_home.php" class="active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Property Management
      <i class="fa fa-caret-down"></i>
    </button>
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
<div class="container">
        <!--Area of the images-->
           <div class="wrapper">
              <img src="3.png">
              <img src="4.png">
              <img src="2.jpg">
              <img src="1.jpg">
             


           </div>
        </div>
</body>
</html>


<?php
}
else{
    session_destroy();
    header('Location: loginn.php');
}
?>
