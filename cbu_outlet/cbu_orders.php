<?php
include('../includes/header.php'); 
include('../Staff_navbar.php');
include('../includes/scripts.php');
include('../AdminPanel/sorters.php');


$query = $db->prepare("SELECT * FROM stafforders WHERE status = 'accepted' AND Outlet_Name = 'cbu'");
$query->execute();
$order_results = $query->get_result();
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
                        <label class="text-dark text-weight-bold">Product Name</label>
                        <input
                            type="text"
                            name="product_name"
                            class="form-control"
                            placeholder="select Product"></div>
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter Amount"></div>
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder=""></div>
                        <div class="form-group">
                        <label class="text-dark text-weight-bold">Model</label>
                        <input type="text" name="model" class="form-control" placeholder=""></div>
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Description</label>
                        <input type="text" name="description" class="form-control" placeholder=""></div>
                    <div class="form-group">
                        <input type="hidden" name="outlet" value="cbu"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="cbu_order_btn" class="btn btn-success">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card shadow mr-5">
        <div class="card-header py-0">
            <h2 class="display-6 text-center text-dark">CBU</h2>
            <h2 class="display-6 text-center text-dark">IN STOCK</h2>
        </div>
        <h6 class="ml-3 m-0 font-weight-bold row">
            <a class="link l-20" href="cbu_index.php">
                <button type="button" class="btn btn-danger pull-left mt-2 mr-2">BACK</button>
            </a>
            <button
                type="button"
                class="btn btn-success mt-2"
                data-toggle="modal"
                data-target="#add_customer">
                Order
            </button>
        </h6>
        <div class="card-body">
            <table id="ordersTable" class="table table-bordered text-center text-dark">
                <thead>
                    <tr class="text-dark text-weight-bold">
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Model</th>
                        <th>Description</th>
                        <th>Outlet Name</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                    <?php while ($row = $order_results->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Stock_Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['Model']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['outlet_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                    <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#ordersTable').DataTable(
            {"paging": true, "searching": true, "ordering": true, "info": true}
        );
    });
</script>

</body>
</html>
<?php

?>