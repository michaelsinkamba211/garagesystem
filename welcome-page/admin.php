<?php
session_start();
include('../includes/header.php');
include('../includes/scripts.php');
include('../AdminPanel/sorters.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .admin_holder {
      height: 100dvh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .admin_box {
      /* width: 500px; */
      padding: 20px;
      margin: 5px;
    }

    .admin_box h1 {
      font-size: 1.75rem;
      margin-bottom: 20px;
      text-align: center;
      color: black;
    }

    .admin_box select,
    .admin_box input {
      margin-bottom: 15px;
    }

    .admin_box .btn-primary {
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="admin_holder">
    <div class="admin_box border rounded shadow p-4">
      <h1>---- Admin Controller ----</h1>
      <div class="login_details">
        <!-- <form id="loginForm">
          <div class="mb-3">
            <label for="branchSelect" class="form-label">Select Branch</label>
            <select class="form-select" id="branchSelect" aria-label="Branch select" required>
              <option selected disabled>Select a branch</option>
              <option value="cbu-branch">CBU-Branch</option>
              <option value="mu-branch">MU-Branch</option>
              <option value="lusaka-branch">Lusaka-Branch</option>
            </select>
          </div>
          </form> -->
          <form class="user" action="../includes/scripts.php" method="POST">
          <div class="mb-2">
            <label for="username" class="form-label text-dark">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
          </div>
          <div class="mb-2">
            <label for="password" class="form-label text-dark">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
          </div>
          <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
         </form >
        
      </div>
    </div>
  </div>

  <!-- <script>
    document.getElementById('loginForm').addEventListener('submit', function (event) {
      event.preventDefault();

      var branch = document.getElementById('branchSelect').value;

      if (branch === 'cbu-branch') {
        window.location.href = '../cbu_outlet/cbu_index.php';
      } else if (branch === 'mu-branch') {
        window.location.href = 'mubranch.php';
      } else if (branch === 'lusaka-branch') {
        window.location.href = 'lusakabranch.php';
      }
    });
  </script> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_destroy();
?>