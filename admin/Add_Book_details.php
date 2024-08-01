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
 $connum=$_POST['connum'];
 $bookid=$_POST['bookid'];
 $bookname=$_POST['bookname'];
 $bookauthor=$_POST['bookauthor'];
 $sql="insert into tblbook(StudentName,StudentClass,Gender,StuID,StudentBranch,ContactNumber,BookID,BookName,BookAuthorName)
 values(:stuname,:stuclass,:gender,:stuid,:stubranch,:connum,:bookid,:bookname,:bookauthor)";
$query=$dbh->prepare($sql);
$query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
$query->bindParam(':stuclass',$stuclass,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->bindParam(':stubranch',$stubranch,PDO::PARAM_STR);
$query->bindParam(':connum',$connum,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
$query->bindParam(':bookauthor',$bookauthor,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Book has been added.")</script>';
echo "<script>window.location.href ='Add_Book_details.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  }

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Book Details</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style type="text/css">
	#otpdiv{

		display: none;
	}
	#verifyotp{

		display: none;
	}
	#resend_otp{
		display: none;
	}

	.countdown{
		display: table;
		width: 100%;
		text-align: left;
		font-size: 15px;

	}

	#resend_otp:hover{

		text-decoration:underline;
		

	}
  label::after {
  content: "*";
  color: red; /* Customize the color as needed */
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
              <h3 class="page-title">Student Book Details </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Book Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Book Details</h4>
                    <!-- <form class="forms-sample" method="post" enctype="multipart/form-data">   -->
                      <div class="container">
    <form  action="" method="GET">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="exampleInputName1">USN</label>
            <input type="text" name="StuId" value="<?php if(isset($_GET['StuId'])){echo $_GET['StuId'];} ?>" class="form-control" pattern="[0-9][A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}" required maxlength="10">
        </div>
       
        <div class="form-group col-md-6">
          <label for="exampleInputName1">Book ID</label>
          <input type="text" name="BookID" value="<?php if(isset($_GET['BookID'])){echo $_GET['BookID'];} ?>" class="form-control" pattern="[A-Za-z0-9]+" title="Please enter a valid Book ID (alphanumeric characters only)">
        </div>

        <div>
        <button type="submit" class="btn btn-primary">GET DATA</button>

        </div>
    </div>
</form>
</div>
<form class="forms-sample" method="post" enctype="multipart/form-data">
<div class="row">
    <hr>
    <?php 
    $con = mysqli_connect("localhost","root","Madhu@123","studentmsdb");

    if(isset($_GET['StuId']))
    {
        $StuId = $_GET['StuId'];
        $query = "SELECT * FROM tblstudent WHERE StuID='$StuId' ";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            $found = false;
            foreach($query_run as $row)
            {
                $found = true;
                ?>
                   
                      <!-- <div class="row"> -->
                <div class="form-group col-md-4">
                    <label for="exampleInputName1">Student Name</label>
                    <input type="text" name="stuname" value="<?= $row['StudentName']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputName1">USN</label>
                    <input type="text" name="stuid" value="<?= $row['StuID']; ?>" class="form-control" readonly='true' >
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputName1">Branch</label>
                    <input type="text" name="stubranch" value="<?= $row['StudentBranch']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail3">Semester</label>
                    <input type="text" name="stuclass" value="<?= $row['StudentClass']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail3">Gender</label>
                    <input type="text" name="gender" value="<?= $row['Gender']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail3">ContactNumber</label>
                    <input type="text" name="connum" value="<?= $row['ContactNumber']; ?>" class="form-control" id="mob" required='true' maxlength="10" pattern="[1-9][0-9]*" readonly='true'>
                </div>
                <?php
            }
            if (!$found) {
                echo "No Record Found";
            }
        }
    }
    ?>
    <?php 
    if(isset($_GET['BookID']))
    {
        $BookID = $_GET['BookID'];
        $query = "SELECT * FROM tblbookdetails WHERE BookID='$BookID' ";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            $found = false;
            foreach($query_run as $row)
            {
                $found = true;
                ?>
                <div class="form-group col-md-4">
                    <label for="exampleInputName1">Book ID</label>
                    <input type="text" name="bookid" value="<?= $row['BookID']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputName1">Book Name</label>
                    <input type="text" name="bookname" value="<?= $row['BookName']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-4">
                    <label for="exampleInputName1">BookAuthor Name</label>
                    <input type="text" name="bookauthor" value="<?= $row['BookauthorName']; ?>" class="form-control" readonly='true'>
                </div>
                <button type="button" id="sendotp"  class="btn btn-primary">Send OTP</button>
                <?php
            }
            if (!$found) {
                echo "No Record Found";
            }
        }
    }
    ?>
