<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Record</title>

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
                  <a class="nav-link" href="../insert.html">Insert Record</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="../select.html">Select Query</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="../update.html">Update Record</a>
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
      <form class="text-center" method="post" action="../update.html">
         <legend class="my-5">Update Result</legend>

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
            $sql = "";
            // Use different select methods for different conditions
            if ($_POST['Fname']) {
               $sql = "UPDATE $dbname.Person SET First_Name = '$_POST[Fname]' WHERE Person_ID = $_POST[pId];";
               $stmnt = $conn->prepare($sql);
               $stmnt->execute();
            }

            if ($_POST['Lname']) {
               $sql = "UPDATE $dbname.Person SET Last_Name = '$_POST[Lname]' WHERE Person_ID = $_POST[pId];";
               $stmnt = $conn->prepare($sql);
               $stmnt->execute();
            }

            if ($_POST['DoB']) {
               $sql = "UPDATE $dbname.Person SET Date_Of_Birth = '$_POST[DoB]' WHERE Person_ID = $_POST[pId];";
               $stmnt = $conn->prepare($sql);
               $stmnt->execute();
            }
            
            if ($_POST['phone']) {
               $sql = "UPDATE $dbname.Person SET Phone = $_POST[phone] WHERE Person_ID = $_POST[pId];";
               $stmnt = $conn->prepare($sql);
               $stmnt->execute();
            }
            
            if ($_POST['mail']) {
               $sql = "UPDATE $dbname.Person SET Email = '$_POST[mail]' WHERE Person_ID = $_POST[pId];";
               $stmnt = $conn->prepare($sql);
               $stmnt->execute();
            }  // end conditions

            echo "<h5 class='text-success my-2'>Record Updated Successfully!</h5>
                  <h6 class='text-secondary'>See The Updated Record Below: </h6>";

            // Fetch and display the new record
            $sql = "SELECT * FROM Person WHERE Person_ID = $_POST[pId]";
            
            $stmnt = $conn->prepare($sql);
            $stmnt->execute();
            $row = $stmnt->fetch();

            if ($row) {
               echo "<table class='table table-hover my-4'>";
               echo "<thead>
                        <tr class='table-primary'>
                           <th>Person ID</th>
                           <th>Full Name</th>
                           <th>Date Of Birth</th>
                           <th>Phone</th>
                           <th>Email</th>
                        </tr>
                     </thead>";
               do {
                  echo "<tr>
                           <td>$row[Person_ID]</td>
                           <td>$row[First_Name] $row[Last_Name]</td>
                           <td>$row[Date_Of_Birth]</td>
                           <td>$row[Phone]</td>
                           <td>$row[Email]</td>
                        </tr>";
               } while ($row = $stmnt->fetch());
               echo "</table>";

            } else {
               echo "<h5 class='text-secondary'> No Record Found!</h5>";
            }

         } catch (PDOException $err) {
            echo "<h5 class='text-danger'>Record Retrieval Failed: " . $err->getMessage() . "</h5>\r\n";
         }

         unset($conn);
         ?>

         <button class="btn btn-primary my-3">Update Another Record</button>

      </form>
   </div>

</body>

</html>