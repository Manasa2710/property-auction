<?php
include('conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$_SESSION['site'] = "out";


$email = $password = "";
$emailErr = $passwordErr = "";


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if($_SERVER["REQUEST_METHOD"] == "POST"){


   
    if (empty($_POST["uname"])) {
        $emailErr  = "email is  required";
        } else {
          $email = test_input($_POST["uname"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
        }


        if (empty($_POST["psw"])) {
            $passwordErr = "password is required";
          } else {
            $password = test_input($_POST["psw"]);
       }
       $user = $_POST['userType'];
    //    echo $email."<br>";
    //    echo $password."<br>";


       function value($t){
        foreach($t as $a=>$b){
         foreach($b as $c => $d)
         return $d;
      }}


      if ( (!empty($email)) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (!empty($password))){
           
        $fullcheck = "SELECT COUNT(*) FROM `login` WHERE email = '$email' AND password='$password' AND user_type='$user'";
        $query=mysqli_query($connection,$fullcheck);
        $query = mysqli_fetch_all($query,MYSQLI_ASSOC);
        // print_r($query);
        // echo "<br>";
        // print_r($query[0] ['COUNT(*)']);
        $query = value($query);


        if($query ==1 ){
            // $err = '<h3> login successful<h3>';
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            // $_SESSION['phone'] = $phone;


            $_SESSION['site'] = "in";
            if($user == 'user'){
                header('Location: user_home.php');
               
            }
            else{
                header('Location: admin_home.php');
               
            }
         }
         else{
            // $err = "<h3> email or Password is incorrect </h3>";
            echo "<script> alert('email or Password is incorrect')</script>";
 
         }
           
        }
     }
      
?>
