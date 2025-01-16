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
	.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
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

						<div class="bs-wizard-step active">
							<div class="text-center bs-wizard-stepnum">Payment</div>
							<div class="progress">
								<div class="progress-bar"></div>
							</div>
							<a href="#0" class="bs-wizard-dot"></a>
						</div>

						<div class="bs-wizard-step disabled">
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
<div class="bg_color_1">
			<div class="container margin_60_35">
			<div class="row">
			<div class="col-lg-8">
<?php
$name=$_SESSION['authuser'];
echo $name;
$psql="SELECT * FROM user WHERE name='$name'";
	$res=mysqli_query($conn,$psql);
	$row2=mysqli_fetch_assoc($res);

?>
<form method="post" action="confirm_room.php">
						
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
								<img src="img/cards_all.svg" alt="Cards" class="cards-payment">
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
											<img src="img/icon_ccv.gif" width="50" height="29" alt="ccv"><small>Last 3 digits</small>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						</div>
<aside class="col-lg-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
<div class="box_detail">
<div id="total_cart">
Total <span class="float-right"><?php if(isset($_SESSION['total_price']))
{
	//$_SESSION['total_price']=$total_price;
echo "&#8377;".$_SESSION['total_price'];
}
else
{
	echo "&#8377;0.00";
}
?></span>
</div>
<div class="stay-date">
<div class="row">

<div class="col-lg-6">
<b>Check in</b> </div>
<div class="col-lg-6">
        <b>  Check out</b></div>
		  </div>
		  <div class="row">

<div class="col-lg-6">
After 2:00 PM</div>
<div class="col-lg-6">
          Before 12:00 PM</div>
		  </div>
		  </div>
		   <div id="dp1">
		    <?php
		  if(isset($_SESSION['checkin'])&&isset($_SESSION['checkout']))
		  {
			?>
		  <ul class="cart_details">
								<li>From <span><?php echo $_SESSION['checkin'];?></span></li>
								<li>To <span><?php  echo $_SESSION['checkout'];?> </span></li>
								<li>Adults <span><?php echo $_SESSION['adult']; ?></span></li>
								<li>Childs <span><?php echo $_SESSION['child']; ?></span></li>
							</ul>
		    <?php
			 
			 
		  }
		  else
		  {
			  echo " ";
		  }
		  
		 
		  ?>
		 
