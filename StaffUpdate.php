<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$id =$_GET['id'];
$query = "SELECT * FROM employee WHERE Employee_id = '$id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['updatebtn']))
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

<div class="card shadow mb-4 w-50">
  <div class="card-header h-800 py-4">
  <h6 class="ml-2 font-weight-bold row">
  <a class="link l-20" href="Staff.php">
            <button type="button" class="btn btn-danger pull-left mt-2 mr-2">BACK</button></a>
         <hr><br>
    </h6>
    <form method="POST" class=" justify-content-center">
            <div class="form-group w-50">
                <label class="text-dark text-weight-bold">Employee Name</label>
                <input type="text" name="name" value="<?php echo $row['Employee_Name'];?>" class="form-control" required >
            </div>
            <div class="form-group w-50">
                <label class="text-dark text-weight-bold">Email</label>
                <input type="text" name="email" value="<?php echo $row['Email'];?>" class="form-control" required >
            </div>
            <div class="form-group w-50">
                <label class="text-dark text-weight-bold">Password</label>
                <input type="password" name="password" value="<?php echo $row['Password'];?>" class="form-control" required >
            </div>
            <div class="form-group w-50">
                <label class="text-dark text-weight-bold">Outlet Name</label>
                <input type="text" name="outlet" value="<?php echo $row['Outlet_Name'];?>" class="form-control" required >
            </div>
            <div class="form-group w-50">
                <label class="text-dark text-weight-bold">Position</label>
                <input type="text" name="position" value="<?php echo $row['Position'];?>" class="form-control" required >
            </div>
            <button type="submit" name="updatebtn" class="btn btn-primary mr-3">Update</button>
      </form>
      </div>
</div>
    </div>
  </div>
</div>
 </div>