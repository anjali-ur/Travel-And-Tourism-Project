<?php
$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");

if(isset($_POST['submit']))
{
$hotelname=mysqli_real_escape_string($conn,$_POST['hotelname']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
 
if(isset($_FILES['img1']) && $_FILES['img1']['name'] != "")
{
			
$image = $_FILES['img1']['name'];
			
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "uploads/";
			$uploadDirectory .= $image;
			
move_uploaded_file($_FILES['img1']['tmp_name'], $uploadDirectory);
		
}



$sql="INSERT INTO hotels(hotel_name,description,city,address,hotel_img) 
VALUES('".$hotelname."','".$description."','".$city."','".$address."','".$image."')";

mysqli_query($conn,$sql);





}


?>

<!DOCTYPE>
<html>
<head>
<title>Add hotel</title>
<style>
.container{
  box-sizing: border-box;
    //display: block;

	background-color:#ccddff;
    margin-left:70px;
	margin-right:70px;
    }
form input[type="text"]
{
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
font-family: Arial;
font-size: 14px;
height: 30px;
padding: 0px 10px;
width: 300px;
}
.btn {
  background-color: DodgerBlue;
  border:none;
  color: white;
  padding: 15px 16px;
text-decoration:none;
  font-size: 16px;
  cursor: pointer;
margin-right:5px;
border-radius:5px;
}


</style>
</head>
<body>
<div class="container">
<br>
<h3>ADD hotel</h3>
<form name='addhotel' method="post" action="Add_Hotel.php" enctype="multipart/form-data">

<fieldset>
<table>
<tr>
<td>
Hotel Name:</td><td><input type="text" name="hotelname" size="100" required/></td>
</tr>
<tr>
<td>
Description:</td><td><input type="text" name="description" size="300" required/></td>
</tr>
<tr>
<td>
Image:</td><td><input type="file" name="img1" value=""/></td>
</tr>
<tr>
<td>
city:</td><td><input type="text" name="city" size="30" required/></td>
</tr>
<tr>
<td>
Address:</td><td><input type="text" name="address" size="30" required/></td>
</tr>

</table>

<input type="submit" value="submit" name="submit">


</fieldset>
</form> 
</div>
</body> 
</html> 


