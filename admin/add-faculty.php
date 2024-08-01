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
 $facgender=$_POST['facgender'];
 $facdob=$_POST['facdob'];
 $facid=$_POST['facid'];
 $facconnum=$_POST['facconnum'];
 $facaltconnum=$_POST['facaltconnum'];
 $facaddress=$_POST['facaddress'];
 $facuname=$_POST['facuname'];
 $facpassword=md5($_POST['facpassword']);
 $facimage=$_FILES["facimage"]["name"];
 $ret="select UserName from tblfaculty where UserName=:facuname || FacultyID=:facid";
 $query= $dbh -> prepare($ret);
$query->bindParam(':facuname',$uname,PDO::PARAM_STR);
$query->bindParam(':facid',$facid,PDO::PARAM_STR);
$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$extension = substr($facimage,strlen($facimage)-4,strlen($facimage));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$facimage=md5($facimage).time().$extension;
 move_uploaded_file($_FILES["facimage"]["tmp_name"],"images/".$facimage);
$sql="insert into tblfaculty(FacultyName,FacultyEmail,Branch, Gender,DOB,FacultyID,
ContactNumber,AlternateNumber,Address,UserName,Password,Image)values(:facname,:facemail,:facbranch,:facgender,:facdob,:facid,
:facconnum,:facaltconnum,:facaddress,:facuname,:facpassword,:facimage)";
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
$query->bindParam(':facuname',$facuname,PDO::PARAM_STR);
$query->bindParam(':facpassword',$facpassword,PDO::PARAM_STR);
$query->bindParam(':facimage',$facimage,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Faculty has been added.")</script>';
echo "<script>window.location.href ='add-faculty.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}}

else
{

echo "<script>alert('Username or Faculty Id  already exist. Please try again');</script>";
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Add Faculty</title>
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
    <style>
    .mandatory {
  color: red;
}

</style>
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
              <h3 class="page-title"> Add Faculty </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Faculty </li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Faculty</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="row">
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty Name<span class="mandatory">*</span></label>
                        <input type="text" name="facname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty Email<span class="mandatory">*</span></label>
                        <input type="text" name="facemail" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputEmail3">Branch<span class="mandatory">*</span></label>
                        <select  name="facbranch" class="form-control" required='true'>
                          <option value="">Select Branch</option>
                          <option value="CSE">CSE</option>
                          <option value="CIVIL">CIVIL</option>
                          <option value="EEE">EEE</option>
                          <option value="ECE">ECE</option>
                          <option value="ME">ME</option>
                  
 
                        </select>
                      </div>
                
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Gender<span class="mandatory">*</span></label>
                        <select name="facgender" value="" class="form-control" required='true'>
                          <option value="">Choose Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Female">TransGender</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Date of Birth<span class="mandatory">*</span></label>
                        <input type="date" name="facdob" value="" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty ID<span class="mandatory">*</span></label>
                        <input type="text" name="facid" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Faculty Photo<span class="mandatory">*</span></label>
                        <input type="file" name="facimage" value="" class="form-control" required='true'>
                      </div>
                <!--      <legend>Parents/Guardian's details</legend>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Father's Name</label>
                        <input type="text" name="fname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Mother's Name</label>
                        <input type="text" name="mname" value="" class="form-control" required='true'>
                      </div>-->
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Contact Number<span class="mandatory">*</span></label>
                        <input type="text" name="facconnum" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Alternate Number</label>
                        <input type="text" name="facaltconnum" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Address<span class="mandatory">*</span></label>
                        <textarea name="facaddress" class="form-control" required='true'></textarea>
                      </div>
<legend>Login details</legend>
<div class="form-group col-md-6">
                        <label for="exampleInputName1">User Name<span class="mandatory">*</span></label>
                        <input type="text" name="facuname" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputName1">Password<span class="mandatory">*</span></label>
                        <input type="Password" name="facpassword" value="" class="form-control" required='true'>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
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