<?php
$conn=mysqli_connect("localhost","root","","travelandtourism") or die("could not connect to database");

if(isset($_POST['submit']))
{
$title=mysqli_real_escape_string($conn,$_POST['title']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
 $persons=mysqli_real_escape_string($conn,$_POST['persons']);
$bed=mysqli_real_escape_string($conn,$_POST['bed']);
$total=mysqli_real_escape_string($conn,$_POST['total']);
$hid=mysqli_real_escape_string($conn,$_POST['hotelname']);

$extras=mysqli_real_escape_string($conn,$_POST['extras']);
if(isset($_FILES['img1']) && $_FILES['img1']['name'] != "")
{
			
$image = $_FILES['img1']['name'];
			
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "uploads/";
			$uploadDirectory .= $image;
			
move_uploaded_file($_FILES['img1']['tmp_name'], $uploadDirectory);
		
}




$sql="INSERT INTO room_details(hotelid,title,description,price,image,person_allowed,no_of_beds,extra_allowed,total_room) 
VALUES('".$hid."','".$title."','".$description."','".$price."','".$image."','".$persons."','".$bed."','".$extras."','".$total."')";

mysqli_query($conn,$sql);





}


?>

<!DOCTYPE>
<html>
<head>
<title>Add room</title>
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
<h3>ADD room</h3>
<form name='addroom method="post" action="add_room.php" enctype="multipart/form-data">

<fieldset>
<table>
<tr>
<td>
Title:</td><td><input type="text" name="title" size="30" required/></td>
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
Price:</td><td><input type="text" name="price" size="30" required/></td>
</tr>
<tr>
<td>
Persons:</td><td><input type="text" name="persons" size="30" required/></td>
</tr>
<tr>
<td>
No of beds:</td><td><input type="text" name="bed" size="30" required/></td>
</tr>
<tr>
<td>
Total Room:</td><td><input type="text" name="total" size="30" required/></td>
</tr>

<tr>
<td>
Extras allowed:</td><td><input type="text" name="extras" size="30" required/></td>
</tr>
<tr>
<td>
Hotel Name:</td><td>
<select name="hotelname">
<?php
$qury = "SELECT hotelid,hotel_name FROM hotels";
  
$result2 = mysqli_query($conn, $qury);

while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
{?>

     <option value="<?php echo $row2['hotelid'];?>">
       <?php echo $row2['hotel_name'].$row2['hotelid'];?></option>
<?php }
?>
	
	
	

</select>
</td>
</tr>

</table>

<input type="submit" value="submit" name="submit">


</fieldset>
</form> 
</div>
</body> 
</html> 


