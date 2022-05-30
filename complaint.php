<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>complaint</title>
    <link rel="stylesheet" href="style.css" />
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


        $phone   = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($con, $phone);
        $complaint   = stripslashes($_REQUEST['complaint']);
        $complaint    = mysqli_real_escape_string($con, $complaint);


        $query    = "INSERT into `comp` (username, phone,complaint )
                     VALUES ('$username',  '$phone', '$complaint')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            // echo "<div class='form'>
            echo '<script>alert("YOUR COMPLAINT ADDED SUCCSESFULLY")</script>';
            //<p class='link'>Click here to <a href='login.php'>Login</a></p>
            header("Location: home_page.php");
            //</div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='complaint.php'>complaints</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">COMPLAINTS</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />



            <input type="text" class="login-input" name="phone" placeholder="phone" required />

            <input type="complaint" class="login-input" name="complaint" placeholder="complaints" required />

            <input type="submit" name="submit" value="save" class="login-button">
            <!--<p class="link">Already have an account? <a href="login.php">Login here</a></p>-->
        </form>
    <?php
    }
    ?>

</body>

</html>