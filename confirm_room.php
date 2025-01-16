<?php
session_start();
$conn=mysqli_connect("localhost","root","","anjanvel") or die("could not connect to database");

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

	</style>
</head>

<body>
	 <?php
	 //session_start();
$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Adventures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Travels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Foods</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Extra</a>
                </li>
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
$checkin_date=date('Y-m-d', strtotime($_SESSION['checkin']));
$checkin=mysqli_real_escape_string($conn,$checkin_date);
echo "<br>CheckIn Date:  ".$checkin_date;
$checkout_date=date('Y-m-d', strtotime($_SESSION['checkout']));
$checkout=mysqli_real_escape_string($conn,$checkout_date);
echo "<br>CheckOut Date:  ".$checkout;
$adult=$_SESSION['adult'];
$child=$_SESSION['child'];

if(isset($_SESSION['book_room']))
{
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
$squence = $sequencedtoday+1;
//echo "<br>".$squence;
$squence = str_pad($squence,3,0,STR_PAD_LEFT);
//return
$booking_id=$ymd.$squence;
echo "<br>Booking Id: ".$booking_id;
$userquery="SELECT id,email FROM user where name='$user'";
$u=mysqli_query($conn,$userquery);
$userfetch=mysqli_fetch_assoc($u);
$cust_id=$userfetch['id'];
$email=$userfetch['email'];
echo $email;
$status=1;	
$date = date("Y-m-d H:i:s");
$pdate=$date;
$squence=$squence+5;
$payment_id=$squence.$ymd;

$total_price=0;
foreach($_SESSION['book_room'] as $num => $roomnum)
{

//echo "<br>".$_SESSION['key'];
$query = "SELECT title,price,roomid,hotelid FROM room_details WHERE title = '$num'";
$result = mysqli_query($conn, $query);
		
if(!$result)
{			
echo "Can't retrieve data " . mysqli_error($conn);			
exit;		
}
$room = mysqli_fetch_assoc($result);
echo $room['title'];
$hid=$room['hotelid'];
$rid=$room['roomid'];

$checkin_date = strtotime($_SESSION['checkin']);
$checkout_date=strtotime($_SESSION['checkout']);
$datediff = $checkout_date - $checkin_date;
$diff=round($datediff / 86400);
echo $diff;
$total=$room['price']*$diff*$roomnum; 
$_SESSION['total']=$total;
$total_price=$total_price+$total;
echo "<br>Amount Paid: ".$total_price;
$cardname=mysqli_real_escape_string($conn,$_POST['cardname']);
echo $cardname;
$cardnumber=$_POST['cardnumber'];

$booking="INSERT INTO booking_info(bookingid,booking_date,checkin_date,checkout_date,custid,adult,child,amount_paid,hotelid,roomid) VALUES('".$booking_id."','".$datenow."','".$checkin."','".$checkout."','".$cust_id."','".$adult."','".$child."','".$total."','".$hid."','".$rid."')";
if($ss=mysqli_query($conn,$booking))
{
	//echo "Success";
}
else
{
	echo "<br>ERROR: Could not able to execute booking. " . mysqli_error($conn);
}

}
	$paymentsql="INSERT INTO hotel_payment(booking_id,holdername,cust_id,paymentdate,payment_id,amount_paid) VALUES('".$booking_id."','".$cardname."','".$cust_id."','".$datenow."','".$payment_id."','".$total_price."')";

//mysqli_query($conn,$paymentsql);
if(mysqli_query($conn,$paymentsql))
{
	echo "Success";
}
else
{
	echo "<br>ERROR: Could not able to execute payment. " . mysqli_error($conn);
}

}
unset($_SESSION['book_room']);
unset($_SESSION['total']);
unset($_SESSION['total_price']);
						
?>
</div>
</div>

<div id="toTop"></div><!-- Back to top button -->
	
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