<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Database</title>

   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <script src="../js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg bg-dark p-3" data-bs-theme="dark">
      <div class="container-fluid">
         <a class="navbar-brand" href="../index.html">Facility Management</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link active" href="../index.html">Test Connection</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../insert.html">Insert Record</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../select.html">Select Query</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../update.html">Update Record</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../delete.html">Delete Record</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   
   <div class="container">

      <!-- Main Contents -->
         
      <?php

      $server = "localhost";
      $username = "root";
      $password = "";

      try {
         $conn = new PDO("mysql:host=$server", $username, $password);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
      } catch (PDOException $err) {
         echo "<h5 class='text-danger'>Connection Failed: " . $err->getMessage() . "</h5>\r\n";
      }

      try {
         $sql = "CREATE DATABASE facilityDB;";
         $conn->exec($sql);

         echo "<h5 class='text-success text-center my-5'>Database Created Successfully</h5>";
      } catch (PDOException $err) {
         echo "<h5 class='text-danger text-center my-5'>" . $err->getMessage() . "</h5>";
      }

      unset($conn);

      ?>

      <div class="card border-secondary">
         <div class="card-body">
            <div class="row">
               <div class="col-6">
                  <form class="text-center my-5" action="createDB.php">
                     <button class="btn btn-secondary">Create Facility Management Database</button>
                  </form>
               </div>

               <div class="col-6">
                  <form class="text-center my-5" action="createTable.php">
                     <button class="btn btn-secondary">Create Person Information Table</button>
                  </form>
               </div>

            </div>   <!-- End row -->
         </div>   <!-- End card body -->

         <div class="card-footer text-center">
            <a class="btn btn-primary my-3" href="../index.html">Back To Home</a>
         </div>
      </div>   <!-- End card -->

   </div>

</body>

</html>