<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
        $username = $_SESSION['email'] = stripslashes($_REQUEST['mail']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        // Check user is exist in the database
        $query = "SELECT * FROM reg WHERE `email` ='$username'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $row = mysqli_fetch_array($result);
            $email = $row['email'];
            $rand = $_SESSION['rand'] = rand(100000, 900000);
            $subject = "[Max Bazzar] OTP to Reset Password";
            $body = "Hi, \nYour One Time Password (OTP) to reset your password is: \n\n$rand \n\n\n\n\n\nThanks,\nMax Bazzar Team";
            $sender_email = "From: teenasabu128@gmail.com";
            if (mail($email, $subject, $body, $sender_email)) {
                echo ("<script LANGUAGE='JavaScript'>
                window.location.href='verify1.php';
                </script>");
            } else {
                echo "<div class='form'>
                        <h3>IEmail sending failed.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                        </div>";
            }
        }
    }
    ?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Forgot Password</h1>
        <input type="text" class="login-input" name="mail" placeholder="Email" autofocus="true" />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link"><a href="login.php">Back to login</a></p>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>

        <p class="link"><a href="sellerlogin.php">Agent login</a></p>

    </form>
    <img src="logo.png" alt="logo">
</body>

</html>