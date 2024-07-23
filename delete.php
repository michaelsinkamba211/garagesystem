<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "car_parts_db");

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE * FROM manager WHERE Manager_id = '$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo $_SESSION['deleted'];
        header('Location: register.php');
    } else
    {
        echo $_SESSION['not deleted'];
        header('Location: register.php');
    }
}
?>