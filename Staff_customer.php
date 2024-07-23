<?php
include('header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$query = "SELECT * FROM customer";
$result = mysqli_query($db, $query);

?>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Thank You!</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>

<div class="modal-body btn btn-danger"> Are you sure you want to Delete?</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

<form action="scripts.php" method="POST">
<a class="nav-link" href="scripts.php">
<button type="submit" name="delete_btn" class="btn btn-primary">Logout</button>
</a>

</form>
</div>
</div>
</div>
</div>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="scripts.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="Address" class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="Phone_Number" class="form-control" placeholder="Enter Number">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="Staff_customer_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-4"> 
    <h2 class="display-6 text-center">CUSTOMERS</h2>
  </div>
    <h6 class="ml-2 m-10 font-weight-bold text-primary row">
    <a class="link" href="Staff_sales.php">
            <button type="button" class="btn btn-danger mt-2 mr-2">BACK</button></a>
            <div>
            <button type="button" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#addadminprofile">
              New Customer
            </button>
</div>
    </h6>

  <div class="card-body">
      <table class="table table-bordered text-center">
          <tr class="text-dark text-weight-bold">
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          <tr>
            <?php
             while($row = mysqli_fetch_assoc($result))
            {
            ?>
            <td><?php echo $row['CustomerName']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Phone_Number']; ?></td>
                  <td><form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                </form>
            </td>
            <td>
            
            <form action="" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['CustomerID']; ?>">
                    <button  type="submit" name="customer_delete_btn" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>

            <?php
            }
            ?>
      </table>
    </div>
  </div>
</div>