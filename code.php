<?php

session_start();

$db = mysqli_connect("localhost", "root","", "garage");

if(isset($_POST['customer_btn']))
{
    $Name = $_POST['name'];
    $Address = $_POST['Address'];
    $Phone_Number = $_POST['Phone_Number'];


    $query = "INSERT INTO customers (Customer_Name, Address, Phone_Number) VALUES ('$Name', '$Address', '$Phone_Number') ";
    $query = mysqli_query($db, $query);

    if($query_run)
    {
        echo "User Saved!";
        $_SESSION['success'] = "user added";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['success'] = "user added";
        header('Location: register.php');
    }
}



