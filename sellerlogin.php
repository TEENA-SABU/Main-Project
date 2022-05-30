<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    include 'db.php';
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['submit'])) {
        $uname = stripslashes($_REQUEST['username']);    // removes backslashes
        $uname = mysqli_real_escape_string($con, $uname);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `agent` WHERE uname='$uname'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['uname'] = $uname;
            // Redirect to user dashboard page
            header("Location: agent\public\agenthome.html");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link"> <a href="login.php">User Login</a></p>




        </form>
        <img src="logo.png" alt="logo">
    <?php
    }
    ?>

</body>

</html>