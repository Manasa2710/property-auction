<?php
session_start();
if($_SESSION['site']=="in"){


?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <link rel="stylesheet" href="navstyle.css">
    <title>display</title>
   
  </head>
  <body>


  <div class="topnav" id="myTopnav">
  <a href="admin_home.php" >Home</a>
  <div class="dropdown">
    <button class="dropbtn" class="active">Property Management
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="property_manage.php">Add property</a>
      <a href="display.php" class="active">View properties</a>
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


    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Properties</h4>
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
                            <th>Url</th>
                            <th>Action</th>
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
                      <td><?php echo $row['url']; ?></td>
                      <td>
                        <a href="edit.php?updateid=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
                      </td>
                      <td>
                        <a href="delete.php?deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a>
                      </td>


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
