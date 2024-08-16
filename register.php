<?php
include('footer.php');
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$query = "SELECT * FROM Employee WHERE Position = 'Admin'";
$result = mysqli_query($db, $query);
?>

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
                <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="scripts.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label class="text-weight-bold text-dark">Admin Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Surname">
                    </div>
                    <div class="form-group">
                        <label class="text-weight-bold text-dark">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label class="text-weight-bold text-dark">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter Password">
                    </div>

                    <input type="hidden" name="position" value="Admin">
                    <div class="form-group">
                        <label class="text-weight-bold text-dark">Outlet Name</label>
                        <input
                            type="text"
                            name="outlet"
                            class="form-control"
                            placeholder="Enter outlet">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="admin_btn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="card shadow mb-4 mr-5">
        <div class="card-header py-4">
            <h6 class="m-0 font-weight-bold text-primary row">
                <a class="link" href="index.php">
                    <button type="button" class="btn btn-danger mr-2" t="t">BACK</button>
                </a>
                <button
                    type="button"
                    class="btn btn-secondary pull-right"
                    data-toggle="modal"
                    data-target="#addadminprofile">
                    Add Admin
                </button>

            </h6>
        </div>

        <div class="card-body">

            <table
                id="dataTable"
                class="table table-bordered text-center text-dark"
                width="100%"
                cellspacing="0">
                <thead>
                    <tr class=" text-weight-bold">

                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Outlet Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
            while($row = mysqli_fetch_assoc($result))
            {
            ?>

                        <td><?php echo $row['Employee_Name']; ?></td>
                        <td><?php echo $row['Email']?></td>
                        <td><?php echo $row['Position']?></td>
                        <td><?php echo $row['Outlet_Name']?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="edit_id" value="">
                                <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="scripts.php" method="POST">
                                <input
                                    type="hidden"
                                    name="admin_delete_id"
                                    value="<?php echo $row['Employee_id'] ?>">
                                <button type="submit" name="admin_delete_btn" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
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
<script>
$(document).ready(function () {
    $('#registerTable').DataTable(
        {"paging": false, "searching": true, "ordering": true, "info": true}
    );
});
</script>
<?php
include('sorters.php')
?>