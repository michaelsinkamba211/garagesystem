<?php
include('../includes/header.php'); 
include('../Staff_navbar.php');
include('../includes/scripts.php');
include('sorters.php');


$query = "SELECT 
    loan_id,
    borrower_name,
    Contact,
    loan_amount,
    loan_date,
    Paid,
    return_amount,
    due_date,
    CASE
        WHEN Paid = return_amount THEN 'Settled'
        WHEN due_date <= CURDATE() THEN 'Due'
        ELSE 'Active'
    END AS status
FROM Loans";
$output = mysqli_query($db, $query);
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
                <h5 class="modal-title" id="exampleModalLabel">Add Loan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="scripts.php" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter Full Name"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label>Loan Amount</label>
                        <input
                            type="decimal"
                            name="loan_amount"
                            class="form-control"
                            placeholder="Enter amount Loaned"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label>Loan Date</label>
                        <input
                            type="date"
                            name="loan_date"
                            class="form-control"
                            placeholder="Enter Today's Date"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label>Return Amount</label>
                        <input
                            type="Decimal"
                            name="return_amount"
                            class="form-control"
                            placeholder="Enter amount to be returned"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input
                            type="date"
                            name="due_date"
                            class="form-control"
                            placeholder="Due Date"
                            required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="loan_btn" class="btn btn-primary">Save</button>
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
                    <button type="button" class="btn btn-danger pull-left mr-2">BACK</button>
                </a>
                <button
                    type="button"
                    class="btn btn-secondary pull-right"
                    data-toggle="modal"
                    data-target="#addadminprofile">
                    Add New Loan
                </button>
            </h6>
        </div>

        <div class="card-body">
            <table
                id="staffTable"
                class="table table-bordered text-center"
                width="100%"
                cellspacing="0">
                <thead>
                    <tr class="text-dark font-weight-bold">
                        <th>Full Name</th>
                        <th>Contact</th>
                        <th>Loan Amount</th>
                        <th>Date</th>
                        <th>Paid</th>
                        <th>Return Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Pay</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($output)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['borrower_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['Contact']); ?></td>
                        <td><?php echo htmlspecialchars($row['loan_amount']); ?></td>
                        <td><?php echo htmlspecialchars($row['loan_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['Paid']); ?></td>
                        <td><?php echo htmlspecialchars($row['return_amount']); ?></td>
                        <td><?php echo htmlspecialchars($row['due_date']); ?></td>
                        <td>
                            <?php if ($row['status'] == 'Due'): ?>
                            <span class="badge badge-danger"><?php echo htmlspecialchars($row['status']); ?></span>
                        <?php elseif ($row['status'] == 'Active'): ?>
                            <span class="badge badge-warning"><?php echo htmlspecialchars($row['status']); ?></span>
                        <?php else: ?>
                            <span class="badge badge-success"><?php echo htmlspecialchars($row['status']); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a
                                href="LoanUpdate.php?id=<?php echo $row['loan_id'];?>"
                                class="btn btn-success">update</td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#staffTable').DataTable(
                {"paging": true, "searching": true, "ordering": true, "info": true}
            );
        });
    </script>
    <?php
?>