<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Insert Record</title>

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
                  <a class="nav-link" href="../index.html">Test Connection</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="../insert.html">Insert Record</a>
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
      <section class="text-center">
         <h3 class="my-5">Data Insertion Result:</h3>

         <!-- PHP goes here -->
         <div class="card border-secondary">
            <div class="card-body">

            
            <?php

            $server = "localhost";
            $dbname = "facilityDB";
            $username = "root";
            $password = "";

            try {
               $conn = new PDO("mysql:host=$GLOBALS[server];dbname=$GLOBALS[dbname]", $GLOBALS['username'], $GLOBALS['password']);
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $err) {
               echo "<h5 class='text-danger'>Connection Failed: " . $err->getMessage() . "</h5>\r\n";
            }

            try {
               $sql = "INSERT INTO Person (Person_ID, First_Name, Last_Name, Date_Of_Birth, Phone, Email)
                        VALUES (:pId, :fName, :lName, :DoB, :phone, :mail);";
               
               $stmnt = $conn->prepare($sql);
               $stmnt->bindParam(':pId', $_POST['pId']);
               $stmnt->bindParam(':fName', $_POST['Fname']);
               $stmnt->bindParam(':lName', $_POST['Lname']);
               $stmnt->bindParam(':DoB', $_POST['DoB']);
               $stmnt->bindParam(':phone', $_POST['phone']);
               $stmnt->bindParam(':mail', $_POST['mail']);

               $stmnt->execute();

               echo "<h5 class='text-success'>Data Inserted Successfully</h5>";
            } catch (PDOException $err) {
               echo "<h5 class='text-danger'>Data Insertion Failed: " . $err->getMessage() . "</h5>\r\n";
            }

            unset($conn);

            ?>

            </div>   <!-- End card body -->

            <div class="card-footer">
               <a class='btn btn-primary my-3' href='../insert.html'>Insert Another Record</a>
            </div>
         </div>   <!-- End card -->
      </section>
   </div>

</body>

</html>