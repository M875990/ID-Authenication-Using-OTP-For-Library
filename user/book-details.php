<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsstuid']==0)) {
  header('location:logout.php');
  } else{
   
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>View Book Details</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
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
              <h3 class="page-title"> View Book Details</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Book Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <table border="1" class="table table-bordered mg-b-0">
                      <?php
$sid=$_SESSION['sturecmsstuid'];
$sql="SELECT tblbook.StudentName,tblbook.StudentClass,tblbook.Gender,
tblbook.StuID,tblbook.StudentBranch,tblbook.BookId,tblbook.BookName,tblbook.BookAuthorName,tblbook.Borrowdate,tblbook.Duedate,tblclass.ClassName,
tblclass.Section from tblbook join tblclass on tblclass.ID=tblbook.StudentClass where tblbook.StuID=:sid";
$query = $dbh -> prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
 <tr align="center" class="table-primary">
<td colspan="4" style="font-size:20px;color:blue">Book Details</td></tr>

    <tr class="table-striped">
    <th>Student Name</th>
    <td><?php  echo $row->StudentName;?></td>
     <th>USN</th>
    <td><?php  echo $row->StuID;?></td>
  </tr>
  <tr class=" table-info">
  <th>Branch</th>
    <td><?php  echo $row->StudentBranch;?> 
     <th>Semester</th>
    <td><?php  echo $row->StudentClass;?> <?php  echo $row->Section;?></td>
</tr>
    <tr class="table-warning">
     <th>Gender</th>
    <td><?php  echo $row->Gender;?></td>
    <th>Book ID</th>
    <td><?php  echo $row->BookId;?></td>
    </tr>
    <tr class="table-danger">
    <th>Book Name</th>
    <td><?php  echo $row->BookName;?></td>
    <th>Book Author Name</th>
    <td><?php  echo $row->BookAuthorName;?></td>
  </tr>
  <tr class="table-success">
    <th>Borrow Date</th>
    <td><?php  echo $row->Borrowdate;?></td>
    <th>Due Date</th>
    <td><?php  echo $row->Duedate;?></td>
  </tr>
  
  <?php $cnt=$cnt+1;}} ?>
</table>
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
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>