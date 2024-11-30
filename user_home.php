<?php
include 'conn.php';
session_start();
if($_SESSION['site']=="in"){




    $sql = "SELECT * FROM `properties`";
    $all_properties=mysqli_query($connection,$sql);


 ?>




 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navstyle.css">
    <link rel="stylesheet" href="userstyle.css">
    <title>USER HOME</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   
</head>
<body>
<div class="topnav">
  <a class="active" href="user_home.php">Home</a>
  <a  href="user_contact.php">Contact management</a>
  <a class="logout" href="log_out.php">Logout</a>
</div>
<main>
    <?php
    while($row = mysqli_fetch_assoc($all_properties)){


        ?>
    <div class="card">
        <div class="image">
        <img src="<?php echo "uploads/".$row['image']; ?>" width="300px" height="300px" alt="img">
        </div>
        <div class="caption">
            <p class="property_name"><?php echo $row['name']; ?></p>
            <p class="price"><b></t>ADDRESS</b><?php echo $row["address"]; ?></p>
            <p class="discount"><b></t>DESCRIPTION</b><?php echo $row["description"]; ?></p>
            <b style="font-size: 1.5rem;">URL</b><a href="<?php echo $row["url"]; ?>"><?php echo $row["url"]; ?></a>
           
        </div>
       
        <form  method="POST">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
            <button class="add" name = "contact" id = "<?php echo $row["id"]; ?>" >Contact</button>
           
    </form>    
    </div>
 
<?php


if (isset($_POST['contact'])){    
    $ID = $_POST['id'];
    $sqlquery = "SELECT `name`, `email`, `phone` FROM `signup` WHERE email = '$_SESSION[email]' ";
    $execQry = mysqli_query($connection,$sqlquery);
    $data = mysqli_fetch_assoc($execQry);
    $phone = $data["phone"];
    $name = $data['name'];
    $insertQuery = "UPDATE `properties` SET `contactno` = '$phone',`username`='$name' WHERE `id`= '$ID'";
    $execQry1 = mysqli_query($connection,$insertQuery);


    if ($execQry1){
       echo '<script>alert("Successfully Contacted !")</script>';
    }


}


?>


    <?php
}
?>
</main>


</body>
</html>


<?php
 
}
else{
    session_destroy();
    header('Location: loginn.php');
}
?>
