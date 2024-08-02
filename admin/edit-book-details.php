<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    $stuname=$_POST['stuname'];
    $stuclass=$_POST['stuclass'];
    $gender=$_POST['gender'];
    $stuid=$_POST['stuid'];
    $stubranch=$_POST['stubranch'];
    $bookid=$_POST['bookid'];
    $bookname=$_POST['bookname'];
    $bookauthor=$_POST['bookauthor'];
 $eid=$_GET['editid'];
$sql="update tblbook set StudentName=:stuname,StudentClass=:stuclass,Gender=:gender,StuID=:stuid,StudentBranch=:stubranch,BookID=:bookid,BookName=:bookname,BookAuthorName=:bookauthor where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
$query->bindParam(':stuclass',$stuclass,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->bindParam(':stubranch',$stubranch,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
$query->bindParam(':bookauthor',$bookauthor,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
  echo '<script>alert("Book has been updated")</script>';
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Update Book Details</title>
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
              <h3 class="page-title"> Update Book Details </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Book Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Book Details</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php
$eid=$_GET['editid'];
$sql="SELECT tblbook.StudentName,tblbook.StudentClass,tblbook.Gender,tblbook.StuID,tblbook.StudentBranch,tblbook.BookID,tblbook.BookName,tblbook.BookAuthorName,tblclass.ClassName,tblclass.Section from tblbook join tblclass on tblclass.ID=tblbook.StudentClass where tblbook.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                      <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Student Name</label>
                        <input type="text" name="stuname" value="<?php  echo htmlentities($row->StudentName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">USN</label>
                        <input type="text" name="stuid" value="<?php  echo htmlentities($row->StuID);?>" class="form-control" readonly='true'>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Branch</label>
                        <select name="stubranch" value="" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->StudentBranch);?>"><?php  echo htmlentities($row->StudentBranch);?></option>
                          <option value="CSE">CSE</option>
                          <option value="CIVIL">CIVIL</option>
                          <option value="EEE">EEE</option>
                          <option value="ECE">ECE</option>
                          <option value="ME">ME</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail3">Semester</label>
                        <select  name="stuclass" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->StudentClass);?>"><?php  echo htmlentities($row->ClassName);?> <?php  echo htmlentities($row->Section);?></option>
                         <?php 

$sql2 = "SELECT * from    tblclass ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ClassName);?><?php echo htmlentities($row1->Section);?>"><?php echo htmlentities($row1->ClassName);?> <?php echo htmlentities($row1->Section);?></option>
 <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Gender</label>
                        <select name="gender" value="" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->Gender);?>"><?php  echo htmlentities($row->Gender);?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Female">TransGender</option>
                        </select>
                      </div>
                    
                     
                      <div class="form-group col-md-6">
                      <label for="exampleInputName1">Book ID</label>
                        <input type="text" name="bookid" value="<?php  echo htmlentities($row->BookID);?>" class="form-control" required='true'>
                      </div>
                     
                      
                      
                      <!-- <h3>Parents/Guardian's details</h3> -->
                      <div class="form-group col-md-6">
                      <label for="exampleInputName1">Book Name</label>
                        <input type="text" name="bookname" value="<?php  echo htmlentities($row->BookName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-6">
                      <label for="exampleInputName1">Book Author Name</label>
                        <input type="text" name="bookauthor" value="<?php  echo htmlentities($row->BookAuthorName);?>" class="form-control" required='true'>
                      </div>
                      <!-- <div class="form-group col-md-6">
                      <label for="exampleInputName1">Borrow Date</label>
                        <input type="date" name="borrowdate" value="<?php  echo htmlentities($row->Borrowdate);?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Due Date</label>
                        <input type="date" name="duedate" value="<?php  echo htmlentities($row->Duedate);?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div> -->
                      <?php $cnt=$cnt+1;}} ?>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
</div>
                    </form>
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