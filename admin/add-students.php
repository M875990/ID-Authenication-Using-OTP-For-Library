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
 $stuemail=$_POST['stuemail'];
 $stubranch=$_POST['stubranch'];
 $stuclass=$_POST['stuclass'];
 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $stuid=$_POST['stuid'];
 #$fname=$_POST['fname'];
 #$mname=$_POST['mname'];
 $connum=$_POST['connum'];
 $altconnum=$_POST['altconnum'];
 $address=$_POST['address'];
 $uname=$_POST['uname'];
 $password=md5($_POST['password']);
 $image=$_FILES["image"]["name"];
 $ret="select UserName from tblstudent where UserName=:uname || StuID=:stuid";
 $query= $dbh -> prepare($ret);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$extension = substr($image,strlen($image)-4,strlen($image));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$image=md5($image).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$image);
$sql="insert into tblstudent(StudentName,StudentEmail, Studentbranch,StudentClass,Gender,DOB,StuID,
ContactNumber,AltenateNumber,Address,UserName,Password,Image)values(:stuname,:stuemail,:stubranch,:stuclass,:gender,:dob,:stuid,
:connum,:altconnum,:address,:uname,:password,:image)";
$query=$dbh->prepare($sql);
$query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
$query->bindParam(':stuemail',$stuemail,PDO::PARAM_STR);
$query->bindParam(':stubranch',$stubranch,PDO::PARAM_STR);
$query->bindParam(':stuclass',$stuclass,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
#$query->bindParam(':fname',$fname,PDO::PARAM_STR);
#$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':connum',$connum,PDO::PARAM_STR);
$query->bindParam(':altconnum',$altconnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':image',$image,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Student has been added.")</script>';
echo "<script>window.location.href ='add-students.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}}

else
{

echo "<script>alert('Username or Student Id  already exist. Please try again');</script>";
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Add Students</title>
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
              <h3 class="page-title"> Add Students </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Students</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="row">
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Student Name<span class="mandatory">*</span></label>
                        <input type="text" name="stuname" value="" class="form-control" required='true' pattern="[A-Za-z ]+">
                        <!-- <small class="form-text text-muted">Please enter only letters for the student name</small> -->
                      </div>
                      <div class="form-group col-md-3">
  <label for="exampleInputName1">Student Email<span class="mandatory">*</span></label>
  <input type="text" name="stuemail" value="" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" required>
  <!-- <small class="form-text text-muted">Please enter a valid email address or Gmail address</small> -->
</div>

                      <div class="form-group col-md-3">
                        <label for="exampleInputEmail3">Branch<span class="mandatory">*</span></label>
                        <select  name="stubranch" class="form-control" required='true'>
                          <option value="">Select Branch</option>
                          <option value="CSE">CSE</option>
                          <option value="CIVIL">CIVIL</option>
                          <option value="EEE">EEE</option>
                          <option value="ECE">ECE</option>
                          <option value="ME">ME</option>
                  
 
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputEmail3">Semester<span class="mandatory">*</span></label>
                        <select  name="stuclass" class="form-control" required='true'>
                          <option value="">Select Semester</option>
                         <?php 

$sql2 = "SELECT * from    tblclass ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ID);?>"><?php echo htmlentities($row1->ClassName);?> <?php echo htmlentities($row1->Section);?></option>
 <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Gender<span class="mandatory">*</span></label>
                        <select name="gender" value="" class="form-control" required='true'>
                          <option value="">Choose Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="TransGender">TransGender</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
  <label for="exampleInputName1">Date of Birth<span class="mandatory">*</span></label>
  <input type="date" name="dob" id="dob" value="" class="form-control" required>
  <div id="dob-error" class="text-danger"></div>
</div>

<script>
  // Get the current date
  var currentDate = new Date();
  // Set the minimum allowed date to 100 years ago from the current date
  var minDate = new Date(currentDate.getFullYear() - 100, currentDate.getMonth(), currentDate.getDate());
  // Set the maximum allowed date to 18 years ago from the current date
  var maxDate = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());

  // Validate the Date of Birth field on form submit
  document.querySelector('form').addEventListener('submit', function(e) {
    var dobInput = document.getElementById('dob');
    var dob = new Date(dobInput.value);
    if (dob < minDate || dob > maxDate) {
      e.preventDefault(); // Prevent form submission
      document.getElementById('dob-error').textContent = 'Please enter a valid Date of Birth (age must be between 18 and 100 years)';
    }
  });

  // Clear the error message on Date of Birth field change
  document.getElementById('dob').addEventListener('change', function() {
    document.getElementById('dob-error').textContent = '';
  });
</script>

                     
                      <div class="form-group col-md-3">
  <label for="exampleInputName1">USN<span class="mandatory">*</span></label>
  <input type="text" name="stuid" value="" class="form-control" pattern="[0-9][A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}" required maxlength="10">
  <!-- <small class="form-text text-muted">Please enter a valid USN in the format 4HG19CS018 (10 characters maximum)</small> -->
</div>


<script>
  var usnInput = document.getElementById("stuid");
  usnInput.addEventListener("input", function() {
    var value = usnInput.value.toUpperCase();
    if (value.length >= 2) {
      value = value.slice(0, 2) + "HG" + value.slice(2);
    }
    if (value.length >= 4) {
      value = value.slice(0, 4) + "CS" + value.slice(4);
    }
    usnInput.value = value;
  });
</script>

                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Student Photo<span class="mandatory">*</span></label>
                        <input type="file" name="image" value="" class="form-control" required='true'>
                      </div>
              
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Contact Number<span class="mandatory">*</span></label>
                        <input type="text" name="connum" value="" class="form-control" required='true' required maxlength="10" pattern="[1-9][0-9]*">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Alternate Contact Number</label>
                        <input type="text" name="altconnum" value="" class="form-control"  required maxlength="10" pattern="[1-9][0-9]*">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputName1">Address<span class="mandatory">*</span></label>
                        <textarea name="address" class="form-control" required='true'></textarea>
                      </div>
                    <legend>Login details</legend>
                   <div class="form-group col-md-6">
                        <label for="exampleInputName1">User Name<span class="mandatory">*</span></label>
                        <input type="text" name="uname" value="" class="form-control" required='true' pattern="[0-9][A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}" required maxlength="10">
                      </div>
                      <div class="form-group col-md-6">
  <label for="exampleInputName1">Password<span class="mandatory">*</span></label>
  <input type="password" name="password" class="form-control" pattern="^(?=.*?[A-Z])[A-Za-z0-9@#$%^&*()_+={}|\\`\\-\\[\\]\\:\;'<>,.?/~!]+{6,8}$"  required minilength="6" maxlength="8">
  <div id="password-error" class="text-danger"></div>
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