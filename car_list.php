 <?php
	 session_start();
$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

		if(isset($_SESSION['authuser']))
				{
		
$items=0;
$user=$_SESSION['authuser'];
$userquery="SELECT id,email FROM user where name='$user'";
$u=mysqli_query($conn,$userquery);
$userfetch=mysqli_fetch_assoc($u);
$cust_id=$userfetch['id'];

	$qu = "SELECT carid FROM cart_car where custid=$cust_id";
$res2 = mysqli_query($conn, $qu);
$rnum=mysqli_num_rows($res2);
	$qur = "SELECT roomid FROM cart_room where custid=$cust_id";
$res4 = mysqli_query($conn, $qur);
$hnum=mysqli_num_rows($res4);
if($rnum>0 && $hnum>0)
{
	$items=$rnum+$hnum;
}
else if($rnum>0)
{
	$items=$rnum;
}
else if($hnum>0)
{
	$items=$hnum;
}
else
{
	$items=0;
}
				}
?>
<!doctype html>
<html lang="en">
<head>
    <title>GR Travels</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
<style>
.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
}

body {
    line-height: 1.7;
    color: #364d59 !important;
    font-weight: 300;
  
}
body {
    margin: 0;
    font-family: "DM Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1.1rem;
    font-weight: 400;
    line-height: 1.7;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
.bg-light{
	background-color:#f6f5f5;
}
.site-section{
	padding:7em 0;
}
.item-1 .item-1-contents {
    padding: 20px;
    background: #fff;
}
.text-center {
    text-align: center!important;
}
.item-1 .item-1-contents h3 {
    font-size: 22px;
}
h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5 {
    font-weight: 500;
    color: #364d59;
	
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}
.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}
*, :after, :before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
a {
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    text-decoration: none;
}
.img-fluid {
    max-width: 100%;
    height: 250px;
}
img {
    vertical-align: middle;
    border-style: none;
}
.item-1 .item-1-contents .rent-price > span {
    font-size: 1.5rem;
}
.item-1 .item-1-contents ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
dl, ol, ul {
    margin-top: 0;
    margin-bottom: 1rem;
}
.item-1 .item-1-contents ul li {
    margin-bottom: 5px;
    padding-bottom: 5px;
    border-bottom: 1px solid #efefef;
    display: block;
    position: relative;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.item-1 .item-1-contents ul li .spec {
    position: absolute;
    right: 0;
}
.item-1 .item-1-contents ul li:last-child {
        border-bottom: none; }
.item-1 .item-1-contents .action {
    margin-top: 20px;
}
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
.container {
    width: 100%;
    padding-right: 10px;
    padding-left: 10px;
    margin-right: auto;
    margin-left: auto;
}
.col, .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col-auto, .col-lg, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-auto, .col-md, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md-auto, .col-sm, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-auto {
    position: relative;
    width: 100%;
    padding-right: 17px;
    padding-left: 17px;
}
footer {
    background-color: #121921;
    color: rgba(255,255,255,0.7);
	margin-top:30px;
	
}
article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
    display: block;
}
.margin_60_35 {
    padding-top: 60px;
    padding-bottom: 35px;
}
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.follow_us {
    margin-top: 15px;
    -webkit-animation-delay: 1.1s;
}
ul, ol {
    list-style: none;
    margin: 0 0 25px 0;
    padding: 0;
}
.follow_us ul li:first-child {
    color: #fff;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 2px;
    font-size: 0.8125rem;
}
.follow_us ul li {
    display: inline-block;
    margin-right: 10px;
	font-size: 1.25rem;
}
footer ul li {
    margin-bottom: 5px;
}
.follow_us ul li a {
    color: #fff;
    opacity: 0.7;
}
footer ul li a {
    transition: all 0.3s ease-in-out;
    display: inline-block;
    position: relative;
	color: #fff;
    opacity: 0.7;
}
a {
    text-decoration: none;
    outline: none;
}
footer h5 {
    color: #fff;
    margin: 25px 0;
    font-size: 1.125rem;
}
ul, ol {
    list-style: none;
    margin: 0 0 25px 0;
    padding: 0;
}
footer ul li a:hover{color:#fc5b62;opacity:1;}
footer ul li a i{margin-right:10px;color:#fff;}
footer ul.links li a:hover
{
	-webkit-transform:translate(5px, 0);
-moz-transform:translate(5px, 0);
-ms-transform:translate(5px, 0);
-o-transform:translate(5px, 0);
transform:translate(5px, 0);
}
footer ul.links li a:hover:after{opacity:1;color:#fc5b62;}
footer ul.links li a:after{
	font-family:'ElegantIcons';
	position:absolute;
	margin-left:5px;
	top:1px;
	opacity:0;
	-moz-transition:all 0.5s ease;-o-transition:all 0.5s ease;-webkit-transition:all 0.5s ease;-ms-transition:all 0.5s ease;transition:all 0.5s ease;
	}
footer ul.contacts li a i{margin-right:10px}
footer hr{opacity:0.1}
hr {
    margin: 30px 0 30px 0;
    border-color: #ededed;
}
footer #copy{text-align:right;font-size:13px;font-size:0.8125rem;opacity:0.7}
[class*=" ti-"], [class^=ti-] {
    font-family: themify;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
ul#footer-selector {
    margin: 0 0 0 0;
    padding: 0;
    list-style: none;
}
ul#additional_links {
    margin: 0;
    padding: 8px 0 0 0;
    color: #555;
  font-size: 1rem;
    float: right;
}
ul#additional_links li:first-child {
    margin-right: 20px;
}
ul#additional_links li {
    display: inline-block;
    margin-right: 15px;
}
ul#additional_links li a {
    color: #fff;
    opacity: 0.5;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
