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
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = md5(stripslashes($_REQUEST['u_password']));
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query = "SELECT * FROM reg WHERE `username` ='$username' && `password`='password'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);


        if ($username == 'admin') {
            $query1 = "SELECT * FROM `reg` WHERE username='$username' AND password='$password'";
            $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
            $rows = mysqli_num_rows($result1);
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                // redirect to admin dashboard
                header("Location: admin\admin_dash.php");
            }
        } else {
            $query = "SELECT * FROM `reg` WHERE username='$username' AND password='$password'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $rows = mysqli_num_rows($result);

            if ($rows == 1) {
                $_SESSION['username'] = $username;

                // Redirect to user dashboard page
                header("Location: home_page.php");
            } else {
                echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
            }
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="u_password" placeholder="Password" />

            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link"><a href="forgot.php">Forgot Password</a></p>
            <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>

            <p class="link"><a href="sellerlogin.php">Agent login</a></p>

        </form>
        <img src="logo.png" alt="logo">
    <?php
    }
    ?>

</body>

</html>