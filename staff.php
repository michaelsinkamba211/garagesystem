<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

// Prepare and execute the query securely
$query = "SELECT * FROM Employee WHERE Position = 'Staff'";
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
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
          </div>
          <input type="hidden" name="position" value="Staff">
          <div class="form-group">
            <label>Outlet Name</label>
            <input type="text" name="outlet" class="form-control" placeholder="Enter Outlet Name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="staff_btn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4 mr-5">
    <div class="card-header py-4">
      <h6 class="m-0 font-weight-bold text-primary row">
        <a class="link" href="index.php">
          <button type="button" class="btn btn-danger pull-left mr-2">BACK</button>
        </a>
        <button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#addadminprofile">
          Add Staff
        </button>
      </h6>
    </div>

    <div class="card-body">
      <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-dark font-weight-bold">
            <th>Employee Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Outlet Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($output)): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['Employee_Name']); ?></td>
              <td><?php echo htmlspecialchars($row['Email']); ?></td>
              <td><?php echo htmlspecialchars($row['Position']); ?></td>
              <td><?php echo htmlspecialchars($row['Outlet_Name']); ?></td>
              <td>
                <a href="Staff_edit.php?Id=<?php echo $row['Employee_id']; ?>" class="btn btn-success">Edit</a>
              </td>
              <td>
                <form action="scripts.php" method="POST">
                  <input type="hidden" name="staff_delete_id" value="<?php echo $row['Employee_id']; ?>">
                  <button type="submit" name="staff_delete_btn" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
