<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $facname=$_POST['facname'];
 $facemail=$_POST['facemail'];
 $facbranch=$_POST['facbranch'];
 #$facclass=$_POST['facclass'];
 $facgender=$_POST['facgender'];
 $facdob=$_POST['facdob'];
 $facid=$_POST['facid'];
 #$fname=$_POST['fname'];
 #$mname=$_POST['mname'];
 $facconnum=$_POST['facconnum'];
 $facaltconnum=$_POST['facaltconnum'];
 $facaddress=$_POST['facaddress'];
 $eid=$_GET['editid'];
$sql="update tblfaculty set FacultyName=:facname,FacultyEmail=:facemail,Branch=:facbranch,Gender=:facgender,DOB=:facdob,FacultyID=:facid,ContactNumber=:facconnum,AlternateNumber=:facaltconnum,Address=:facaddress where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':facname',$facname,PDO::PARAM_STR);
$query->bindParam(':facemail',$facemail,PDO::PARAM_STR);
$query->bindParam(':facbranch',$facbranch,PDO::PARAM_STR);
#$query->bindParam(':facclass',$facclass,PDO::PARAM_STR);
$query->bindParam(':facgender',$facgender,PDO::PARAM_STR);
$query->bindParam(':facdob',$facdob,PDO::PARAM_STR);
$query->bindParam(':facid',$facid,PDO::PARAM_STR);
#$query->bindParam(':fname',$fname,PDO::PARAM_STR);
#$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':facconnum',$facconnum,PDO::PARAM_STR);
$query->bindParam(':facaltconnum',$facaltconnum,PDO::PARAM_STR);
$query->bindParam(':facaddress',$facaddress,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
  echo '<script>alert("Faculty has been updated")</script>';
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Update Facultys</title>
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
              <h3 class="page-title"> Update Facultys </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Facultys</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Facultys</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php
$eid=$_GET['editid'];
$sql="SELECT tblfaculty.FacultyName,tblfaculty.FacultyEmail,tblfaculty.Branch,tblfaculty.Gender,tblfaculty.DOB,tblfaculty.FacultyID,tblfaculty.ContactNumber,tblfaculty.AlternateNumber,tblfaculty.Address,tblfaculty.UserName,tblfaculty.Password,tblfaculty.Image,tblfaculty.registrationDate FROM tblfaculty where tblfaculty.ID=:eid";
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
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty Name</label>
                        <input type="text" name="facname" value="<?php  echo htmlentities($row->FacultyName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty Email</label>
                        <input type="text" name="facemail" value="<?php  echo htmlentities($row->FacultyEmail);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Branch</label>
                        <select name="facbranch" value="" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->Branch);?>"><?php  echo htmlentities($row->Branch);?></option>
                          <option value="CSE">CSE</option>
                          <option value="CIVIL">CIVIL</option>
                          <option value="EEE">EEE</option>
                          <option value="ECE">ECE</option>
                          <option value="ME">ME</option>
                        </select>
                      </div>
                     
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Gender</label>
                        <select name="facgender" value="" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->Gender);?>"><?php  echo htmlentities($row->Gender);?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="TransGender">TransGender</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input type="date" name="facdob" value="<?php  echo htmlentities($row->DOB);?>" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty ID</label>
                        <input type="text" name="facid" value="<?php  echo htmlentities($row->FacultyID);?>" class="form-control" readonly='true' maxlength='10' pattern="[a-zA-Z0-9]">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty Photo</label>
                        <img src="images/<?php echo $row->Image;?>" width="100" height="100" value="<?php  echo $row->Image;?>"><a href="changeimage.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
                      </div>
                     
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Contact Number</label>
                        <input type="text" name="facconnum" value="<?php  echo htmlentities($row->ContactNumber);?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Alternate Contact Number</label>
                        <input type="text" name="facaltconnum" value="<?php  echo htmlentities($row->AlternateNumber);?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Address</label>
                        <textarea name="facaddress" class="form-control" required='true'><?php  echo htmlentities($row->Address);?></textarea>
                      </div>
                    <legend>Login details</legend>
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" name="facuname" value="<?php  echo htmlentities($row->UserName);?>" class="form-control" readonly='true'>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Password</label>
                        <input type="Password" name="facpassword" value="<?php  echo htmlentities($row->Password);?>" class="form-control" readonly='true'>
                      </div><?php $cnt=$cnt+1;}} ?>
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