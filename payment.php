<?php
session_start();
$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");
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

<!DOCTYPE html>
<html lang="en">
<?php //session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel List</title>
	<script src="js/bootstrap.js"></script>
	<link href="css/style.css" rel="stylesheet"> 
	<link href="css/vendor.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="flaticons.css">   
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/jquery-3.5.1.js"></script>
	 <script src="js/bootstrap.js"></script>
	<style>
	main {
    background-color: #f8f8f8;
    position: relative;
    z-index: 1;
}
.cart_section {
    background: #0054a6 url(pattern_1.svg) center bottom repeat-x;
}
.hero_in {
    width: 100%;
    height: 400px;
    position: relative;
    overflow: hidden;
    text-align: center;
    color: #fff;
}
.hero_in .wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
}
.bs-wizard {
    width: 100%;
    margin: 50px auto 0;
}
.bs-wizard>.bs-wizard-step {
    padding: 0;
    position: relative;
    width: 33.33%;
    float: left;
}
.bs-wizard>.bs-wizard-step .bs-wizard-stepnum {
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
}
.bs-wizard>.bs-wizard-step:first-child>.progress {
    left: 50%;
    width: 50%;
}
.bs-wizard>.bs-wizard-step>.progress {
    position: relative;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
    height: 2px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    margin: 34px 0;
}
.progress {
    display: flex;
    overflow: hidden;
    line-height: 0;
    font-size: .75rem;
    background-color: #e9ecef;
}
.bs-wizard>.bs-wizard-step>.progress>.progress-bar {
    width: 0px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    background: #fff;
}
.progress-bar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow: hidden;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    transition: width .6s ease;
}
.bs-wizard>.bs-wizard-step>.bs-wizard-dot {
    position: absolute;
    width: 50px;
    height: 50px;
    display: block;
    top: 36px;
    left: 50%;
    margin-top: -5px;
    margin-left: -25px;
    border-radius: 50%;
    border: 2px solid #fff;
    background-color: #FFC107;
}
.bs-wizard>.bs-wizard-step>.bs-wizard-dot:after {
    content: '\e903';
    font-family: 'Fontello';
    border-radius: 50px;
    position: absolute;
    top: -2px;
    left: 9px;
    font-size: 2rem;
    color: #FFC107;
}
.bs-wizard-dot
{
	  border-radius: 50px;
  color: #FFC107;
}
a {
    color: #fc5b62;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    outline: none;
}
	.night a
{
	margin-left:10px;
}
.night-details-date 
{
	margin-left:10px;
	display:inline-block;
}
.night-details-price
{
	margin-left:250px;
	display:inline-block;
}
body {
    background: #f8f8f8;
    font-size: 0.875rem;
    line-height: 1.6;
    font-family: "Poppins",Helvetica,sans-serif;
    color: #555;
}
section#description, section#reviews {
    border-bottom: 3px solid #ededed;
    margin-bottom: 45px;
}
p {
    margin-bottom: 30px;
	text-align:justify;
}
.box_detail {
    padding: 25px 25px 15px 25px;
    border: 1px solid #ededed;
    background-color: #f8f8f8;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 5px;
    margin-bottom: 30px;
}
#total_cart {
    font-size: 24px;
    font-size: 1.5rem;
    font-weight: 500;
    border-bottom: 1px solid #ededed;
    margin: 0 -25px 20px -25px;
    padding: 0 25px 15px 25px;
    line-height: 1;
}
.room_type.first {
    padding: 0 30px 15px 30px;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
ul.hotel_facilities li i {
    margin-right: 10px;
}
ul.hotel_facilities {
    list-style: none;
    margin: 0;
    padding: 0;
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
}
ul.hotel_facilities li {
    margin-bottom: 10px;
    display: inline-block;
    width: 100%;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
img {
    vertical-align: middle;
    border-style: none;
}
ul.cart_details {
    margin: 0 0 25px 0;
    padding: 0 0 15px 0;
    border-bottom: 1px solid #ededed;
}
.box_detail ul {
    margin-bottom: 0;
}
ul, ol {
    list-style: none;
    margin: 0 0 25px 0;
    padding: 0;
}
ul.cart_details li span {
    float: right;
}
ul.cart_details li {
    font-weight: 550;
}
.box_detail ul li {
    margin-bottom: 5px;
}
section#description h4, section#reviews h4 {
    font-size: 18px;
    font-size: 1.125rem;
	font-weight:bold;
}
h1, h2, h3, h4, h5, h6 {
    color: #333;
}
.secondary_nav {
    background: #fff;
    border-bottom: 1px solid #ededed;
    padding: 10px 0;
}
#total_cart span {
    font-weight: 600;
}
.float-right {
    float: right!important;
}
article, aside, figcaption, figure, footer, header, hgroup, main, nav, section {
    display: block;
}
.secondary_nav ul {
    margin-bottom: 0;
}
ul, ol {
    list-style: none;
    margin: 0 0 25px 0;
    padding: 0;
}
ul {
    display: block;
    
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
.secondary_nav ul li {
    display: inline-block;
    margin-right: 20px;
    font-weight: 500;
    font-size: 16px;
    font-size: 1rem;
}
ul, ol {
    list-style: none;
    margin: 0 0 25px 0;
    padding: 0;
}
.form_title {
    position: relative;
    padding-left: 40px;
    margin-bottom: 0;
}
.form_title h3 {
    margin: 0;
    padding: 0;
    font-size: 25px;
    
}
.form_title h3 strong {
    background-color: #fc5b62;
    text-align: center;
    width: 40px;
    height: 40px;
    display: inline-block;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    font-size: 22px;
    line-height: 42px;
    text-align: center;
    position: absolute;
    left: 0;
    top: -5px;
}
.form_title p {
    color: #999;
    margin: 0;
    padding: 0;
    font-size: 12px;
    font-size: 0.75rem;
    line-height: 14px;
}
.box_cart .step {
    padding: 15px 55px 0 40px;
    margin: 0 0 0 0;
}
.form-group {
    position: relative;
}
.form-group {
    margin-bottom: 1rem;
}
.box_cart label {
    font-weight: 550;
	font-size:16px;
}
label {
    font-weight: 550;
    margin-bottom: 3px;
}
.form-control {
    padding: 10px;
    height: 42px;
    font-size: 14px;
    font-size: 0.875rem;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    border: 1px solid #d2d8dd;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
button, input {
    overflow: visible;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
}
.cards-payment {
    margin-top: 28px;
}
.small, small {
    font-size: 17px;
    font-weight: 500;
}
.margin_40_35
{
	padding-top:0px;
	padding-bottom:0px;
}
footer {
    background-color: #121921;
    color: rgba(255,255,255,0.7);
	margin-top:50px;
	
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
.bs-wizard-dott
{
position: absolute;
    width: 50px;
    height: 50px;
    display: block;
    top: 36px;
    left: 50%;
    margin-top: -5px;
    margin-left: -25px;
    border-radius: 50%;
    border: 2px solid #fff;
    background-color: #0054a6;
}

	</style>
</head>

<body style="transform:none;">
	 <?php
	 //session_start();
//$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");
?>

	<div id="page">
		
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
                <li class="nav-item">
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

		
	<main>
	<div class="hero_in cart_section start_bg_zoom">
			<div class="wrapper">
				<div class="container">
					<div class="bs-wizard clearfix">
						<div class="bs-wizard-step">
							<div class="text-center bs-wizard-stepnum">Your cart</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="cart.php" class="bs-wizard-dot"></a>
						</div>

						<div class="bs-wizard-step active">
							<div class="text-center bs-wizard-stepnum">Payment</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="payment.php" class="bs-wizard-dot"></a>
						</div>

						<div class="bs-wizard-step disabled">
							<div class="text-center bs-wizard-stepnum">Finish!</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="#" class="bs-wizard-dott"></a>
						</div>
					</div>
					<!-- End bs-wizard -->
				</div>
			</div>
		</div>
</section>
<div class="bg_color_1">
			<div class="container margin_40_35">
			<div class="row">
			<div class="col-lg-8">
			<div class="box_cart">
<?php
$name=$_SESSION['authuser'];
echo "<h3><strong>".$name."</strong></h3><br>";
$psql="SELECT * FROM user WHERE name='$name'";
	$res=mysqli_query($conn,$psql);
	$row2=mysqli_fetch_assoc($res);

?>
<form method="post" action="confirm_booking.php">
						
<div class="form_title">
							<h3>Payment Information</h3>
							<p>
								Easy and Fast payment
							</p>
						</div>
						<div class="step">
							<div class="form-group">
							<label>Name on card</label>
							<input type="text" class="form-control" id="cardname" name="cardname">
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Card number</label>
									<input type="text" id="cardnumber" name="cardnumber" class="form-control">
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<img src="img/allcards.png" alt="Cards" width="250px;" height="70px;"class="cards-payment">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Expiration date</label>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" id="month" name="month" class="form-control" placeholder="MM">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" id="year" name="year" class="form-control" placeholder="Year">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Security code</label>
									<div class="row">
										<div class="col-4">
											<div class="form-group">
												<input type="text" id="ccv" name="ccv" class="form-control" placeholder="CCV">
											</div>
										</div>
										<div class="col-8">
											<img src="img/icon_cvv.png" width="100px" height="50px" alt="ccv"><small>Last 3 digits</small>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						</div>
						</div>
<aside class="col-lg-4" id="sidebar">
						<div class="box_detail">
					
 <div id="dp1">
		 
						<?php
		$user=$_SESSION['authuser'];
$userquery="SELECT id,email FROM user where name='$user'";
$u=mysqli_query($conn,$userquery);
$userfetch=mysqli_fetch_assoc($u);
$cust_id=$userfetch['id'];
$total_price=0;
$totalprice_room=0;
	$qu = "SELECT carid FROM cart_car where custid=$cust_id";
$res2 = mysqli_query($conn, $qu);
$rnum=mysqli_num_rows($res2);
if($rnum>0)
{
			$q = "SELECT carid,custid,starting_point,pickup_date,pickup_time,dropoff_date,dropoff_time,end_point FROM cart_car where custid=$cust_id";
$res = mysqli_query($conn, $q);

while($arr2 = mysqli_fetch_assoc($res))
{
	$carid=$arr2['carid'];
		$lsql="SELECT carid,carname,price FROM car_list WHERE carid='$carid'";
$query=mysqli_query($conn,$lsql);
$row=mysqli_fetch_assoc($query);
$total_price=$total_price+$row['price'];
?>
  <ul class="cart_details">
<li>Carname<span><?php echo "<strong>".$row['carname']."</strong>"; ?></span></li>
<li>Starting Point <span><?php echo$arr2['starting_point']; ?></span></li>
<li>Pickup Date<span><?php echo $arr2['pickup_date']; ?></span></li>
<li>Dropoff Date<span><?php echo $arr2['dropoff_date']; ?></span></li>
<li> Price <span><?php echo $row['price']; ?></span></li>
</ul>
<?php
}
?>
<ul class="cart_details">
<li> Total<span><?php echo $total_price; ?></span></li>
</ul>
<?php

}
	$qur = "SELECT roomid FROM cart_room where custid=$cust_id";
$res4 = mysqli_query($conn, $qur);
$rnum2=mysqli_num_rows($res4);
if($rnum2>0)
{
		$q2 = "SELECT id,roomid,hotelid,custid,checkin_date,checkout_date,adult,child,amount_to_pay,currentdate FROM cart_room where custid=$cust_id";
$res5 = mysqli_query($conn, $q2);

while($arr2 = mysqli_fetch_assoc($res5))
{
	$roid=$arr2['roomid'];
	$query = "SELECT title,price,hotelid,image FROM room_details WHERE roomid = '$roid'";
$result = mysqli_query($conn, $query);
		
$room = mysqli_fetch_assoc($result);

$hoid=$room['hotelid'];
$query2 = "SELECT hotel_name FROM hotels WHERE hotelid='$hoid'";
$result2 = mysqli_query($conn, $query2);
$hotel = mysqli_fetch_assoc($result2);
?>
 <ul class="cart_details">
<li>Hotel Name<span><?php echo $hotel['hotel_name']; ?></span></li>
<li>Room Name <span><?php echo $room['title']; ?></span></li>
<li>Checkin Date<span><?php echo $arr2['checkin_date']; ?></span></li>
<li>Checkout Date<span><?php echo $arr2['checkout_date']; ?></span></li>
<li> Price <span><?php echo $room['price']; ?></span></li>
</ul>
<?php
$totalprice_room=$totalprice_room+$room['price'];
}
?>

<ul class="cart_details">
<li> Total<span><?php echo $totalprice_room;?></span></li>
</ul>

<?php

}

?>	
</div>
<div id="total_cart">
Grand Total <span class="float-right"><?php echo $total_price+$totalprice_room;?></span>
</div>


<!--<input type="submit" name="save" value="Update"> -->
<?php if(!isset($_SESSION['authuser']))
{
	
	 ?>

<a href="login.php" class="btn_1 full-width purchase">Submit</a>

<?php
}
else
{
	?>
	<input type="submit" name="submit" class="btn_1 full-width purchase">

<?php
}
?>
</form>

</aside>
</div>

	</div>
</div>	
</div>
</main>
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
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.js"></script>
    
	<script src="assets/validate.js"></script>
	
	<div class="backdrop" style="display: none;"></div>
	 <script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="https://www.jqueryscript.net/demo/Customizable-Animated-Dropdown-Plugin-with-jQuery-CSS3-Nice-Select/js/jquery.nice-select.js"></script>

</body>
</html>