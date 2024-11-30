<?php
include 'conn.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$err = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["name"])) {
        $nameErr = "name is  required";
    } else {
        $name = test_input($_POST["name"]);
    }


    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
    if(!preg_match('/^[0-9]{10}+$/', $phone)) {
       
        $phoneErr = " Invalid Phone Number";
        }}


        if (empty($_POST["address"])) {
            $addErr = "address is  required";
        } else {
            $address = test_input($_POST["address"]);
        }


    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
    } else {
        $password = test_input($_POST["password"]);
    }


    function value($t)
    {
        foreach ($t as $a => $b) {
            foreach ($b as $c => $d) {
                return $d;
            }


        }}


    if ((!empty($email)) && (!empty($name)) && (!empty($password) && (!empty($phone))&&(preg_match('/^[0-9]{10}+$/', $phone)) &&(!empty($address)) )) {


        $emailcheck = "SELECT COUNT(*) FROM `login` WHERE email = '$email' ";
        $emailquery = mysqli_query($connection, $emailcheck);
        $emailquery = mysqli_fetch_all($emailquery, MYSQLI_ASSOC);
        $emailquery = value($emailquery);




        if ($emailquery > 0) {
            $err = '<h3> Email already exists <h3>';
        } else {
            $err = "";
            $sql = "INSERT INTO `signup`(`name`, `email`,`phone`,`address`, `password`)
                VALUES( '$name','$email','$phone','$address','$password' ) ";
            $query = mysqli_query($connection, $sql);
            $a = "INSERT INTO `login`( `email`, `password`,`user_type`)
            VALUES('$email','$password','user' ) ";
            $b = mysqli_query($connection, $a);
            $_SESSION['phone']= $phone;
            $_SESSION['insert'] = 'signed up successfully';


        }


    }
}
?>
