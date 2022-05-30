<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>add product</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    include 'C:\xampp\htdocs\be\db.php';
    session_start();

    if (isset($_POST["id"])) {
        $_SESSION['id'] = $_POST["id"];
    }
    $id = $_SESSION['id'];
    // Editing product
    if (isset($_POST["submit"])) {
        $uname = $_POST['uname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];


        $query    = "UPDATE `agent` SET `uname`='$uname',`address`='$address',`email`='$email',`phone`='$phone',`password`='$password' WHERE id='$id'";

        $result   = mysqli_query($con, $query);
        if ($result) {
            //echo '<script>alert("Product added successfully")</script>';
            echo ("<script LANGUAGE='JavaScript'>
window. alert('Profile Edited Succsesfully');
window. location. href='agenthome.html';
</script>");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='add.php'>add product</a> again.</p>
                  </div>";
        }
    }


    // When form submitted, insert values into the database.
    if (isset($_POST["id"])) {
        $queryingagent = "SELECT * FROM `agent` WHERE `id`=$id";
        $agent = $con->query($queryingagent);
        if ($agent->num_rows > 0) {
            while ($eachagent = $agent->fetch_assoc()) {
    ?>
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <h1 class="login-title">UPDATE PROFILET</h1>
                    <input type="text" class="login-input" name="uname" value="<?php echo $eachagent['uname']; ?>" placeholder="product name" required />
                    <input type="text" class="login-input" name="address" value="<?php echo $eachagent['address']; ?>" placeholder="price" required />
                    <input type="text" class="login-input" name="email" value="<?php echo $eachagent['email']; ?>" placeholder="product name" required />
                    <input type="text" class="login-input" name="phone" value="<?php echo $eachagent['phone']; ?>" placeholder="price" required />
                    <select name='category'>

                        <input type="submit" name="submit" value="Edit" class="login-button">

                </form>
    <?php
            }
        }
    } else {

        //header("Location: ./p_edit.php");
        die();
    }
    ?>

</body>

</html>