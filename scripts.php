
<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php
    $db = mysqli_connect("localhost", "root", "", "garageDB");
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
      
          $query = "INSERT INTO Employee (
          Employee_Name,Email,Password,Position,Outlet_Name) VALUES ('$Name', '$Email', '$Password', '$Position', '$Outlet') ";
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



      if(isset($_POST['savebtn']))
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

      if(isset($_POST['order_btn']))
      {
          $Name = $_POST['product_name'];
          $Price = $_POST['price'];
          $Quantity = $_POST['quantity'];
          $Outlet_Name = $_POST['outlet_name'];
          $Order_Date = $_POST['order_date'];
          $Discount = $_POST['discount'];
          
          
          $query = ("INSERT INTO orders (Stock_Name, Price, Quantity, Discount, Outlet_Name, Order_Date)
          SELECT w.Stock_Name, w.Price,'$Quantity', w.Discount,'$Outlet_Name', '$Order_Date'
          FROM stock w
          WHERE w.Stock_Name='$Name' AND w.Price='$Price'");
           $query_run = mysqli_query($db, $query);

           $query = "UPDATE stock w SET w.Quantity = w.Quantity - $Quantity WHERE w.Stock_Name='$Name' AND w.Price='$Price'";
           $query_run = mysqli_query($db, $query);

           if (Quantity == 0){
            $query = "DELETE FROM stock WHERE Stock_Name='$Name' AND Price='$Price'";
            $query_run = mysqli_query($db, $query);
           }
            else {
                # code...
            }
            
           
      
        if($query_run)
        {
            $_SESSION['updated'];
            header('Location: orders.php');
        }else
            {
                $_SESSION['not updated'];
                header('Location: index.php');
            }

      }


      if(isset($_POST['Stock_btn']))
      {
          $Name = $_POST['product_name'];
          $Price = $_POST['price'];
          $Quantity = $_POST['quantity'];
          $Discount = $_POST['discount'];
          $Description = $_POST['description'];
      
          $query = "INSERT INTO stock (
          Stock_Name,Price,Quantity,Discount,Description) VALUES ('$Name', '$Price', '$Quantity', '$Discount', '$Description') ";
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




      if(isset($_POST['admin_btn']))
      {
          
          $Name = $_POST['name'];
          $Email = $_POST['email'];
          $Password = $_POST['password'];
          $Position = $_POST['position'];
          $Outlet = $_POST['outlet'];
          
          $password = md5($password);
          $query = "INSERT INTO Employee (Employee_Name,Email,Password,Position,Outlet_Name) VALUES ('$Name', '$Email', '$Password', '$Position','$Outlet')";
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
            // Check the user's role and redirect to the appropriate dashboard
            if ($row['Position'] === 'Admin') {
                header('Location: index.php');
                $_SESSION['Welcome'] = "Welcome Back";
            } elseif
             ($row['Position'] === 'Staff') {
                header('Location: Staff_index.php');
                $_SESSION['Welcome'] = "Welcome Back";
            } elseif
             ($row['Position'] === 'warehouse') {
                header('Location: Staff_warehouse.php');
                $_SESSION['Welcome'] = "Welcome Back";
            } else
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

// if (isset($_POST['submit'])){
//     $id = $_POST['id'];
//     $Name = $_POST['Name'];
//     $Email = $_POST['Email'];
//     $Phone = $_POST['Phone'];
//     $EnrollNumber = $_POST['EnrollNumber'];
//     $DateOfAdmission = $_POST['DateOfAdmission'];
//     $requete = $con -> prepare("UPDATE employee 
//     SET 
//     Name = '$Name',
//     Email = '$Email',
//     Phone = '$Phone',
//     EnrollNumber = '$EnrollNumber',
//     DateOfAdmission = '$DateOfAdmission'
//     WHERE Id = $id");
//     $res = $requete -> execute();
//     header("location:students_list.php");
// }
?>