<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/regi.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>User Registration</title>
</head>
<body>

<?php
include_once "connection.php";

$not_sent_msg = "";
$err_pass = "";
$err_pass_pass = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone_num = trim($_POST['phone_number']);
    $dob = $_POST['dob'];
    $gender = $_POST['sex'];
    $pass = trim($_POST['password']);
    $conf_pass = trim($_POST['conf_password']);

    // Password Validation
    if (!empty($pass)) {
        if (strlen($pass) <= 8 || strlen($pass) > 32)
            $err_pass = "* Password should contain more than 8 and less then 32 characters.";
        elseif (!preg_match("#[0-9]+#", $pass)) {
            $err_pass = "* Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $pass)) {
            $err_pass = "* Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $pass)) {
            $err_pass = "* Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    }

    // Confirm Password
    if ($pass != $conf_pass)
        $err_conf_pass = "* Password do not match.";
    else
        $err_conf_pass = "";

    // DOB conversion
    $timestamp = strtotime($dob);
    $new_dob = date("Y-m-d", $timestamp);

    $sql = $conn->query("INSERT INTO user
            (name, email, phone_no, dob, gender, password)
            VALUES ('$name', '$email', '$phone_num', 
                    '$new_dob', '$gender', '$pass')");

    if (!$sql) {
        $not_sent_msg = "Error in Inserting data to the database! <br/> ". $conn->error;

    }
    else {
        $not_sent_msg = "";
        header("location:login.php");
    }
}

?>

<form action="" method="post">
    <div class="container register-form">
        <div class="form">
            <div class="note">
                <p>User Registration</p>
            </div>

            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name"
                                   required autofocus/>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="phone_number" name="phone_number" class="form-control"
                                   placeholder="Phone Number" minlength="10" maxlength="10" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                   pattern="/^\w+(\.-]?\w+)*@\w+(\.-]?\w+)*(\.\w{2,3})+$/" required/>
                        </div>
                        <div class="form-group">
                            <input type="date" id="dob" name="dob" class="form-control" placeholder="D.O.B." required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <label class="control-label col-sm-3"><b>Gender</b></label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="radio-inline">
                                                <input type="radio" id="sex" name="sex" value="Female"> Female
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="radio-inline">
                                                <input type="radio" id="sex" name="sex" value="Male"> Male
                                            </label>
                                        </div>
                                        <!--<div class="col-sm-3">
                                            <label class="radio-inline">
                                                <input type="radio" id="sex" name="sex" value="Others"> Others
                                            </label>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="Your Password" required/>
                            </div>
                            <div class="form-group">
                                <span class="text-danger font-weight-bold"><?php echo $not_sent_msg; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" id="conf_password" name="conf_password" class="form-control"
                                       placeholder="Confirm Password" required/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btnSubmit">Register</button>
        </div>
    </div>
</form>

</body>
</html>