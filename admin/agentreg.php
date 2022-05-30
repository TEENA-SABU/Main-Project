<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>agent registration</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>

<body>
    <?php
    include '../db.php';
    include 'header1.php';
    // When form submitted, insert values into the database.
    if (isset($_POST["submit"])) {
        // removes backslashes

        $uname = stripslashes($_REQUEST['uname']);
        //escapes special characters in a string
        $uname = mysqli_real_escape_string($con, $uname);



        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);





        $p_image = $_FILES["p_image"]["name"];
        move_uploaded_file($_FILES["p_image"]["tmp_name"], "pic/" . $_FILES["p_image"]["name"]);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($con, $phone);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "INSERT into `agent` (`uname`,`address`,`p_image`,`email`,`phone`,`password`)
                     VALUES ( '$uname', '$address', '$p_image','$email','$phone','$password')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo ("<script LANGUAGE='JavaScript'>
window. alert('Agent Added Succsesfully');
window. location. href='agentone.php';
</script>");
            // echo '<script>alert("Product added successfully")</script>';
            // header('Location:product.php');
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='agentreg.php'>add product</a> again.</p>
                  </div>";
        }
    } else {
    ?>

        <form class="form" action="" method="post" enctype="multipart/form-data" form name="Registration">
            <h1 class="login-title">AGENT REGISTRATION</h1>



            <input type="text" class="login-input" name="uname" id="outuser_value" oninput="usercheck();" placeholder="Agent name" required />
            <span style="color:red;" id="out_user"></span>
            <input type="text" class="login-input" name="address" placeholder="Address" required />



            <input type="file" class="login-input" name="p_image" placeholder="image" required />
            <input type="text" class="login-input" name="email" oninput="mailcheck();" placeholder="email" required />
            <span style="color:red;" id="out_email"></span>
            <input type="text" class="login-input" id="out_phonevalue" name="phone" oninput="mobilecheck();" placeholder="phone" required />
            <span style="color:red;" id="out_phone"></span>
            <input type="text" class="login-input" name="password" placeholder="password" required />
            <input type="submit" name="submit" value="REGISTER" class="login-button">

        </form>
    <?php
    }
    ?>
    <script src="validation.js"></script>

</body>

</html>