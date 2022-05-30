<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>add product</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  include '../db.php';
  include 'header1.php';
  // When form submitted, insert values into the database.
  if (isset($_POST["submit"])) {
    // removes backslashes

    $p_name = stripslashes($_REQUEST['p_name']);
    //escapes special characters in a string
    $p_name = mysqli_real_escape_string($con, $p_name);



    $p_price = stripslashes($_REQUEST['p_price']);
    $p_price = mysqli_real_escape_string($con, $p_price);
    $cat = $_POST['category'];

    $p_description = stripslashes($_REQUEST['p_description']);
    $p_description = mysqli_real_escape_string($con, $p_description);


    $p_image = $_FILES["p_image"]["name"];
    move_uploaded_file($_FILES["p_image"]["tmp_name"], "pic/" . $_FILES["p_image"]["name"]);

    $quantity = stripslashes($_REQUEST['quantity']);
    $quantity = mysqli_real_escape_string($con, $quantity);

    $query    = "INSERT into `products` (`p_name`,`p_price`,`category_id`,`p_image`,`p_description`,`quantity`)
                     VALUES ( '$p_name', '$p_price','$cat', '$p_image','$p_description','$quantity')";
    $result   = mysqli_query($con, $query);
    if ($result) {
      echo ("<script LANGUAGE='JavaScript'>
window. alert('Product Added Succsesfully');
window. location. href='product.php';
</script>");
      // echo '<script>alert("Product added successfully")</script>';
      // header('Location:product.php');
    } else {
      echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='add.php'>add product</a> again.</p>
                  </div>";
    }
  } else {
  ?>

    <form class="form" action="" method="post" enctype="multipart/form-data">
      <h1 class="login-title">ADD PRODUCT</h1>



      <input type="text" class="login-input" name="p_name" placeholder="product name" required />

      <input type="text" class="login-input" name="p_price" placeholder="price" required />

      <select name='category'>
        <option value="" disabled>Select Category</option>
        <?php
        $result1 = "SELECT * from category";
        $result = $con->query($result1);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
          }
        }

        ?>
      </select>


      <input type="file" class="login-input" name="p_image" placeholder="image" required />
      <input type="text" class="login-input" name="p_description" placeholder="description" required />
      <input type="text" class="login-input" name="quantity" placeholder="quantity" required />
      <input type="submit" name="submit" value="ADD" class="login-button">

    </form>
  <?php
  }
  ?>


</body>

</html>