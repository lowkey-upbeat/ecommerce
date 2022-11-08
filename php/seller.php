<?php
$insert = false;
if(isset($_POST['fname'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }
    //echo "Succes connecting to db"


    $fname = $_POST['fname'];
    $lname =$_POST['lname'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $sname =$_POST['sname'];
    $address =$_POST['address'];
    $pincode =$_POST['pin'];
    $password =$_POST['pwd'];


    $sql = "INSERT INTO `ecommerce`.`seller` (`fname`, `lname`, `phone`, `email`, `sname`, `address`, `pin`, `pwd`, `dt`) VALUES ('$fname', '$lname', '$phone', '$email', '$sname', '$address', '$pincode', '$password', current_timestamp())";


    if($con->query($sql) == true){
        // echo "succesfully inserted";
        $insert = true;
        $url="../store.html";
        echo '<script>window.location = "'.$url.'";</script>';
        die;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
        
    }
    

    $con->close();
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a seller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sell.css">
</head>

<body>

    <img src="img/bglog.jpg" alt="">
    <div class="hero">
        <div class="form-box" style="background:aliceblue;">
            <h1>Become a Seller</h1>
            <div>
                <form action="php/seller.php" method="post">
                    <fieldset>
                        <legend>Personal Info:</legend>
                        <label for="fname">First name:</label>
                        <input type="text" id="fname" name="fname"><br>
                        <label for="lname">Last name:</label>
                        <input type="text" id="lname" name="lname"><br>
                        <label for="phone">Phone number:</label>
                        <input type="tel" id="phone" name="phone" maxlength="10"><br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email"><br>

                    </fieldset>

                    <fieldset>
                        <legend>Shop Info:</legend>
                        <label for="sname">Store name:</label>
                        <input type="text" id="fname" name="sname"><br>
                        <label for="address">Address</label>
                        <input type="text" name="address" id="addre"><br>
                        <label for="pincode">Pincode</label>
                        <input type="number" name="pin" id="code" maxlength="6"><br>
                    </fieldset>
                    <label for="pwd">Create Password:</label>
                    <input type="password" id="pwd" name="pwd"><br>
                    <label for="pwd">Re-Enter Password:</label>
                    <input type="password" id="pwd" name="pwd"><br><br>

                    <fieldset>
                        <legend>Upload products</legend>
                        <input type="file" name="choosefile">
                        <div>
                            <button type="submit" name="uploadfile">
                                UPLOAD
                            </button>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn btn-primary submit-btn" onclick="myFunction()">Submit</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        function myFunction() {
          window.location.href="store.html";
        }
       </script>
</body>

</html>