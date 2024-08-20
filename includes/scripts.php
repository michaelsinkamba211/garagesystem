<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script src="../vendor/chart.js/Chart.min.js"></script>

<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        ?> 
                            <script>
                                swal({
                                    title: <?php  echo $_SESSION['status']; ?>,
                                    // text: 'deleted successfully',
                                    icon: <?php  echo $_SESSION['status_code']; ?>,
                                    button: 'close'
                                })
                            </script>
                            <?php
                        unset($_SESSION['status']);
                    }
                ?>


<?php
    $db = mysqli_connect("localhost", "root", "", "harmtedy");
    if(!$db){
        die("connection error!");
    }

      if(isset($_POST['customer_btn']))
      {
          $Name = $_POST['name'];
          $Address = $_POST['Address'];
          $Phone_Number = $_POST['Phone_Number'];
      
      
          $query = "INSERT INTO customer (CustomerName, Address, Phone_Number) VALUES ('$Name', '$Address', '$Phone_Number') ";
          $query = mysqli_query($db, $query);
      
          if($query_run)
          {
              echo "User Saved!";
              $_SESSION['success'] = "user added";
              header('Location: Customer.php');
          }
          else
          {
              $_SESSION['success'] = "user added";
              header('Location: Customer.php');
          }
      }

      
      
      if(isset($_POST['staff_btn']))
      {
          $Name = $_POST['name'];
          $Email = $_POST['email'];
          $Password = $_POST['password'];
          $Position = $_POST['position'];
          $Outlet = $_POST['outlet'];
          $password = md5($Password);

          $query = "INSERT INTO employee (
          Employee_Name,Email,Password,Outlet_Name,Position) VALUES ('$Name', '$Email', '$password', '$Outlet', '$Position') ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: staff.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: staff.php');
          }
      }

      if(isset($_POST['loan_btn']))
      {
          $Name = $_POST['name'];
          $Loan_Amount = $_POST['loan_amount'];
          $Loan_Date = $_POST['loan_date'];
          $Return_Amount = $_POST['return_amount'];
          $Due_Date = $_POST['due_date'];
      
          $query = "INSERT INTO loans (
          borrower_name,loan_amount,loan_date,return_amount,due_date) VALUES ('$Name', '$Loan_Amount', '$Loan_Date', '$Return_Amount', '$Due_Date') ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: loan.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: loan.php');
          }
      }

      if(isset($_POST['w_staff_btn']))
      {
          $Name = $_POST['name'];
          $Email = $_POST['email'];
          $Password = $_POST['password'];
          $Position = $_POST['position'];
          $Outlet = $_POST['outlet'];
      
          $query = "INSERT INTO Employee (
          Employee_Name,Email,Password,Position,Outlet_Name) VALUES ('$Name', '$Email', '$Password', '$Position','$Outlet') ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: w_staff.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: w_staff.php');
          }
      }


      if (isset($_POST['savebtn'])) {
    
        // Fetch data from Stafforders
        $query = "SELECT * FROM Stafforders";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
    
        if ($row) {
            $customer = $row['CustomerName'];
            $Product_Name = $row['Stock_Name'];
            $amount = $row['Price'];
            $Quantity = $_POST['quantity'];  // Use the quantity from the form
            $date = $_POST['date'];
            $Outlet_Name = $row['Outlet_Name'];
    
            // Insert the data into the payment table
            $query = "INSERT INTO payment (`CustomerName`, `Stock_Name`, `Price`, `Quantity`, `Date_Sold`, `Outlet_Name`) 
                      VALUES ('$customer', '$Product_Name', '$amount', '$Quantity', '$date', '$Outlet_Name')";
            $query_run = mysqli_query($db, $query);
    
            if ($query_run) {
                // Update the Stafforders table to reduce the quantity
                $query = "UPDATE Stafforders SET Quantity = Quantity - $Quantity WHERE OrderID_id = '$id'";
                $query_run = mysqli_query($db, $query);
    
                if ($query_run) {
                    $_SESSION['updated'] = "Transaction successful, and quantity updated.";
                    header('Location: sales.php');
                } else {
                    $_SESSION['not_updated'] = "Transaction successful, but failed to update quantity in Stafforders.";
                    header('Location: sales.php');
                }
            } else {
                $_SESSION['not_updated'] = "Failed to insert data into payment table.";
                header('Location: sales.php');
            }
        } else {
            $_SESSION['not_updated'] = "Order not found in Stafforders.";
            header('Location: sales.php');
        }
    }

          if(isset($_POST['savebtn']))
      {
          $customer = $_POST['customer'];
          $Product_Name = $_POST['product_Name'];
          $amount = $_POST['amount'];
          $Quantity = $_POST['quantity'];
          $Model = $_POST['model'];
        //   $date = $_POST['date'];
          $Outlet_Name = $_POST['outlet'];
      
          $query = "INSERT INTO payment (CustomerName`, `Stock_Name`, `Price`, `Quantity`, `Outlet_Name)
          SELECT product_name = '$Product_Name', price = '$amount', quantity = '$Quantity', Model = '$Model', Outlet_Name = '$Outlet_Name'
          FROM Stafforders";
          
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: sales.php');
          } else
          {
              $_SESSION['not_updated'];
              header('Location: sales.php');
          }
      }



      if(isset($_POST['Staff_savebtn']))
      {
          $customer = $_POST['customer'];
          $Product_Name = $_POST['product_Name'];
          $amount = $_POST['amount'];
          $date = $_POST['date'];
          $Outlet_Name = $_POST['outlet'];
          $Quantity = $_POST['quantity'];
          $id = $_POST['id_btn'];
      
          $query = "INSERT INTO payment (`CustomerName`, `Stock_Name`, `Price`, `Quantity`, `Date_Sold`, `Outlet_Name`) VALUES ('$customer', '$Product_Name', '$amount', '$Quantity', '$date', '$Outlet_Name')";
          $query_run = mysqli_query($db, $query);

          $query = "UPDATE orders w SET w.Quantity = w.Quantity - $Quantity WHERE OrderID_id= '$id' ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: Staff_sales.php');
          } else
          {
              $_SESSION['not_updated'];
              header('Location: Staff_sales.php');
          }
      }

      if(isset($_POST['cbu_sale_btn']))
      {
          $product_name = $_POST['product'];
          $price = $_POST['amount'];
          $quantity = $_POST['quantity'];
          $model = $_POST['model'];
          $description = $_POST['description'];
          $Outlet = $_POST['outlet'];
      
          $query = "INSERT INTO payment (`Item_Name`, `Price`, `Quantity`, `Model`, `description`,`outlet_name`)
                    SELECT '$CustomerName','$product_name', '$price', '$quantity', '$model', '$description', '$Outlet'
                    FROM stafforders 
                    WHERE Stock_Name = '$product_name' AND Model = '$model'";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'] = "Order placed successfully.";
              header('Location: cbu_sales.php');
              exit;
          } else
          {
              $_SESSION['not_updated'] = "Failed to place order.";
              header('Location: cbu_sales.php');
              exit;
          }
      }

      if(isset($_POST['Staff_customer_btn']))
      {
          $Name = $_POST['name'];
          $Address = $_POST['Address'];
          $Phone_Number = $_POST['Phone_Number'];
      
      
          $query = "INSERT INTO customer (CustomerName, Address, Phone_Number) VALUES ('$Name', '$Address', '$Phone_Number') ";
          $query = mysqli_query($db, $query);
      
          if($query_run)
          {
              echo "User Saved!";
              $_SESSION['success'] = "user added";
              header('Location: Staff_Customer.php');
          }
          else
          {
              $_SESSION['success'] = "user added";
              header('Location: Staff_Customer.php');
          }
      }


      if(isset($_POST['Staff_savebtn']))
      {
          $customer = $_POST['customer'];
          $Product_Name = $_POST['product_Name'];
          $amount = $_POST['amount'];
          $date = $_POST['date'];
          $Outlet_Name = $_POST['outlet'];
          $Quantity = $_POST['quantity'];
          $id = $_POST['id_btn'];
      
          $query = "INSERT INTO payment (`CustomerName`, `Stock_Name`, `Price`, `Quantity`, `Date_Sold`, `Outlet_Name`) VALUES ('$customer', '$Product_Name', '$amount', '$Quantity', '$date', '$Outlet_Name')";
          $query_run = mysqli_query($db, $query);

          $query = "UPDATE orders  SET Quantity = Quantity - $Quantity WHERE OrderID_id= '$id' ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: Staff_sales.php');
          } else
          {
              $_SESSION['not_updated'];
              header('Location: Staff_sales.php');
          }
      }


    if(isset($_POST['order_btn']))
    {
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $model = $_POST['model'];
        $description = $_POST['description'];
        $Outlet = $_POST['Outlet'];
    
        $query = "INSERT INTO stafforders (`Stock_Name`, `price`, `quantity`, `Model`, `description`,'Outlet_Name')
                  SELECT '$product_name', '$price', '$quantity', '$model', '$description', '$Outlet'
                  FROM stock 
                  WHERE Stock_Name = '$product_name' AND Model = '$model'";
        $query_run = mysqli_query($db, $query);
    
        if($query_run)
        {
            $_SESSION['updated'] = "Order placed successfully.";
            header('Location: orders.php');
            exit;
        } else
        {
            $_SESSION['not_updated'] = "Failed to place order.";
            header('Location: orders.php');
            exit;
        }
    }

    if(isset($_POST['cbu_order_btn']))
    {
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $model = $_POST['model'];
        $description = $_POST['description'];
        $Outlet = $_POST['outlet'];
    
        $query = "INSERT INTO stafforders (`Stock_Name`, `price`, `quantity`, `Model`, `description`,`outlet_name`)
                  SELECT '$product_name', '$price', '$quantity', '$model', '$description', '$Outlet'
                  FROM stock 
                  WHERE Stock_Name = '$product_name' AND Model = '$model'";
        $query_run = mysqli_query($db, $query);
    
        if($query_run)
        {
            $_SESSION['updated'] = "Order placed successfully.";
            header('Location: cbu_orders.php');
            exit;
        } else
        {
            $_SESSION['not_updated'] = "Failed to place order.";
            header('Location: cbu_orders.php');
            exit;
        }
    }
    

    if (isset($_POST['accept'])) {
        $order_id = $_POST['order_id'];
    
        // Update order status to 'accepted'
        $query = "UPDATE stafforders SET status = 'accepted' WHERE id = '$order_id'";
        mysqli_query($db, $query);
    
        // Fetch order details
        $query = "SELECT * FROM stafforders WHERE id = '$order_id'";
        $result = mysqli_query($db, $query);
        $order = mysqli_fetch_assoc($result);
    
        // Update stock quantity
        $query = "UPDATE stock SET Quantity = Quantity - {$order['quantity']} WHERE Model = '{$order['Model']}'";
        $query_run = mysqli_query($db, $query);
    
        // Insert into orders table
        $query = "INSERT INTO orders (Stock_Name, Price, Quantity, Description) 
                  VALUES ('{$order['Stock_Name']}', '{$order['price']}', '{$order['quantity']}', 
                  '{$order['description']}')";
        mysqli_query($db, $query);
    
        header('Location: despatchItems.php');
        exit;
    }
    
    if (isset($_POST['decline'])) {
        $order_id = $_POST['order_id'];
        $query = "UPDATE stafforders SET status = 'declined' WHERE id = '$order_id'";
        mysqli_query($db, $query);
        header('Location: despatchItems.php');
        exit;
    }
      





      if(isset($_POST['Stock_btn']))
      {
          $Name = $_POST['product_name'];
          $Price = $_POST['price'];
          $Quantity = $_POST['quantity'];
          $Model = $_POST['model'];
          $Description = $_POST['description'];
      
          $query = "INSERT INTO stock (
          Stock_Name,Price,Quantity,Model,Description) VALUES ('$Name', '$Price', '$Quantity', '$Model', '$Description') ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: warehousestock.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: warehousestock.php');
          }
      }



      if(isset($_POST['outlet_btn']))
      {
          $Outlet_Name = $_POST['outlet_name'];
          $Address = $_POST['address'];
      
          $query = "INSERT INTO outlet (
          Outlet_Name,Address) VALUES ('$Outlet_Name', '$Address') ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: outlets.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: outlets.php');
          }
      }


      if(isset($_POST['warehouse_btn']))
      {
          $Warehouse_Name = $_POST['warehouse_name'];
          $Address = $_POST['address'];
      
          $query = "INSERT INTO warehouse (
          WarehouseName,Address) VALUES ('$Warehouse_Name', '$Address') ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: warehouse.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: warehouse.php');
          }
      }


      if(isset($_POST['partpayment_btn']))
      {
          
          $Name = $_POST['name'];
          $Item= $_POST['item'];
          $full_Amount = $_POST['price'];
          $desc= $_POST['description'];
          $Deadline = $_POST['deadline'];

          $query = "INSERT INTO part_payment (full_Name,Item,full_Amount,Description,Deadline) VALUES ('$Name', '$Item', '$full_Amount', '$desc', '$Deadline')";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: part_payment.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: part_payment.php');
          }
      }

      if(isset($_POST['admin_btn']))
      {
          $Name = $_POST['name'];
          $Email = $_POST['email'];
          $Password = $_POST['password'];
          $Position = $_POST['position'];
          $Outlet = $_POST['outlet'];
          $password = md5($Password);

          $query = "INSERT INTO employee (
          Employee_Name,Email,Password,Outlet_Name,Position) VALUES ('$Name', '$Email', '$password', '$Outlet', '$Position') ";
          $query_run = mysqli_query($db, $query);
      
          if($query_run)
          {
              $_SESSION['updated'];
              header('Location: register.php');
          } else
          {
              $_SESSION['not updated'];
              header('Location: register.php');
          }
      }

      if(isset($_POST['login_btn'])) {
        $email_login = $_POST['email'];
        $password_login = $_POST['password'];
    
        $query = "SELECT * FROM employee WHERE Email = '$email_login' AND password = '$password_login' ";
        $query_run = mysqli_query($db, $query);
    
        if($row = mysqli_fetch_assoc($query_run)) {
            if ($row['Position'] === 'Admin') {
                header('Location: ../AdminPanel/index.php');
                $_SESSION['Welcome'] = "Welcome Back";
            } elseif
             ($row['Outlet_Name'] === 'iringa') {
                header('Location: Iringa_index.php');
                $_SESSION['Welcome'] = "Welcome Back";
            } elseif
             ($row['Outlet_Name'] === 'cbu') {
                header('Location: ../cbu_outlet/cbu_index.php');
                $_SESSION['Welcome'] = "Welcome Back";
            } elseif
            ($row['Outlet_Name'] === 'mu') {
               header('Location: mu_index.php');
               $_SESSION['Welcome'] = "Welcome Back";
           }
            else
             {
                $_SESSION['status'] = "Email or password is invalid";
                header('Location: login.php');
            }
        } else {
            $_SESSION['status'] = "Email or password is invalid";
            header('Location: login.php');
        }
    }
    

