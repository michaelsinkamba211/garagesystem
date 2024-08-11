<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$query = $db->prepare("SELECT * FROM orders");
$query->execute();
$results = $query->get_result();

$query = "DELETE FROM orders  WHERE quantity = 0 ";
$query_run = mysqli_query($db, $query);
?> <div
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
                <div class="modal-body row">
                    <div class="form-group">
                        <label class="text-dark text-weight-bold">Product Name</label>
                        <input
                            type="text"
                            name="product_name"
                            class="form-control"
                            placeholder="select Product"></div>
                        <div class="form-group ml-5">
                            <label class="text-dark text-weight-bold">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Enter Amount"></div>
                            <div class="form-group">
                                <label class="text-dark text-weight-bold">Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder=""></div>
                                <div class="form-group ml-5">
                                    <label class="text-dark text-weight-bold">Outlet Name</label>
                                    <input type="text" name="outlet_name" class="form-control" placeholder="outlet"></div>
                                    <div class="form-group">
                                        <label class="text-dark text-weight-bold">Discount</label>
                                        <input type="text" name="discount" class="form-control" placeholder=""></div>
                                        <div class="form-group ml-5">
                                            <label class="text-dark text-weight-bold">Date Ordered</label>
                                            <input type="date" name="order_date" class="form-control" placeholder="Date"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="order_btn" class="btn btn-success">Done</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="card shadow mr-5">
                                <div class="card-header py-0">
                                    <h2 class="display-6 text-center">MUKUYU MALL</h2>
                                    <h2 class="display-6 text-center">IN STOCK</h2>
                                </div>
                                <h6 class="ml-3 m-0 font-weight-bold row">
                                    <a class="link l-20" href="outlets.php">
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
                                                <th>No.</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Outlet Name</th>
                                                <th>Order Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $results->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['OrderID']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Stock_Name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Price']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Quantity']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Discount']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Outlet_Name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Order_Date']); ?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
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
include('sorters.php');
?>