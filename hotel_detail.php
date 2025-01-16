 <?php
	 session_start();
$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id=$_GET['id'];
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

if(isset($_POST['submit']))
{
	$name=mysqli_real_escape_string($conn,$_POST['name_review']);
	$email=mysqli_real_escape_string($conn,$_POST['email_review']);
	$rating=$_POST['rating_review'];
	$descrip=mysqli_real_escape_string($conn,$_POST['review_text']);
	$datenow = date("Y-m-d");

	$rev="INSERT INTO hotel_review(name,email,rating,description,hotelid,created_date) VALUES('".$name."','".$email."','".$rating."','".$descrip."','".$id."','".$datenow."')";

if(mysqli_query($conn,$rev))
{
	echo "";
}
else {
  echo "Error deleting record: " . mysqli_error($conn);
}
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel List</title>
	<script src="js/bootstrap.js"></script>
	<link href="css/vendor.css" rel="stylesheet">  
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
html * {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
*, ::after, ::before {
    box-sizing: border-box;
}
div {
    display: block;
}

body {
      margin: 0;
  font-family: "Poppins",Helvetica,sans-serif;  font-size: 1.2rem;
    font-weight: 450;
    line-height: 1.7;
    color: #555;
    text-align: left;
  background: #fff;
    
}
main {
   
    position: relative;
    z-index: 1;
}
.container
{
	max-width: 1250px;
}
.room_type.first {
    padding: 0 30px 15px 30px;
}
.margin_60_35 {
    padding-top: 60px;
    padding-bottom: 35px;
}
section#description, section#reviews {
    border-bottom: 3px solid #ededed;
    margin-bottom: 45px;
}
section#description h4, section#reviews h4 {
    
    font-size: 1.125rem;
}
h1, h2, h3, h4, h5, h6 {
    color: #333;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: .5rem;
    font-weight: 600;
    line-height: 1.2;
}
p {
    
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
   
    display: flex;
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
    font-size:17px;
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
.secondary_nav {
    background: #fff;
    border-bottom: 1px solid #ededed;
    padding: 0px 0;
}
.secondary_nav ul li {
    display: inline-block;
    margin-right: 20px;
    font-weight: 500;
   
    font-size: 1rem;
}
.secondary_nav ul li a.active {
    color: rgba(0,0,0,0.9);
}
a {
    text-decoration: none;
	transition: all 0.3s ease-in-out;
    outline: none;
	color:black;
	
}
ul, ol {
    list-style: none;
    margin: 0 0 25px 0;
    padding: 0;
}
.secondary_nav ul li:last-child {
    display: none;
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
.reviews-container .progress {
    margin-bottom: 12px;
}
.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    line-height: 0;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}
.reviews-container .progress-bar {
    background-color: #0054a6;
}
.small, small {
    font-size: 80%;
    font-weight: 400;
}
strong {
    font-weight: 600;
}
section#reviews {
    border-bottom: none;
}
section#description, section#reviews {
    border-bottom: 3px solid #ededed;
    margin-bottom: 45px;
}
section#description h2, section#reviews h2 {
    font-size: 24px;
    font-size: 1.5rem;
}
h1, h2, h3, h4, h5, h6 {
    color: #333;
}
#review_summary {
    text-align: center;
    background-color: #0054a6;
    color: #fff;
    padding: 20px 10px;
    -webkit-border-radius: 5px 5px 5px 0;
    -moz-border-radius: 5px 5px 5px 0;
    -ms-border-radius: 5px 5px 5px 0;
    border-radius: 5px 5px 5px 0;
}
#review_summary strong {
    font-size: 42px;
    font-size: 2.625rem;
    display: block;
    line-height: 1;
}
strong {
    font-weight: 600;
}
#review_summary em {
    font-style: normal;
    font-weight: 500;
    display: block;
}
.small, small {
    font-size: 80%;
    font-weight: 400;
}
.reviews-container .review-box {
    position: relative;
    margin-bottom: 25px;
    padding-left: 100px;
    min-height: 100px;
}
.reviews-container .rev-thumb {
    position: absolute;
    left: 0px;
    top: 0px;
    width: 80px;
    height: 80px;
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 5px;
    overflow: hidden;
}
.reviews-container .rev-thumb img {
    width: 80px;
    height: auto;
}

