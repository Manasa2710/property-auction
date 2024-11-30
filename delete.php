<?php
include 'conn.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `properties` where id=$id";
    $result=mysqli_query($connection,$sql);
    if($result){
        header("location:display.php");
    }
    else{
        die(mysqli_error($connection));
    }


}
?>
