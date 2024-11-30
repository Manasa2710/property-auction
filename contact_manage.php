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
    <title>Document</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="navstyle.css">
</head>
<body>
<div class="topnav">
  <a  href="admin_home.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Property management
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="property_manage.php">Add property</a>
      <a href="display.php">View properties</a>
    </div>
  </div>
  <a class="active" href="contact_manage.php">Contact management</a>
  <a class="logout" href="log_out.php">Logout</a>
</div>


<div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Users Contacted</h4>
            </div>
            <div class="card-body">
                <?php
                include 'conn.php';
                $query = "SELECT * FROM `properties`";
                $query_run=mysqli_query($connection,$query);


               
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Contactno</th>


                        </tr>
                    </thead>
                    <tbody>
                   <?php
                   if(mysqli_num_rows($query_run)>0)
                   {
                    foreach($query_run as $row)
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
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['contactno']; ?></td>
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


<!-- Option 2: jQuery, Popper.js, and Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</body>
</html>
<?php
 
}
else{
    session_destroy();
    header('Location: loginn.php');
}
?>
