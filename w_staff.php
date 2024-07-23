<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$query = "SELECT * FROM Employee WHERE Position = 'warehouse' ";
$output = mysqli_query($db, $query);
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="scripts.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Full Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
                <input type="hidden" name="position" value="warehouse">
                <div class="form-group">
                <label>Outlet</label>
                <input type="text" name="outlet" class="form-control" placeholder="Garage Outlet">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="w_staff_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid h-800 w-70">
<div class="card shadow mb-4">
  <div class="card-header py-4">
    <h6 class="m-0 font-weight-bold text-primary row">
    <a class="link" href="index.php">
            <button type="button" class="btn btn-danger pull-left">BACK</button></a>
            <button type="button" class="btn btn-secondary pull-right ml-2" data-toggle="modal" data-target="#addadminprofile">
              Add Staff
            </button>

    </h6>
  </div>

  <div class="card-body">

      <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Employee Name</th>
            <th>email</th>
            <th>Position</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            while($row = mysqli_fetch_assoc($output))
            {
            ?>
            <td><?php echo $row['Employee_Name'] ?></td>
            <td><?php echo $row['Email']?></td>
            <td><?php echo $row['Position']  ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
              <form action="" method="POST">
                <input type="hidden" name="staff_delete_id" value="<?php echo $row['Employee_id'] ?>">
            <button  type="submit" name="staff_delete_btn" class="btn btn-danger">DELETE</button>
                </form>
            </td>
            </tr>
            <?php
            }
            
            ?>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>