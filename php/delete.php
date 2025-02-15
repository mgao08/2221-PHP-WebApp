<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Delete Record</title>

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
                  <a class="nav-link" href="../update.html">Update Record</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="../delete.html">Delete Record</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   
   <div class="container">

      <!-- Section Contents -->
      <form form class="text-center" method="post" action="../delete.html">
         <legend class="my-5">Confirm Deleting Record</legend>

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
            if ($_GET['cfm']) {
               $sql = "DELETE FROM Person WHERE Person_ID = '$_GET[pId]'";
               $stmnt = $conn->prepare($sql);
               $stmnt->execute();
               
               echo "<div class='card border-success'>
                        <div class='card-body py-4'>
                           <h5 class='text-secondary text-bold'>Record Successfully Deleted</h5>
                        </div>
                        <div class='card-footer'>
                           <a class='btn btn-primary my-3' href='../delete.html'>Delete Another Record</a>
                        </div>
                     </div>";

            } else {
               // Select & Display before confirm deletion
               $sql = "SELECT * FROM Person WHERE Person_ID = '$_POST[pId]'";
               $stmnt = $conn->prepare($sql);
               $stmnt->execute();
               $row = $stmnt->fetch();

               if ($row) {
               echo "<table class='table table-hover my-5'>";
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

               echo "<div class='card border-warning'>
                        <div class='card-body py-4'>
                           <h5 class='card-title'>Are you sure you would like to delete this record?</h5>
                           <h6 class='card-text'>This step cannot be reverted!</h6>
                        </div>
                        <div class='card-footer'>
                           <a class='btn btn-danger my-3' href='delete.php?pId=1&cfm=true'>Confirm Deletion</a>
                           <a class='btn btn-secondary my-3' href='../delete.html'>Cancel</a>
                        </div>
                     </div>";
               } else {
                  echo "<div class='card border-secondary'>
                           <div class='card-body py-4'>
                              <h5 class='text-secondary text-bold'>No Record Found</h5>
                           </div>
                           <div class='card-footer'>
                              <a class='btn btn-link my-3' href='../delete.html'>Go Back</a>
                           </div>
                        </div>";
               }
            }

         } catch (PDOException $err) {
            echo "<h5 class='text-danger'>Record Deletion Failed: " . $err->getMessage() . "</h5>\r\n";
         }

         unset($conn);
         ?>

      </form>
   </div>
</body>

</html>