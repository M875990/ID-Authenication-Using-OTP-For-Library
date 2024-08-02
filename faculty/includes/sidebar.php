<link rel='stylesheet' href="css/style3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <!-- <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image"> -->
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <?php
         $uid= $_SESSION['sturecmsuid'];
$sql="SELECT * from tblfaculty where ID=:uid";

$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <p class="profile-name"><?php  echo htmlentities($row->FacultyName);?></p>
                  <p class="designation"><?php  echo htmlentities($row->FacultyEmail);?></p><?php $cnt=$cnt+1;}} ?>
                </div>
             
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">OTP Verification</span>
                <i class="fas fa-key menu-icon"></i>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="book-details.php">
                <span class="menu-title">Book Details</span>
                <i class="fas fa-book-open menu-icon"></i>
              </a>
            </li>
       <!--     <li class="nav-item">
              <a class="nav-link" href="view-notice.php">
                <span class="menu-title">View Notice</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>-->
          </ul>
        </nav>