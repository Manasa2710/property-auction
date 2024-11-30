<?php
include 'conn.php';
session_start();
if($_SESSION['site']=="in"){
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="navstyle.css">
    <title>USER HOME</title>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->


</head>
<body>
<div class="topnav">
  <a  href="user_home.php">Home</a>
  <a class="active" href="user_contact.php">Contact management</a>
  <a class="logout" href="log_out.php">Logout</a>
</div>


<div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Contacted Properties</h4>
            </div>
            <div class="card-body">
                <?php
                include 'conn.php';
                $sqlquery = "SELECT `name`, `email`, `phone` FROM `signup` WHERE email = '$_SESSION[email]' ";
                $execQry = mysqli_query($connection,$sqlquery);
                $data = mysqli_fetch_assoc($execQry);
                $phone = $data["phone"];
                $name = $data['name'];


                $insertQuery = "SELECT `id`, `image`, `name`, `address`, `description`, `url` FROM `properties` WHERE `contactno` = $phone ";
                $execQry1 = mysqli_query($connection,$insertQuery);
           
               
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Url</th>
                        </tr>
                    </thead>
                    <tbody>
                   <?php
                   if(mysqli_num_rows($execQry1)>0)
                   {
                    foreach($execQry1 as $row)
                    {
                     
                      ?>
                      <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td>
                        <img src="<?php echo "uploads/".$row['image']; ?>" width="100px" height="100px" alt="img">
                      </td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['description']; ?></td>
                      <td><?php echo $row['url']; ?></td>
                      <td>
                      </tr>


<?php


}


}
else
{
?>


<tr>
<td>No record available</td>
</tr>


<?php


}


?>
</tbody>
</table>


</div>
</div>
</div>
</div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
     -->


</body>
</html>


<?php
 
}
else{
    session_destroy();
    header('Location: loginn.php');
}
?>
