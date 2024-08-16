<?php
include('footer.php');
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$query = $db->prepare("SELECT * FROM stock");
$query->execute();
$result = $query->get_result();


$query = "DELETE FROM stock  WHERE quantity = 0 ";
$query_run = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sales</title>
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body>

        <div
            class="modal fade"
            id="addadminprofile"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="scripts.php" method="POST">

                        <div class="modal-body">

                            <div class="form-group">
                                <label>Product Name</label>
                                <input
                                    type="text"
                                    name="product_name"
                                    class="form-control mb-1"
                                    placeholder="Select Customer">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" placeholder="enter price">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="quantity">
                            </div>
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" name="model" class="form-control" placeholder="Model of the item">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input
                                    type="text"
                                    name="description"
                                    class="form-control"
                                    placeholder="description">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="Stock_btn" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-0">
                    <h2 class="display-6 text-center">LUSAKA CENTRAL WAREHOUSE</h2>
                    <h2 class="display-6 text-center">IN STOCK</h2>

                    <h6 class="ml-3 m-0 font-weight-bold row ">
                        <a class="link l-20" href="warehouse.php">
                            <button type="button" class="btn btn-danger pull-left mr-2">BACK</button>
                        </a>
                        <button
                            type="button"
                            class="btn btn-secondary pull-right mr-2"
                            data-toggle="modal"
                            data-target="#addadminprofile">
                            Add Stock
                        </button>
                        <a class="link l-20" href="despatchItems.php">
                            <button type="button" class="btn btn-primary">Despatch Products</button>
                        </a>
                    </h6>
                </div>

                <div class="card-body">
                    <table id="warehouseTable" class="table table-bordered text-center text-dark">
                        <thead>
                            <tr class="text-dark text-weight-bold">
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Model</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($row = $result->fetch_assoc()): ?>

                            <tr>
                                <td><?php echo $row['Stock_Name']?></td>
                                <td><?php echo $row['Price']?></td>
                                <td><?php echo $row['Quantity']?></td>
                                <td><?php echo $row['Model']?></td>
                                <td><?php echo $row['Description']?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#warehouseTable').DataTable(
            {"paging": true, "searching": true, "ordering": true, "info": true}
        );
    });
</script>

</body>
</html>