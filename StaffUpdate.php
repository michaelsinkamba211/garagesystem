<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$id =$_GET['id'];
$query = "SELECT * FROM employee WHERE Employee_id = '$id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

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
    <form method="POST" class=" justify-content-center">

    
<div class="container w-50">
  <form method="POST" action="update.ph" enctype="multipart/form-data">
    <div class="mb-3">
            <div>
            <label for="first-name" class="form-label">Full Name</label>
            <input type="text" name="name" value="<?php echo $row['Employee_Name'];?>" class="form-control" required >
            </div>
            <div>
            <label for="last-name" class="form-label">Email</label>
            <input type="text" name="email" value="<?php echo $row['Email'];?>" class="form-control" required >
            </div>
            <div>
            <label for="phone" class="form-label">Password</label>
            <input type="password" name="password" value="<?php echo $row['Password'];?>" class="form-control" required >
            </div>
            <div>
            <label for="position" class="form-label">Outlet</label>
            <input type="text" name="outlet" value="<?php echo $row['Outlet_Name'];?>" class="form-control" required >
            </div>
            <div class="mb-3">
            <label for="garage-number" class="form-label">Position</label>
            <input type="text" name="position" value="<?php echo $row['Position'];?>" class="form-control" required >
            </div>
            <div class="modal-footer">
            <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
      </form>
      </div>
</div>
    </div>
  </div>
</div>
 </div>