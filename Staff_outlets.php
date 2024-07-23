<?php
include('scripts.php');
include('includes/header.php'); 
include('Staff_navbar.php');


$query = "SELECT * FROM outlet";
$result = mysqli_query($db, $query);
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add OutLet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="scripts.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Outlet Name </label>
                <input type="text" name="outlet_name" class="form-control" placeholder="...">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="...">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="outlet_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">
<div class="card shadow mb-4 mr-5">
  <div class="card-header py-4">
    <h6 class="m-0 font-weight-bold text-primary row">
    <a class="link" href="Staff_index.php">
            <button type="button" class="btn btn-danger pull-left">BACK</button></a>
    </h6>
  </div>

  <div class="card-body">

      <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-weight-bold text-dark">
            <th>Outlet Name </th>
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
            
            <td><?php echo $row['Outlet_Name']; ?></td>
            <td><?php echo $row['Address'];?></td>

            <td><a class="link" href="Staff_orders.php">
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