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
        $pass = md5($_POST['pass']);    // removes backslashes
        $cpass = md5($_POST['c_pass']);
        if ($pass == $cpass) {
            $query = "UPDATE `reg` SET `password` = '$pass'";
            $res = mysqli_query($con, $query);
            if ($res) {
                echo "<div class='form'>
                <h3>Passwords Updated</h3><br/>
                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                </div>";
            } else {
            }
            echo "<div class='form'>
            <h3>Something went wrong!</h3><br/>
            <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
            </div>";
        } else {
            echo "<div class='form'>
            <h3>Passwords doesn't match!</h3><br/>
            <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
            </div>";
        }
    }
    ?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Reset Password</h1>
        <input type="text" class="login-input" name="pass" placeholder="Enter password" autofocus="true" />
        <input type="text" class="login-input" name="c_pass" placeholder="Confirm Password" autofocus="true" />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link"><a href="login.php">Back to login</a></p>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>

        <p class="link"><a href="sellerlogin.php">Agent login</a></p>

    </form>
    <img src="logo.png" alt="logo">
</body>

</html>