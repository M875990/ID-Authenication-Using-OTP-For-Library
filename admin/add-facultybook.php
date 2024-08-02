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
 $facgender=$_POST['facgender'];
 $facid=$_POST['facid'];
 $facbranch=$_POST['facbranch'];
 $facbookid=$_POST['facbookid'];
 $facbookname=$_POST['facbookname'];
 $facbookauthor=$_POST['facbookauthor'];
 $facconnum=$_POST['facconnum'];
 $sql="insert into tblfacultybook(FacultyName,Gender,FacultyID,Branch,BookId,BookName,BookAuthorName,ContactNumber)
 values(:facname,:facgender,:facid,:facbranch,:facbookid,:facbookname,:facbookauthor,:facconnum)";
$query=$dbh->prepare($sql);
$query->bindParam(':facname',$facname,PDO::PARAM_STR);
$query->bindParam(':facgender',$facgender,PDO::PARAM_STR);
$query->bindParam(':facid',$facid,PDO::PARAM_STR);
$query->bindParam(':facbranch',$facbranch,PDO::PARAM_STR);
$query->bindParam(':facbookid',$facbookid,PDO::PARAM_STR);
$query->bindParam(':facbookname',$facbookname,PDO::PARAM_STR);
$query->bindParam(':facbookauthor',$facbookauthor,PDO::PARAM_STR);
$query->bindParam(':facconnum',$facconnum,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Book has been added.")</script>';
echo "<script>window.location.href ='add-facultybook.php'</script>";
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
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
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
  button {
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
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
              <h3 class="page-title">Faculty Book Details </h3>
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
                    <form  action="" method="GET">
    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputName1">Faculty ID</label>
            <input type="text" name="FacId" value="<?php if(isset($_GET['FacId'])){echo $_GET['FacId'];} ?>" class="form-control">
        </div>
       
        <div class="form-group col-md-5">
            <label for="exampleInputName1">Book ID</label>
            <input type="text" name="BookID" value="<?php if(isset($_GET['BookID'])){echo $_GET['BookID'];} ?>" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-primary" style=" margin-bottom: 10px 16px;">GET DATA</button>
        </div>
    </div>
</form>
<form class="forms-sample" method="post" enctype="multipart/form-data">
<div class="row">
    <hr>
    <?php 
    $con = mysqli_connect("localhost","root","","studentmsdb");

    if(isset($_GET['FacId']))
    {
        $FacId = $_GET['FacId'];
        $query = "SELECT * FROM tblfaculty WHERE FacultyID='$FacId' ";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            $found = false;
            foreach($query_run as $row)
            {
                $found = true;
                ?>
                   
                      <!-- <div class="row"> -->
                <div class="form-group col-md-6">
                    <label for="exampleInputName1">faculty Name</label>
                    <input type="text" name="facname" value="<?= $row['FacultyName']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputName1">Faculty ID</label>
                    <input type="text" name="facid" value="<?= $row['FacultyID']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputName1">Branch</label>
                    <input type="text" name="facbranch" value="<?= $row['Branch']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail3">Gender</label>
                    <input type="text" name="facgender" value="<?= $row['Gender']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail3">ContactNumber</label>
                    <input type="text" name="facconnum" value="<?= $row['ContactNumber']; ?>" class="form-control" id="mob" required='true' maxlength="10" pattern="[1-9][0-9]*" readonly='true'>
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
                <div class="form-group col-md-6">
                    <label for="exampleInputName1">Book ID</label>
                    <input type="text" name="facbookid" value="<?= $row['BookID']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputName1">Book Name</label>
                    <input type="text" name="facbookname" value="<?= $row['BookName']; ?>" class="form-control" readonly='true'>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputName1">BookAuthor Name</label>
                    <input type="text" name="facbookauthor" value="<?= $row['BookauthorName']; ?>" class="form-control" readonly='true'>
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

			  <!-- <button type="button" id="sendotp"  class="btn btn-primary">Send OTP</button> -->
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

					var timer2 = "00:31";
					var interval = setInterval(function() {


					  var timer = timer2.split(':');
					  //by parsing integer, I avoid all extra string processing
					  var minutes = parseInt(timer[0], 10);
					  var seconds = parseInt(timer[1], 10);
					  --seconds;
					  minutes = (seconds < 0) ? --minutes : minutes;
					  
					  seconds = (seconds < 0) ? 59 : seconds;
					  seconds = (seconds < 10) ? '0' + seconds : seconds;
					  //minutes = (minutes < 10) ?  minutes : minutes;
					  $('.countdown').html("Resend otp in:  <b class='text-primary'>"+ minutes + ':' + seconds + " seconds </b>");
					  //if (minutes < 0) clearInterval(interval);
					  if ((seconds <= 0) && (minutes <= 0)){
					  	clearInterval(interval);
					  	$('.countdown').html('');
					  	$('#resend_otp').css("display","block");
					  } 
					  timer2 = minutes + ':' + seconds;
					}, 1000);

				}

				//end of timer


			});
		</script>
  </body>
</html><?php }  ?>