ul#additional_links li:after {
    content: "|";
    font-weight: 400;
    position: relative;
    left: 10px;
}
ul#additional_links li span {
    color: #fff;
    opacity: 0.5;
}
ul#additional_links li:last-child:after {
    content: "";
}
ul#additional_links li:after {
    content: "|";
    font-weight: 300;
    position: relative;
    left: 10px;
}

@media (min-width: 992px)
.col-lg-4 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 33.33333%;
    flex: 0 0 33.33333%;
    max-width: 33.33333%;
}
@media (min-width: 992px)
.container {
    max-width: 960px;
}
@media (min-width: 1200px)
.container {
    max-width: 1140px;
}
.site-section {
  padding: 2.5em 0; }
  @media (min-width: 768px) {
    .site-section {
      padding: 5em 0; } }
  .site-section.site-section-sm {
    padding: 4em 0; }

.site-footer {
  padding: 4em 0;
  background: #000; }
  @media (min-width: 768px) {
    .site-footer {
      padding: 8em 0; } }
  .site-footer .border-top {
    border-top: 1px solid rgba(255, 255, 255, 0.1) !important; }
  .site-footer p {
    color: #fff; }
  .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5 {
    color: #fff; }
  .site-footer a {
    color: rgba(255, 255, 255, 0.5); }
    .site-footer a:hover {
      color: white; }
  .site-footer ul li {
    margin-bottom: 10px; }
  .site-footer .footer-heading {
    font-size: 16px;
    color: #fff; }
@media (min-width: 768px)
.site-section {
    padding: 5em 0;
}
</style>
</head>
<body>

<section class="banner">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light custom_header navbar-toggler py-3">
        <a class="navbar-brand" href="#">GR Travels</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto my-lg-0 mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hotel_list.php">Hotels</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="car_list.php">Cars</a>
                </li>
				 <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>
              <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
        
                <?php
				if(isset($_SESSION['authuser']))
				{
					?>
					 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Account</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php" style="color:black!important;">Profile</a>
          <a class="dropdown-item" href="booking_history.php" style="color:black!important;">History</a>
          <a class="dropdown-item" href="logout.php" style="color:black!important;">Logout</a>
        </div>
      
                </li>
            	 <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" style="font-size:26px"></i><span class='badge badge-warning' id='lblCartCount'> <?php echo $items; ?> </span></a>
                </li>
            	
					<?php
				}
				else{
					
				?>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
				<?php
				}
				?>
				
				</ul>
        </div>
    </nav>

    <div class="owl-carousel owl-theme main_banner">
        <div class="item"><img height="550px" src="img/carlist.jpg" alt="" /></div>
    </div>

    <div class="search-sec bg-transparent d-none d-sm-block" style="top:40%;">
        <div class="container text-center tag_line">
            <h3>Car List</h3>
            <p>Explore top rated cars, hotels and bus in India</p>
        </div>
    </div>
</section>

<div class="site-section bg-light">
<div class="container">
<div class="row">
<?php
	$q = "SELECT carid,carname,image,description,seater,price,ACNONAC,luggage FROM car_list where isDeleted='N'";
$res = mysqli_query($conn, $q);
while($arr2 = mysqli_fetch_assoc($res))
{ 

?>
<div class="col-lg-4 col-md-6 mb-4">
<div class="item-1">
<a href="#"><img src="./uploads/<?php echo $arr2['image']; ?>" alt="Image" class="img-fluid"></a>
<div class="item-1-contents">
<div class="text-center">
<h3><a href="#"><?php echo $arr2['carname']; ?></a></h3>
<div class="rent-price"><span><?php echo $arr2['price']; ?>/</span>day</div>
</div>
<ul class="specs">
<li>
<span>AC/NON-AC</span>
<span class="spec"><?php echo $arr2['ACNONAC']; ?></span>
</li>
<li>
<span>Seats</span>
<span class="spec"><?php echo $arr2['seater']; ?></span>
</li>
<li>
<span>Lagguage</span>
<span class="spec"><?php echo $arr2['luggage']; ?></span>
</li>
<li>
<span>Minimum age</span>
<span class="spec">18 years</span>
</li>
</ul>
<div class="d-flex action">
<?php if(!isset($_SESSION['authuser']))
{
	
	 ?>

<a href="login.php" class="btn btn-primary">Rent Now</a>
<?php
}
else
{
?>
<a href="book_car.php?id=<?php echo $arr2['carid'];?>" class="btn btn-primary">Rent Now</a>
<?php
}
?>
</div>
</div>
</div>
</div>
<?php
}
?>
</div>
</div>
</div>
<div class="backdrop" style="display: none;"></div>
<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="img/logo.jpg" width="150" height="36" alt=""></p>
					<p style="font-size:18px;font-weight:400;">
					Explore top rated tours, hotels and restaurants around the world
					Book your unique experiences now
					</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="#0"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
							<li><a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#0"><i class="fa fa-google" aria-hidden="true"></i></a></li>
							<li><a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							<li><a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="aboutus.php" style="font-size:18px;font-weight:400;">About</a></li>
						<li><a href="login.php" style="font-size:18px;font-weight:400;">Login</a></li>
						<li><a href="registration.php" style="font-size:18px;font-weight:400;">Register</a></li>
						<li><a href="contactus.php" style="font-size:18px;font-weight:400;">Contacts</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400" style="font-size:18px;font-weight:400;"><i class="fa fa-mobile" aria-hidden="true"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:info@grtravels.com" style="font-size:18px;font-weight:400;"><i class="fa fa-envelope" aria-hidden="true"></i> info@grtravels.com</a></li>
					</ul>
					</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<ul id="footer-selector">
						<li><img src="img/allcards.png" alt="" height="50px" width="200px;"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2021 GR TRAVELS</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="https://www.jqueryscript.net/demo/Customizable-Animated-Dropdown-Plugin-with-jQuery-CSS3-Nice-Select/js/jquery.nice-select.js"></script>

</body>
</html>
