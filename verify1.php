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
        $code = $_POST['code'];    // removes backslashes
        $rand = $_SESSION['rand'];
        if ($code == $rand) {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='reset.php';
            </script>");
        } else {
            echo "<div class='form'>
            <h3>Incorrect Code</h3><br/>
            <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
            </div>";
        }
    }
    ?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Verify Password</h1>
        <input type="number" class="login-input" name="code" placeholder="Enter code" autofocus="true" />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link"><a href="login.php">Back to login</a></p>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>

        <p class="link"><a href="sellerlogin.php">Agent login</a></p>

    </form>
    <img src="logo.png" alt="logo">
</body>

</html>