</div>
<?php
if(isset($_SESSION['checkin'])&&isset($_SESSION['checkout']))
{
if(isset($_GET['title']))
{
		
$title = $_GET['title'];
	//echo $room_id;
}
if(isset($title))
{
	//echo $room_id;			
if(!isset($_SESSION['book_room']))
{
		//echo $_SESSION['book_room'];		
$_SESSION['book_room'] = array();
///print_r($_SESSION['book_room']);
$_SESSION['total_room']=0;
			
$_SESSION['total_price'] = '0';
		
}
if(!isset($_SESSION['book_room'][$title]))
{
//			print_r($_SESSION['book_room']);
$_SESSION['book_room'][$title] = 1;
//print_r($_SESSION['book_room'][$room_no]);
		//unset($_GET);

} 
elseif(isset($_SESSION['book_room'][$title]))
{
$_SESSION['book_room'][$title]++;
			
unset($_GET);
}	
}

if(isset($_SESSION['book_room']) && (array_count_values($_SESSION['book_room'])))
{

$bookroom=$_SESSION['book_room'];
$price = 0.0;
		//print_r($bookroom);
if(is_array($bookroom))
{
		  	
foreach($bookroom as $num => $roomnum)
{
	//echo "Book: ".$num;	  		
$query = "SELECT price,title FROM room_details WHERE title = '$num' group by title";
		
$result = mysqli_query($conn, $query);
		
		
$row = mysqli_fetch_assoc($result);
		
$roomprice=$row['price'];	
//echo $roomprice;	 
//echo "qty".$roomnum; 
if($roomprice)
{
		  			
$price += $roomprice * $roomnum;
		  	
	
}
		  	
}
		
}
}
$_SESSION['total_price'] = $price;


$rooms = 0;
		
if(is_array($bookroom))
{
			
foreach($bookroom as $num => $roomnum)
{
				
$rooms += $roomnum;
//echo "for rooms:".$rooms;			
}
		
}

$_SESSION['total_room'] = $rooms;
if(!empty($_GET['action']))
{
switch($_GET["action"]) 
{
case "remove":
if(!empty($_SESSION['book_room'])) {
			foreach($_SESSION['book_room'] as $k => $v) {
					if($_GET["code"] == $k)
					{
						unset($_SESSION['book_room'][$k]);
						unset($_SESSION['totalp'][$k]);
						unset($_SESSION['total'][$k]);
						unset($_SESSION['tax'][$k]);
						
					}				
					if(empty($_SESSION['book_room']))
					{
						unset($_SESSION['book_room']);
						unset($_SESSION['total_items']);
						unset($_SESSION['total_price']);
						unset($roomnum);
						echo "Your booking is empty";
						//header("location:list.php");

					}
			}
		}
break;

}


}	
		
$total_price=0;
if(!empty($_SESSION['book_room']))
{
foreach($_SESSION['book_room'] as $num => $roomnum)
{
	
	//echo "roomid".$num;
	//echo "qty".$roomnum;
$query = "SELECT title,price FROM room_details WHERE title = '$num' group by title";
$result = mysqli_query($conn, $query);
		
if(!$result)
{
			
echo "Can't retrieve data " . mysqli_error($conn);
			
exit;
		
}
$room = mysqli_fetch_assoc($result);

 ?>
 <div class='room-details-title'>
 <?php echo $room['title']; ?>
 </div>
 <div class="room-details-price">
  &#8377;<?php echo $room['price']; ?>
 </div>
 <div class="night">
<?php 
//date_format($_SESSION['checkin'],"Y/m/d");
//$datein=date_create($_SESSION['checkin']);
//$dateout=date_create($_SESSION['checkout']);
 //$orgDate = $_SESSION['checkin'];
   // $date = str_replace('/', '-"', $orgDate);  
  //  $newDate = date("Y-m-d", strtotime($date));
//$newDate = date("Y-m-d", strtotime($_SESSION['checkin'])); 
//$newDateo = date("Y-m-d", strtotime($_SESSION['checkout']));  
$checkin_date = strtotime($_SESSION['checkin']);  
$checkout_date=strtotime($_SESSION['checkout']); 
//echo $checkin_date;

$datediff = $checkout_date - $checkin_date;
$diff=round($datediff / 86400);
?>
  </div>
<?php
$total=$room['price']*$diff*$roomnum; 
$_SESSION['total']=$total;
?>
<?php

//$totalp=$total+$tax;
//$_SESSION['totalp']=$totalp;
$total_price=$total_price+$total;

?>


<!--		  <div id="dp1">  -->
<!--echo "<br>Title ".$room['title'];
echo "Price ".$room['price'];
echo "Rooms: ".$roomnum;
echo "Total ".$roomnum*$room['price'];
echo "Roomid ".$room['roomid'];
echo "Total rooms ".$roomnum;
-->
<?php
}
}
//echo "<br>Total rooms: ".$_SESSION['total_room'];
?>

<!--<input type="submit" name="save" value="Update"> -->
<?php
}
else
{
	echo " ";
}

?>

<div class="hrth"></div>
<div class="total-price">
Total:

<?php
if(isset($_SESSION['total_price']))
{
echo "&#8377;".$total_price;
//$_SESSION['amt_payable']=$total_price;
}
else
{
	echo "&#8377;0.00";
}
?>		  
</div>
 <?php if(!isset($_SESSION['authuser']))
{
	
	 ?>

<a href="login.php" class="btn_1 full-width purchase">Checkout</a>

<?php
}
else
{
	?>
	<input type="submit" name="submit2" class="btn_1 full-width purchase">

<?php
}
?>
</div>
</div>
<!--<input type="submit" name="save" value="Update"> -->
</aside>
</form>
	</div>
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