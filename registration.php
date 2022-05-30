<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>

<body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $phone   = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($con, $phone);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `reg` (username, password, email, phone,create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email','$phone', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            //echo "<div class='form'>
            //<h3>You are registered successfully.</h3><br/>
            echo '<script>alert("YOU REGISTERED SUCCSESFULLY")</script>';
            //<p class='link'>Click here to <a href='login.php'>Login</a></p>
            header("Location: login.php");
            //</div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" action="" method="post" form name="Registration">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" oninput="usercheck();" placeholder="Name" required />
            <span style="color:red;" id="out_user"></span>
            <input type="text" class="login-input" name="email" oninput="mailcheck();" placeholder="Email Adress" required />
            <span style="color:red;" id="out_email"></span>
            <input type="text" id="phone" class="login-input" name="phone" oninput="mobilecheck();" placeholder="phone" required />
            <span style="color:red;" id="out_phone"></span>
            <input type="password" class="login-input" name="password" oninput="pass1check();" placeholder="Password" required />
            <span style="color:red;" id="out_pass1"></span>
            <input type="submit" name="submit" value="Register" class="login-button">

            <p class="link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    <?php
    }
    ?>
    <script src="validation.js"></script>
</body>

</html>