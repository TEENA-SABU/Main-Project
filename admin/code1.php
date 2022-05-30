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
    session_start();

    if (isset($_POST["edit_id"])) {
        $_SESSION['productid'] = $_POST["edit_id"];
    }
    $productId = $_SESSION['productid'];
    // Editing product
    if (isset($_POST["submit"])) {
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $category = $_POST['category'];
        $p_description = $_POST['p_description'];
        $quantity = $_POST['quantity'];

        $query    = "UPDATE `products` SET `p_name`='$p_name',`p_price`='$p_price',`category_id`='$category',`p_description`='$p_description', `quantity`='$quantity' WHERE id='$productId'";

        $result   = mysqli_query($con, $query);
        if ($result) {
            //echo '<script>alert("Product added successfully")</script>';
            echo ("<script LANGUAGE='JavaScript'>
window. alert('Product Edited Succsesfully');
window. location. href='p_edit.php';
</script>");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='p_edit.php'>add product</a> again.</p>
                  </div>";
        }
    }


    // When form submitted, insert values into the database.
    if (isset($_POST["edit_id"])) {
        $queryingProduct = "SELECT * FROM `products` WHERE `id`=$productId";
        $products = $con->query($queryingProduct);
        if ($products->num_rows > 0) {
            while ($eachProduct = $products->fetch_assoc()) {
    ?>
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <h1 class="login-title">Edit PRODUCT</h1>
                    <input type="text" class="login-input" name="p_name" value="<?php echo $eachProduct['p_name']; ?>" />
                    <input type="text" class="login-input" name="p_price" value="<?php echo $eachProduct['p_price']; ?>" />
                    <select name='category'>
                        <?php
                        $result1 = "SELECT * from category";
                        $result = $con->query($result1);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['category_id'] == $eachProduct['category_id']) {
                                    echo '<option selected  value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                                } else {
                                    echo '<option  value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                    <input type="text" class="login-input" name="p_description" value="<?php echo $eachProduct['p_description']; ?>" />
                    <input type="text" class="login-input" name="quantity" value="<?php echo $eachProduct['quantity']; ?>" />
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