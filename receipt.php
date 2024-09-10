<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

// $id =$_GET['id'];
// $query = "SELECT * FROM employee WHERE Employee_id = '$id'";
// $result = mysqli_query($db, $query);
// $row = mysqli_fetch_assoc($result);

if(isset($_POST['update_btn']))
{
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $newOutlet = $_POST['outlet'];
    $newPosition = $_POST['position'];
    $query = "UPDATE employee SET Employee_Name = '$newName', Email = '$newEmail', Password = '$newPassword', Outlet_Name = '$newOutlet', Position = '$newPosition' WHERE Employee_id = '$id'";
    $query_run = mysqli_query($db, $query);
    header('location: Staff.php');
}
?>
<div class="container-fluid d-flex justify-content-center">

<div class="card shadow  w-100">
  <div class="card-header py-0">
  <h6 class="ml-2 font-weight-bold row">
  <a class="link l-20" href="Staff.php">
            <button type="button" class="btn btn-danger pull-left mt-2 mr-2">BACK</button></a>
         <hr><br>
    </h6>
<table class="table table-bordered ">
<h2 class="display-6 text-center">RECEIPT</h2>
<thead>
    <tr class="text-column ">
        <td>Customer's Name:</td>
        <td>TPIN:</td>
    </tr>
</thead>
    </table>
</div>
    </div>
  </div>
</div>
 </div>