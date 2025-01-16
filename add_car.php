<?php
$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");

if(isset($_POST['submit']))
{
$carname=mysqli_real_escape_string($conn,$_POST['carname']);
//$carnumber=mysqli_real_escape_string($conn,$_POST['carnumber']);

//$roomno=mysqli_real_escape_string($conn,$_POST['roomno']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
 $seater=mysqli_real_escape_string($conn,$_POST['seater']);
$acnonac=mysqli_real_escape_string($conn,$_POST['acnonac']);
$luggage=mysqli_real_escape_string($conn,$_POST['luggage']);
if(isset($_FILES['img1']) && $_FILES['img1']['name'] != "")
{
			
$image = $_FILES['img1']['name'];
			
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "uploads/";
			$uploadDirectory .= $image;
			
move_uploaded_file($_FILES['img1']['tmp_name'], $uploadDirectory);
		
}




$sql="INSERT INTO car_list(carname,description,price,image,seater,ACNONAC,luggage) 
VALUES('".$carname."','".$description."','".$price."','".$image."','".$seater."','".$acnonac."','".$luggage."')";

mysqli_query($conn,$sql);





}


?>

<!DOCTYPE>
<html>
<head>
<title>Add car</title>
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
<h3>ADD car</h3>
<form name='addcar' method="post" action="add_car.php" enctype="multipart/form-data">

<fieldset>
<table>
<tr>
<td>
Car name:</td><td><input type="text" name="carname" size="30" required/></td>
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
Seater:</td><td><input type="text" name="seater" size="300" required/></td>
</tr>

<tr>
<td>
Price:</td><td><input type="text" name="price" size="30" required/></td>
</tr>
<tr>
<td>
AC/NON-AC:</td><td><input type="text" name="acnonac" size="30" required/></td>
</tr>
<tr>
<td>
luggage:</td><td><input type="text" name="luggage" size="30" required/></td>
</tr>

</table>

<input type="submit" value="submit" name="submit">


</fieldset>
</form> 
</div>
</body> 
</html> 


