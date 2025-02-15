<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Test Connection</title>

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
   <section class="text-center my-5">
      <h3 class="my-2">Click to test your database connection</h3>

      <?php
         
         $server = "localhost";
         $username = "root";
         $password = "";

         try {
            $conn = new PDO("mysql:host=$server", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h5 class='text-success'>Connection Successful</h5>";

         } catch (PDOException $err) {
            echo "<h5 class='text-danger'>Connection Failed: " . $err->getMessage() . "</h5>\r\n";
         }

         unset($conn);
      ?>

      <a class="btn btn-primary my-5" href="../index.html">Back To Home</a>

   </section>
</div>

</body>
</html>