if(isset($_POST['customer_delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM Customer WHERE CustomerID = '$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo $_SESSION['deleted'];
        header('Location: Customer.php');
    } else
    {
        echo $_SESSION['not deleted'];
        header('Location: Customer.php');
    }
}



if(isset($_POST['warehouse_delete_btn']))
{
    $id = $_POST['warehouse_delete_id'];
    $query = "DELETE FROM warehouse WHERE WarehouseID = '$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo $_SESSION['deleted'];
        header('Location: warehouse.php');
    } else
    {
        echo $_SESSION['not deleted'];
        header('Location: warehouse.php');
    }
}


if(isset($_POST['outlet_delete_btn']))
{
    $id = $_POST['delete_outlet'];
    $query = "DELETE FROM outlet WHERE Outlet_id = '$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo $_SESSION['deleted'];
        header('Location: outlets.php');
    } else
    {
        echo $_SESSION['not deleted'];
        header('Location: outlets.php');
    }
}


if(isset($_POST['staff_delete_btn']))
{
    $id = $_POST['staff_delete_id'];
    $query = "DELETE FROM employee WHERE Employee_id = '$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo $_SESSION['deleted'];
        header('Location: staff.php');
    } else
    {
        echo ['not deleted'];
        header('Location: staff.php');
    }
}

if(isset($_POST['admin_delete_btn']))
{
    $id = $_POST['admin_delete_id'];
    $query = "DELETE FROM employee WHERE Employee_id = '$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo $_SESSION['deleted'];
        header('Location: register.php');
    } else
    {
        echo ['not deleted'];
        header('Location: register.php');
    }
}


if(isset($_POST['submit'])) {
    $id = $_SESSION["id"];
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $enrollNumber = $_POST['EnrollNumber'];
    $dateOfAdmission = $_POST['DateOfAdmission'];

    // Handle file upload
    if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $imgPath = 'uploads/' . basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], $imgPath);
        // Include image path in the update query if necessary
    }

    // Update the employee information
    $statement = $db->prepare("UPDATE employee SET Employee_Name = :name, Email = :email, Password = :phone, Outlet_Name = :enrollNumber, Position = :dateOfAdmission WHERE Employee_id = :id");
    $statement->bindParam(':name', $name);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':phone', $phone);
    $statement->bindParam(':enrollNumber', $enrollNumber);
    $statement->bindParam(':dateOfAdmission', $dateOfAdmission);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    echo "Employee information updated successfully.";
}
?>