<?php
include('header.php'); 
include('Staff_navbar.php');
include('scripts.php');
include('sorters.php');

$query = $db->prepare("SELECT * FROM payment");
$query->execute();
$results = $query->get_result();

$customers = array();
$query = "SELECT CustomerName FROM customer";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $customers[] = $row;
}

$items = array();
$query = "SELECT Stock_Name FROM stafforders";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($results)) {
  $items[] = $row;
}
?>

<div
    class="modal fade"
    id="add_customer" 
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <select class="form-control dropdown" id="customer_id" name="customer">
                            <option value="">Select Customer</option>
                            <?php foreach ($customers as $customer): ?>
                            <option value="<?php echo htmlspecialchars($customer['CustomerName']); ?>">
                                <?php echo htmlspecialchars($customer['CustomerName']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Product Name</label>
                        <select class="form-control dropdown" id="customer_id" name="customer">
                            <option value="">Select Item</option>
                            <?php foreach ($items as $item): ?>
                            <option value="<?php echo htmlspecialchars($item['Stock_Name']); ?>">
                                <?php echo htmlspecialchars($item['Stock_Name']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Amount</label>
                        <input
                            type="text"
                            name="amount"
                            class="form-control"
                            placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Model</label>
                        <input type="text" name="model" class="form-control" placeholder="Item's Model">
                    </div>
                    <!-- <div class="form-group">
                        <label class="text-dark text-weight-bold">Date</label>
                        <input type="date" name="date" class="form-control">
                    </div> -->
                    
                    <input type="hidden" name="outlet" class="Iringa">
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
            <h2 class="display-6 text-center text-dark font-weight-bold">SALES</h2>
            <h6 class="ml-2 font-weight-bold row">
                <a class="link" href="index.php">
                    <button type="button" class="btn btn-danger mt-2 mr-2">BACK</button>
                </a>
                <button
                    type="button"
                    class="btn btn-success mt-2 mr-2"
                    data-toggle="modal"
                    data-target="#add_customer">
                    Add Sale
                </button>
                <a class="link" href="customer.php">
                    <button type="button" class="btn btn-primary mt-2">View Customer</button>
                </a>
                <a class="link" href="Part_payment.php">
                    <button type="button" class="btn btn-warning mt-2 ml-2">Part Payment</button>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <table id="salesTable" class="table table-bordered text-center text-dark">
                <thead>
                    <tr class="text-dark text-weight-bold">
                        <th>SSN</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Model</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Outlet</th>
                        <th>Receipt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $results->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Payment_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['CustomerName']); ?></td>
                        <td><?php echo htmlspecialchars($row['Stock_Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['Price']); ?></td>
                        <td><?php echo htmlspecialchars($row['Quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['Date_Sold']); ?></td>
                        <td><?php echo htmlspecialchars($row['Outlet_Name']); ?></td>
                        <td>
                            <a class="link" href="receipt.php">
                                <button
                                    type="submit"
                                    name="customer_delete_btn"
                                    class="btn btn-secondary"
                                    onclick="print()">Print</button>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#salesTable').DataTable(
            {"paging": true, "searching": true, "ordering": true, "info": true}
        );
    });
</script>