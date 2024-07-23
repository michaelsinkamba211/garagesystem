<?php
include('scripts.php');
include('includes/header.php'); 
include('Staff_navbar.php');


$query = "SELECT * FROM Warehouse";
$result = mysqli_query($db, $query);
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid h-800 w-70">
<div class="card shadow mb-4">
  <div class="card-header py-4">
    <h6 class="m-0 font-weight-bold text-primary row">
    <a class="link" href="warehouse_index.php">
            <button type="button" class="btn btn-danger pull-left">BACK</button></a>
    </h6>
  </div>

  <div class="card-body">

      <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Warehouse_Name</th>
            <th>Address</th>
            <th>View Stock</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
            <td><?php echo $row['WarehouseName']; ?></td>
            <td><?php echo $row['Address'];?></td>
            <td><a class="link" href="warehousestock.php">
            <button type="button" class="btn btn-secondary pull-left">Stock</button></a></td>
            </tr>
            <?php
            }
            
            ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>

<?php
?>