<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/regi.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Login</title>
</head>
<body>

<?php
@include_once "connection.php";

if  (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    $query = "SELECT email, name, password FROM user WHERE email='$email' AND password='$pass'";
    $stmt = $conn->query($query);
    $result = mysqli_fetch_array($stmt);    // to fetch the username

    if (!$stmt)
        die("Error: " . mysqli_error($conn));

    if (mysqli_num_rows($stmt) <= 0)
        echo "<script>if( !alert('Invalid Email ID or Password') ) document.location = 'login.php';</script>";
    else {
		
        session_start();
		$url="";
		if(isset($_SESSION['url'])) 
		{
   $url = $_SESSION['url']; // holds url for last page visited.
		}
else{ 
   $url = "index.php";
}
        $_SESSION['auth'] = true;
        $_SESSION['authuser'] = $result['name'];
        header("location:$url");
    }
}
?>

<main class="login-form mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a href="#" class="btn btn-link">
                                    Forgot Your Password?
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

</body>
</html>