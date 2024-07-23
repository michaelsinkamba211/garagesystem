<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per_page']) && (int)$_GET['per_page'] <= 50 ? (int)$_GET['per_page'] : 4;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$query = $db->prepare("SELECT * FROM payment LIMIT ?, ?");
$query->bind_param("ii", $start, $perPage);
$query->execute();
$results = $query->get_result();

$totalQuery = $db->query("SELECT * FROM payment");
$total = $totalQuery->num_rows;
$pages = ceil($total / $perPage);
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
            <button type="submit" name="savebtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid mt-5">
<div class="card shadow mr-5">
  <div class="card-header py-0"> 
    <h2 class="display-6 text-center">SALES</h2>
  
    <h6 class="ml-2 font-weight-bold row">
    <a class="link" href="index.php">
            <button type="button" class="btn btn-danger mt-2 mr-2 ">BACK</button></a><br>
            <button type="button" class="btn btn-success mt-2 mr-2" data-toggle="modal" data-target="#add_customer">
              Add Sale
            </button>
            <a class="link" href="customer.php">
            <button type="button" class="btn btn-primary mt-2">View Customer</button></a>
        
    </h6>
    </div>
  <div class="card-body">
      <table class="table table-bordered text-center text-dark">
          <tr class="text-dark text-weight-bold">
            <th>Customer</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Outlet</th>
            <th>Receipt</th>
          </tr>
          <tr class="">

              <?php while ($row = $results->fetch_assoc()) { ?>

              <td><?php echo $row['CustomerName']?></td>
              <td><?php echo $row['Stock_Name']?></td>
              <td><?php echo $row['Price']?></td>
              <td><?php echo $row['Quantity']?></td>
              <td><?php echo $row['Date_Sold']?></td>
              <td><?php echo $row['Outlet_Name']?></td>
              <td><button  type="submit" name="customer_delete_btn" class="btn btn-secondary"onclick="print()">Print</button></td>
          </tr>
          <?php
              }
          ?>
      </table>
      <div class="d-flex justify-content-center">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $pages; $i++) : ?>
          <li class="page-item">
            <a class="page-link" href="?page=<?php echo $i; ?>&per_page=<?php echo $perPage; ?>"><?php echo $i; ?></a>
          </li>
          <?php endfor; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>