.reviews-container .rev-content {
    position: relative;
    padding: 25px 25px 0 25px;
    border: 1px solid #ededed;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    border-radius: 5px;
}
.rating {
    color: #ccc;
}
.rating .voted {
    color: #FFC107;
}
.rating i {
    margin-right: 2px;
}
.icon_star:before {
    content: "\e033";
}
.reviews-container .rev-info {
    font-size: 12px;
    font-size: 0.75rem;
    font-style: italic;
    color: #777;
    margin-bottom: 10px;
}
p {
    margin-bottom: 30px;
}
label {
    font-weight: 500;
    margin-bottom: 3px;
}
.custom-select-form select {
    display: block;
	  -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    border: 1px solid #d2d8dd;
    height: 45px;
    line-height: 42px;
}
select.wide {
    width: 100%;
}
.custom-select-form select {
    -webkit-tap-highlight-color: transparent;
    background-color: #fff;
    border-radius: 3px;
    border: none;
    box-sizing: border-box;
    clear: both;
    cursor: pointer;
    display: block;
    float: left;
    font-family: inherit;
    font-size: 14px;
    font-weight: normal;
    height: 50px;
    line-height: 48px;
    outline: none;
    padding-left: 15px;
    padding-right: 27px;
    position: relative;
    text-align: left !important;
    transition: all 0.2s ease-in-out;
    user-select: none;
    white-space: nowrap;
    width: auto;
    color: #555;
    padding-top: 2px;
}
.custom-select-form select .wide {
    left: 0 !important;
    right: 0 !important;
}
.custom-select-form select .wide {
    background-color: #fff;
    border-radius: 3px;
    box-shadow: 0 0 0 1px rgb(68 68 68 / 11%);
    box-sizing: border-box;
    margin-top: 4px;
    opacity: 0;
    overflow: hidden;
    padding: 0;
    pointer-events: none;
    position: absolute;
    top: 100%;
    left: 0;
    transform-origin: 50% 0;
    transform: scale(0.75) translateY(-25px);
    transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25),opacity 0.15s ease-out;
    z-index: 9;
    height: 18vh;
    overflow: auto;
}
.custom-select-form select .option {
    cursor: pointer;
    font-weight: 400;
    line-height: 38px;
    list-style: none;
    min-height: 38px;
    outline: none;
    padding-left: 15px;
    padding-right: 26px;
    text-align: left;
    transition: all 0.2s;
}
.custom-select-form select .option.selected {
    font-weight: 500;
}
.custom-select-form select:after {
    border-bottom: 2px solid #999;
    border-right: 2px solid #999;
    content: '';
    display: block;
    height: 8px;
    margin-top: -5px;
    pointer-events: none;
    position: absolute;
    right: 20px;
    top: 50%;
    transform-origin: 66% 66%;
    transform: rotate(
45deg
);
    transition: all 0.15s ease-in-out;
    width: 8px;
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
.add_top_20 {
    margin-top: 20px;
}
.form-group {
    position: relative;
}
a.btn_1, .btn_1 {
    border: none;
    color: #fff;
    background: #fc5b62;
    outline: none;
    cursor: pointer;
    display: inline-block;
    text-decoration: none;
    padding: 15px 30px;
    color: #fff;
    font-weight: 600;
    text-align: center;
    line-height: 1;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
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

</style>
   
    <!-- BASE CSS -->
    
	<!--<link href="css/vendors.css" rel="stylesheet"> -->

	
</head>

<body>
	<?php
		  if(!isset($_SESSION['checkin'])&&!isset($_SESSION['checkout']))
		  {
				 echo '<script language="javascript">';
			echo 'alert("Select city,checkin date and checkout date");'; 
			echo 'window.location.href = "hotel_list.php";';
			echo '</script>';
		  }
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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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

		
	
	<div class="owl-carousel owl-theme main_banner">
        <div class="item"><img height="500px" src="img/hotellist.jpg" alt="" /></div>
    </div>
	<!--/hero_in-->
		
		<br>
 <div class="search-sec bg-transparent d-none d-sm-block" style="top:50%;">
        <div class="container text-center tag_line">
            <h3>Book unique experiences</h3>
            <p>Explore top rated tours, hotels and restaurants around the world</p>
        </div>
    </div>
	</section>

<main style="transform: none;">
<div class="bg_color_1">
<nav class="secondary_nav sticky_horizontal">
				<div class="container">
					<ul class="clearfix">
						<li><a href="#description" class="active" style="font-size:20px;">Description</a></li>
						<li><a href="#reviews" style="font-size:20px; color: #555;">Reviews</a></li>
						<li><a href="#sidebar" style="font-size:20px;">Booking</a></li>
					</ul>
				</div>
			</nav>
			
			<?php
			

			
			$lsql="SELECT description FROM  hotels WHERE hotelid='$id'";
$query=mysqli_query($conn,$lsql);
$row=mysqli_fetch_assoc($query);

			?>
			
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description">
							<h2>Description</h2>
							<p style="margin-bottom: 30px;text-align:justify;font-size:17px;"><?php echo $row['description']; ?></p>
					<hr>
			<?php
		
			$q = "SELECT roomid,title,image,description,price,person_allowed,no_of_beds,extra_allowed FROM room_details where isDeleted='N' and hotelid='$id'";
$res = mysqli_query($conn, $q);

while($arr2 = mysqli_fetch_assoc($res))
{

?>	

							<div class="room_type first">
								<div class="row">
									<div class="col-md-4">
										<img src="./uploads/<?php echo $arr2['image']; ?>" class="img-fluid" alt="">
									</div>
									<div class="col-md-8">
										<h4><?php echo $arr2['title'];?></h4>
										<p style="margin-bottom: 30px;text-align:justify;font-size:17px;"><?php echo $arr2['description'];?></p>
										<ul class="hotel_facilities">
											<li><i class="fa fa-bed" aria-hidden="true"></i>Beds Available &nbsp;<?php echo $arr2['no_of_beds'];?> </li>
											<li><i class="fa fa-money" aria-hidden="true"></i>Price <?php echo "&#8377;".$arr2['price'];?></li>
											<li><i class="fa fa-shower" aria-hidden="true"></i>Shower</li>
											<li><i class="fa fa-snowflake-o" aria-hidden="true"></i>Air Condition</li>
											<li><i class="fa fa-television" aria-hidden="true"></i>TV</li>
										</ul>
										<?php if(!isset($_SESSION['authuser']))
{
	
	 ?>
	 <a href="login.php" id="btn-room" class="btn btn-success"> Book Room</a> 
<?php
}
else
{
?>

										<a href="cart.php?bookid=hotel&roomid=<?php echo $arr2['roomid']; ?>&hotelid=<?php echo $id; ?>" 
										id="btn-room" class="btn btn-success"> Book Room</a> 
<?php
}
?>

									</div>
								
								</div>
									<hr>
								<!-- /row -->
							</div>
							
							
							<?php
}
							?>
</section>
							
<?php
$rating1 = "SELECT name,email,description,rating,hotelid,created_date FROM hotel_review where hotelid=$id";
$rating2 = mysqli_query($conn, $rating1);
$star1=0;
$star2=0;
$star3=0;
$star4=0;
$star5=0;
$sumrating=0;$avgrating=0;$cnt=0;
while($arr2 = mysqli_fetch_assoc($rating2))
{		
$cnt++;
if(round($arr2['rating']/2)==1)
{
	$star1++;
}	
if(round($arr2['rating']/2)==2)
{
	$star2++;
}	
if(round($arr2['rating']/2)==3)
{
	$star3++;
}	
if(round($arr2['rating']/2)==4)
{
	$star4++;
}	
if(round($arr2['rating']/2)==5)
{
	$star5++;
}	
$sumrating+=$arr2['rating'];
}
$avgrating=$sumrating/5;
$totalstar=$star1+$star2+$star3+$star4+$star5;
if($totalstar==0)
{
	$totalstar=1;
}
$s1=$star1*100/$totalstar;
$s2=$star2*100/$totalstar;
$s3=$star3*100/$totalstar;
$s4=$star4*100/$totalstar;
$s5=$star5*100/$totalstar;
?>


<section id="reviews">
							<h2>Reviews</h2>
							<div class="reviews-container">
								<div class="row">
									<div class="col-lg-3">
										<div id="review_summary">
											<strong><?php echo $avgrating;?></strong>
											<br>
											<small>Based on <?php echo $cnt;?> reviews</small>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width:<?php echo $s5;?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width:<?php echo $s4;?>%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width:<?php echo $s3;?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width:<?php echo $s2;?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width:<?php echo $s1;?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
										</div>
										<!-- /row -->
									</div>
								</div>
								<!-- /row -->
							</div>

							<hr>

							<div class="reviews-container">
<?php
$rev1 = "SELECT name,email,description,rating,hotelid,created_date FROM hotel_review where hotelid=$id";
$rev2 = mysqli_query($conn, $rev1);

while($arr2 = mysqli_fetch_assoc($rev2))
{										
										
?>
										
								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="img/profileimg.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
										<?php 
										$r=round($arr2['rating']/2);
										for($i=0;$i<$r;$i++)
											{
												
											?>
											<i class="fa fa-star voted" aria-hidden="true"></i>
											<?php
											}
											
												if($r<5)
												{
													for($j=0;$j<5-$r;$j++)
													{
														?>
														<i class="fa fa-star" aria-hidden="true"></i>
														<?php
													}
												}
											?>
										</div>
										<div class="rev-info">
											<?php echo $arr2['name']." - ".$arr2['created_date']; ?>
										</div>
										<div class="rev-text">
											<p>
											
											<?php echo $arr2['description'];?>
											</p>
										</div>
									</div>
								</div>
								<?php
}
								?>
								<!-- /review-box -->
								<!-- /review-box -->
							</div>
							<!-- /review-container -->
						</section>
						<!-- /section -->
						<hr>
						<div class="add-review">
								<h5>Leave a Review</h5>
								<form action="hotel_detail.php?id=<?php echo $id;?>" method="post">
									<div class="row">
										<div class="form-group col-md-6">
											<label>Name and Lastname *</label>
											<input type="text" name="name_review" id="name_review" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-6">
											<label>Email *</label>
											<input type="email" name="email_review" id="email_review" class="form-control">
										</div>
										<div class="form-group col-md-6">
											<label>Rating </label>
											<div class="custom-select-form">
											<select name="rating_review" id="rating_review" class="wide">
												<option value="1" class="option">1 (lowest)</option>
												<option value="2" class="option">2</option>
												<option value="3" class="option">3</option>
												<option value="4" class="option">4</option>
												<option value="5" class="option" selected>5 (medium)</option>
												<option value="6" class="option">6</option>
												<option value="7" class="option">7</option>
												<option value="8" class="option">8</option>
												<option value="9" class="option">9</option>
												<option value="10" class="option">10 (highest)</option>
											</select>
											</div>
										</div>
										<div class="form-group col-md-12">
											<label>Your Review</label>
											<textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
										</div>
										<div class="form-group col-md-12 add_top_20">
											<input type="submit" value="Submit" name="submit" class="btn_1" id="submit-review">
										</div>
									</div>
								</form>
							</div>
					</div>
<aside class="col-lg-4" id="sidebar"style="position: relative;
    overflow: visible;
    box-sizing: border-box;
    min-height: 1px;">
<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform:none; width: 400px; left: 879.5px; top: 0px;">
<div class="box_detail">
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
		   $rnum=0;
		     if(isset($_SESSION['authuser']))
		  {
		
		  		$qur = "SELECT id,roomid,hotelid,custid,checkin_date,checkout_date,adult,child,amount_to_pay,currentdate FROM cart_room where custid=$cust_id";
$res4 = mysqli_query($conn, $qur);
$rnum=mysqli_num_rows($res4);
$totalprice_room=0;
if($rnum>0)
{
while($arr2 = mysqli_fetch_assoc($res4))
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
		  }
		  else
		  {
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
		  }
		  
		  ?>
</div>
<?php
if($rnum>0)
{

?>
	<a href="cart.php" class="btn btn-success">Continue</a> 
	<?php
}
	?>
</div>
</div>
</aside>

					<!-- /col -->
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