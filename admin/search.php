<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Search BOOK</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"> Search Book </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Search Book</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form method="post">
                    <div class="container">
    <h2>Book Availability Checker</h2>
    <form method="post" action="check_availability.php">
      <div class="form-group">
        <label for="bookId">Book ID:</label>
        <input type="text" class="form-control" id="bookId" name="bookId" required>
      </div>
      <button type="submit" class="btn btn-primary">Check Availability</button>
    </form>
  </div>
                            </form>
                    <div class="d-sm-flex align-items-center mb-4">

                    </div>
                    <?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentmsdb";

// Get book ID from the form submission
$bookId = $_POST['bookId'];

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to fetch book data by ID
$sql = "SELECT * FROM tblbookdetails WHERE BookID = '$bookId'";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
  // Book found, fetch the row
  $row = $result->fetch_assoc();
  $Numberofcopies = $row['copies_available'];

  echo "<div class='container'>";
  echo "<h2>Book Availability</h2>";
  echo "Book ID: " . $row['BookID'] . "<br>";
  echo "Title: " . $row['BookName'] . "<br>";
  echo "Author: " . $row['BookauthorName'] . "<br>";
  // echo "Copies Available: " . $row['Numberofcopies'] . "<br>";

  if ($Numberofcopies > 0) {
    echo "<span class='text-success'>Book is available!</span>";
    // echo "<span class='text-danger'>Book is not available.</span>";
  } else {
    // echo "<span class='text-danger'>Book is not available.</span>";
    echo "<span class='text-success'>Book is available!</span>";
  }

  echo "</div>";
} else {
  // Book not found
  // echo "<div class='container'>";
  // echo "<h2>Book Availability</h2>";
  // echo "<span class='text-danger'>Book not found.</span>";
  echo "</div>";
}

// Close the database connection
$conn->close();
?>

                    <!-- <div class="table-responsive border rounded p-1">
                      
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">USN</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Branch</th>
                           
                            <th class="font-weight-bold">Book Name</th>
                            <th class="font-weight-bold">Due Date</th>
                            <th class="font-weight-bold">Action</th>
                            
                          </tr>
                        </thead>
                        
                      </table> -->
</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>