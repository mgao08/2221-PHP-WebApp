<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Select Record</title>

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
                  <a class="nav-link active" href="../select.html">Select Query</a>
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
      <form class="text-center" method="post" action="../select.html" id="top">
         <legend class="my-5">Search Result</legend>

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
            // Use different select methods for different conditions
            if ($_POST['pId']) {
               $sql = "SELECT * FROM Person WHERE Person_ID = '$_POST[pId]'";
            
            } else if ($_POST['FullName']) {
               $sql = "SELECT * FROM Person WHERE CONCAT(First_Name, ' ', Last_Name) LIKE '%$_POST[FullName]%'";

            } else if ($_POST['DoB']) {
               $sql = "SELECT * FROM Person WHERE Date_Of_Birth = '$_POST[DoB]'";

            } else if ($_POST['phone']) {
               $sql = "SELECT * FROM Person WHERE Phone LIKE '%$_POST[phone]%'";

            } else if ($_POST['mail']) {
               $sql = "SELECT * FROM Person WHERE Email LIKE '%$_POST[mail]%'";

            } else { // select all
               $sql = "SELECT * FROM Person";

            }  // end if-else
         
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

            } else {
               echo "<h5 class='text-secondary'> No Record Found!</h5>";
            }

         } catch (PDOException $err) {
            echo "<h5 class='text-danger'>Record Retrieval Failed: " . $err->getMessage() . "</h5>\r\n";
         }

         unset($conn);
         ?>

         <button class="btn btn-primary my-3">Select Another Record</button>
         <br>
         <a class="btn btn-link" href="#top">Back To Top</a>

      </form>
   </div>

</body>

</html>