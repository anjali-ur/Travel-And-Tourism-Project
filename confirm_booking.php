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
.margin_30_35
{
padding-top:0px;	
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

	</style>
</head>

<body>
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

		
	
	<div class="hero_in cart_section">
			<div class="wrapper">
				<div class="container">
					<div class="bs-wizard clearfix">
						<div class="bs-wizard-step">
							<div class="text-center bs-wizard-stepnum">Your cart</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="cart-1.html" class="bs-wizard-dot"></a>
						</div>

						<div class="bs-wizard-step">
							<div class="text-center bs-wizard-stepnum">Payment</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="#0" class="bs-wizard-dot"></a>
						</div>

						<div class="bs-wizard-step  active">
							<div class="text-center bs-wizard-stepnum">Finish!</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="#0" class="bs-wizard-dot"></a>
						</div>
					</div>
					<!-- End bs-wizard -->
				</div>
			</div>
		</div>
</section>
<div class="details">
<div class="container">
<h3>Payment done successful</h3>
<h3>Your booking is successful</h3>

<?php
$user=$_SESSION['authuser'];
$userquery="SELECT id,email FROM user where name='$user'";
$u=mysqli_query($conn,$userquery);
$userfetch=mysqli_fetch_assoc($u);
$cust_id=$userfetch['id'];
$email=$userfetch['email'];
//echo $email;
$cardname=mysqli_real_escape_string($conn,$_POST['cardname']);
//echo $cardname;
$cardnumber=$_POST['cardnumber'];


$q = "SELECT carid,custid,starting_point,pickup_date,pickup_time,dropoff_date,dropoff_time,end_point,currentdate FROM cart_car where custid=$cust_id";
$res = mysqli_query($conn, $q);
$rnum=mysqli_num_rows($res);
if($rnum>0)
{

		

$datenow = date("Y-m-d");
$query_id="SELECT carid FROM car_booking WHERE booking_date = '$datenow'";
$q = mysqli_query($conn,$query_id);
$sequencedtoday=0;
if(!$q)
{
	$sequencedtoday=0;
}
else
{
	$sequencedtoday = mysqli_num_rows($q);	

}
//echo "<br>".$sequencedtoday;
//print_r($sequencedtoday);
//generate code:
$ymd = date('ymd');
$squence = $sequencedtoday+1;
//echo "<br>".$squence;
$squence = str_pad($squence,3,0,STR_PAD_LEFT);
//return
$booking_id=$ymd.$squence;
//echo "<br>Booking Id: ".$booking_id;
$status=1;	
$date = date("Y-m-d H:i:s");
$pdate=$date;
$squence=$squence+5;
$payment_id=$squence.$ymd;

$total_price=0;

while($arr2 = mysqli_fetch_assoc($res))
{
	$carid=$arr2['carid'];
		$lsql="SELECT carid,carname,price FROM car_list WHERE carid='$carid'";
$query=mysqli_query($conn,$lsql);
$row=mysqli_fetch_assoc($query);

$total_price=$total_price+$row['price'];

$starting_point=$arr2['starting_point'];
$pickup_date=$arr2['pickup_date'];
$pickup_time=$arr2['pickup_time'];
$dropoff_date=$arr2['dropoff_date'];
$dropoff_time=$arr2['dropoff_time'];
$end_point=$arr2['end_point'];
$amount_paid=$row['price'];

$booking="INSERT INTO car_booking(booking_id,carid,custid,starting_point,pickup_date,pickup_time,dropoff_date,dropoff_time,end_point,booking_date,amount_paid) 
VALUES('".$booking_id."','".$carid."','".$cust_id."','".$starting_point."','".$pickup_date."','".$pickup_time."','".$dropoff_date."','".$dropoff_time."','".$end_point."','".$datenow."','".$amount_paid."')";
if($ss=mysqli_query($conn,$booking))
{
		$sql = "DELETE FROM cart_car WHERE carid=$carid and custid=$cust_id";
		if (mysqli_query($conn, $sql)) 
		{
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}


}
else
{
	echo "<br>ERROR: Could not able to execute booking. " . mysqli_error($conn);
}

}
	$paymentsql="INSERT INTO payment(booking_id,holdername,cust_id,paymentdate,payment_id,amount_paid) VALUES('".$booking_id."','".$cardname."','".$cust_id."','".$datenow."','".$payment_id."','".$total_price."')";

//mysqli_query($conn,$paymentsql);
if(mysqli_query($conn,$paymentsql))
{
	//echo "Success";
}
else
{
	echo "<br>ERROR: Could not able to execute payment. " . mysqli_error($conn);
}

}

$q = "SELECT id,roomid,hotelid,custid,checkin_date,checkout_date,adult,child,amount_to_pay,currentdate FROM cart_room where custid=$cust_id";
$res = mysqli_query($conn, $q);
$rnum=mysqli_num_rows($res);
if($rnum>0)
{
		$user=$_SESSION['authuser'];

$datenow = date("Y-m-d");
$query_id="SELECT roomid FROM booking_info WHERE booking_date = '$datenow'";
$q = mysqli_query($conn,$query_id);
$sequencedtoday=0;
if(!$q)
{
	$sequencedtoday=0;
}
else
{
	$sequencedtoday = mysqli_num_rows($q);	

}
//echo "<br>".$sequencedtoday;
//print_r($sequencedtoday);
//generate code:
$ymd = date('ymd');
$squence = $sequencedtoday+3;
//echo "<br>".$squence;
$squence = str_pad($squence,3,0,STR_PAD_LEFT);
//return
$booking_id=$ymd.$squence;
//echo "<br><b>Booking Id: ".$booking_id."</b>";
$status=1;	
$date = date("Y-m-d H:i:s");
$pdate=$date;
$squence=$squence+8;
$payment_id=$squence.$ymd;

$totalprice_room=0;
//$cardname=mysqli_real_escape_string($conn,$_POST['cardname']);
//echo $cardname;
//$cardnumber=$_POST['cardnumber'];

while($arr2 = mysqli_fetch_assoc($res))
{
	$roomid=$arr2['roomid'];
		$lsql="SELECT roomid,hotelid,price FROM room_details WHERE roomid='$roomid'";
$query=mysqli_query($conn,$lsql);
$row=mysqli_fetch_assoc($query);

$totalprice_room=$totalprice_room+$row['price'];

$hotelid=$arr2['hotelid'];
$custid=$arr2['custid'];
$checkin_date=$arr2['checkin_date'];
$checkout_date=$arr2['checkout_date'];
$adult=$arr2['adult'];
$child=$arr2['child'];
$amount_paid=$arr2['amount_to_pay'];

$booking="INSERT INTO booking_info(bookingid,booking_date,checkin_date,checkout_date,custid,adult,child,amount_paid,hotelid,roomid) 
VALUES('".$booking_id."','".$datenow."','".$checkin_date."','".$checkout_date."','".$cust_id."','".$adult."','".$child."','".$amount_paid."','".$hotelid."','".$roomid."')";
if($ss=mysqli_query($conn,$booking))
{
		$sql = "DELETE FROM cart_room WHERE roomid=$roomid and custid=$cust_id";
		if (mysqli_query($conn, $sql)) 
		{
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}


}
else
{
	echo "<br>ERROR: Could not able to execute booking. " . mysqli_error($conn);
}

}

	$paymentsql="INSERT INTO payment(booking_id,holdername,cust_id,paymentdate,payment_id,amount_paid) VALUES('".$booking_id."','".$cardname."','".$cust_id."','".$datenow."','".$payment_id."','".$totalprice_room."')";

//mysqli_query($conn,$paymentsql);
if(mysqli_query($conn,$paymentsql))
{
	//echo "Success";
}
else
{
	echo "<br>ERROR: Could not able to execute payment. " . mysqli_error($conn);
}

}
	
						
?>
</div>
</div>
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