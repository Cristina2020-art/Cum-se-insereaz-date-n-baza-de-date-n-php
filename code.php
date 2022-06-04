<?php
session_start();
$con = mysqli_connect("localhost","root","","employees");

if(isset($_POST['insert_data']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);

    $query = "INSERT INTO employees (name,phone,email,designation) VALUES ('$name','$phone','$email','$designation') ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Inserted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: index.php");
    }
}

?>