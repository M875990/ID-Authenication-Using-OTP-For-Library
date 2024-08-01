<!--footer-->
<div class="footer">
    <!-- container -->
    <div class="container">
      <div class="col-md-6 footer-left">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="admin/login.php">Admin</a></li>
          <li><a href="faculty/login.php">Faculty</a></li>
          <li><a href="user/login.php">Student</a></li>
        </ul>
       
      </div>
      <div class="col-md-3 footer-middle">
        <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
        <h3>Address</h3>
        <div class="address">
        <a href="https://www.google.com/maps/place/Government+Engineering+college+Mosalehosalli/@12.883897,76.166888,15z/data=!4m6!3m5!1s0x3ba541118b53bce3:0xfce268fbdd872cb!8m2!3d12.8838973!4d76.1668882!16s%2Fg%2F11n09w0jcq?hl=en">  <p ><?php  echo htmlentities($row->PageDescription);?>
          </p></a>
        </div>
        <div class="phone">
          <p><?php  echo htmlentities($row->MobileNumber);?></p>
        </div>
      <?php $cnt=$cnt+1;}} ?></div>
   <!--   <div class="col-md-3 footer-right">
        <h3>ID AUTHENICATION USING OTP FOR LIBRARY </h3>
        <p>Proin eget ipsum ultrices, aliquet velit eget, tempus tortor. Phasellus 
          non velit sit amet diam faucibus molestie tincidunt efficitur nisi.</p>
      </div>-->
      <div class="clearfix"> </div> 
    </div>
    <!-- //container -->
  </div>
<!--/footer-->
<!--

<div class="copyright">
   
    <div class="container">
      <div class="copyright-left">
      <p>© <?php echo date('Y');?> Student Management System </p>
      </div>
      <div class="copyright-right">
        <ul>
          <li><a href="#" class="twitter"> </a></li>
          <li><a href="#" class="twitter facebook"> </a></li>
          <li><a href="#" class="twitter chrome"> </a></li>
          <li><a href="#" class="twitter pinterest"> </a></li>
          <li><a href="#" class="twitter linkedin"> </a></li>
          <li><a href="#" class="twitter dribbble"> </a></li>
        </ul>
      </div>
      <div class="clearfix"> </div>
      
    </div>
    <!-- //container -->
    <!---->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        */
    $().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<!--s<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a> --> 
  </div>