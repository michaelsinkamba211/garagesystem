<?php
include('includes/header.php'); 
include('Staff_navbar.php'); 
include('scripts.php');

$query = "SELECT * FROM Payment";
$result = mysqli_query($db, $query);
?>


<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="scripts.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label class="text-dark text-weight-bold">Customer</label>
                <input type="text" name="customer" class="form-control mb-1 drop" placeholder="Select Customer">
            </div>

            <div class="form-group">
                <label class="text-dark text-weight-bold">Product Name</label>
                <input type="text" name="product_Name" class="form-control" placeholder="select Product">
            </div>
            <div class="form-group">
                <label class="text-dark text-weight-bold">Amount</label>
                <input type="text" name="amount" class="form-control" placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label class="text-dark text-weight-bold">Date</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label class="text-dark text-weight-bold">Outlet Name</label>
                <input type="text" name="outlet" class="form-control" placeholder="outlet">
            </div>
            <div class="form-group">
                <label class="text-dark text-weight-bold">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="outlet">
            </div>
            <input type="hidden" name="id_btn" value="<?php echo $row['Payment_id'];?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="Staff_savebtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header h-800 py-4">
  <h6 class="ml-2 font-weight-bold row">
    <a class="link" href="Staff_index.php">
            <button type="button" class="btn btn-danger mt-2 mr-2 ">BACK</button></a><br>
            <button type="button" class="btn btn-success mt-2 mr-2 " data-toggle="modal" data-target="#add_customer">
              Add Sale
            </button>
            <a class="link" href="Staff_customer.php">
            <button type="button" class="btn btn-primary mt-2">View Customer</button></a>
        
    </h6>
  </div>
           

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Outlet</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <?php
            while($row = mysqli_fetch_assoc($result))
            {
              ?>
            <td><?php echo $row['CustomerName']?></td>
            <td><?php echo $row['Stock_Name']?></td>
            <td><?php echo $row['Price']?></td>
            <td><?php echo $row['Date_Sold']?></td>
            <td><?php echo $row['Outlet_Name']?></td>
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