</div>
          <div class="otp_msg"></div>
          <div class="form-group col-md-12" id="otpdiv">
          <h4 class="text-danger text-center">OTP VERIFICATION</h4>
			    <label for="otp verification">Enter OTP</label>
			    <input type="text" class="form-control" id="otp" placeholder="Enter OTP">
			    <br>
			    <div class="countdown"></div>
				<a href="#" id="resend_otp" type="button">Resend</a>

			  </div>

        <button type="submit" id="verifyotp" class="btn btn-primary" name="submit" >ISSUE BOOK</button>

			 

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
    <script src=script.js></script>
    <!-- End custom js for this page -->
    <script type="text/javascript">
			
			$(document).ready(function(){


				function validate_mobile(mob){

					var pattern =  /^[6-9]\d{9}$/;

					if (mob == '') {

						return false;
					}else if (!pattern.test(mob)) {

						return false;
					}else{

						return true;
					}
				}


				//send otp function
				function send_otp(mob){

						var ch = "send_otp";
							
							$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {mob:mob,ch:ch},
							dataType: "text",
							success: function(data){

								if (data == 'success') {

									$('#otpdiv').css("display","block");
									$('#sendotp').css("display","none");
									$('#verifyotp').css("display","block");
									
										timer();
									$('.otp_msg').html('<div class="alert alert-success">OTP sent successfully</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
										

								}else{

									$('.otp_msg').html('<div class="alert alert-danger">Error in sending OTP</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
								
								}
							}

						});
				}
				//end of send otp function

        //store otp function
        
function store_otp(stid, mob, otp){
    var ch = "store_otp";
    $.ajax({
        url: "otp_process.php",
        method: "post",
        data: {stid:stid, mob:mob, otp:otp, ch:ch},
        dataType: "text",
        success: function(data){
            console.log(data); //debugging purposes
        }
    });
}
<?php
    include_once 'db_connection.php';

    if(isset($_POST['ch'])){

        $ch = $_POST['ch'];

        switch($ch){

            case 'send_otp':

                $mob = $_POST['mob'];

                // Your code to send OTP to mobile number $mob goes here
                // ...

                echo 'success';

                break;

            case 'store_otp':
                $stid = $_POST['stid'];
                $mob = $_POST['mob'];
                $otp = $_POST['otp'];

                $sql = "INSERT INTO tblotp (StuID, ContactNumber, Otp) VALUES ('$stid', '$mob', '$otp')";

                if(mysqli_query($conn, $sql)){
                    echo 'OTP stored in database';
                } else {
                    echo 'Error storing OTP in database';
                }

                break;
        }
    }
?>


				//send otp function

				$('#sendotp').click(function(){

					var mob = $('#mob').val();

					

						if (validate_mobile(mob) == false) $('.otp_msg').html('<div class="alert alert-danger">Enter Valid mobile number</div>').fadeIn(); else 	send_otp(mob);

						window.setTimeout(function(){
							$('.otp_msg').fadeOut();
						},1000)
						
				
					    	
		

					});

				//end of send otp function


				//resend otp function
				$('#resend_otp').click(function(){

					var mob = $('#mob').val();
					
					send_otp(mob);
						$(this).hide();
				});
				//end of resend otp function


			//verify otp function starts

			$('#verifyotp').click(function(){

						
						var ch = "verify_otp";
						var otp = $('#otp').val();

						$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {otp:otp,ch:ch},
							dataType: "text",
							success: function(data){

									if (data == "success") {

										$('.otp_msg').html('<div class="alert alert-success">OTP Verified successfully</div>').show().fadeOut(4000);
																				
									}else{

										$('.otp_msg').html('<div class="alert alert-danger">otp did not match</div>').show().fadeOut(4000);
									}
							}
						});
								

				});

			//end of verify otp function


			//start of timer function
      function timer(){
  var timer2 = 30;
  var interval = setInterval(function() {
    var seconds = timer2;
    --seconds;
    if (seconds <= 0){
      clearInterval(interval);
      $('.countdown').html('');
      $('#resend_otp').css("display","block");
    } 
    else {
      $('.countdown').html("Resend otp in:  <b class='text-primary'>"+ seconds + " seconds </b>");
      timer2 = seconds;
    }
  }, 1000);
}

				//end of timer


			});
		</script>
  </body>
</html><?php }  ?>