<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>delete</title>
    <link rel="stylesheet" href="style2.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if(isset($_POST["submit"])) {
        
        $code = $_POST['code'];
       
        $query    = "DELETE FROM `product` WHERE code='$code'";
        $result   = mysqli_query($con, $query);
        if ($result)
        {
            echo '<script>alert("Product deleted successfully")</script>';
        } else {
            echo '<script>alert("something wrong !! try once")</script>';
        }
    } else {
?>
   
    <form class="form" action="" method="post" enctype="multipart/form-data">
        <h1 class="login-title">DELETE PRODUCT</h1>
        
        <input type="text" class="login-input"  name="code" placeholder="code" required />
       
        
        <input type="submit" name="submit" value="DELETE" class="login-button">
  
    </form>
    <?php
}
?>


</body>
</html>