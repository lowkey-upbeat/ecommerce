<?php
$insert = false;
if (!isset($_POST['submit'])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to this database failed due to" .
            mysqli_connect_error());
    }
    //echo "Succes connecting to db"

    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];


    $sql = "INSERT INTO `ecommerce`.`register` (`user`, `email`, `password`, `dt`) VALUES ('$user', '$email', '$pass', current_timestamp());";


    if ($con->query($sql) == true) {
        // echo "succesfully inserted";
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}

$conn = mysqli_connect("localhost", "root", "", "imgage_update");
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/log-style.css">
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="img/fb.png" alt="">
                <img src="img/tw.png" alt="">
                <img src="img/gp.png" alt="">
            </div>
            <form id="login" action="" class="input-group">
                <input type="text" class="input-field" placeholder="User Id">
                <input type="text" class="input-field" placeholder="Password">
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="" class="submit-btn">Log In</button>
            </form>
            <form id="register" class="input-group" action="php/login.php" method="POST">
                <input type="text" class="input-field" id="user" name="user" placeholder="User Id">
                <input type="email" class="input-field" id="email" name="email" placeholder="Email id">
                <input type="text" class="input-field" id="pass" name="pwd" placeholder="Password">
                <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span>
                <button type="submit" name="submit" class="submit-btn">Register</button>
            </form>
        </div>

    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>

</html>