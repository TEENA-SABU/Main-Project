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
        $_SESSION['cartid'] = $_POST["edit_id"];
    }
    $productId = $_SESSION['productid'];
    // Editing product
    if (isset($_POST["submit"])) {
        $p_name = $_POST['item_name'];
        $p_price = $_POST['total_item'];


        $query    = "UPDATE `cart` SET `item_name`='$item_name',`total_item`='$total_item'";

        $result   = mysqli_query($con, $query);
        if ($result) {
            echo '<script>alert("Product added successfully")</script>';
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='add.php'>add product</a> again.</p>
                  </div>";
        }
    }


    // When form submitted, insert values into the database.
    if (isset($_POST["edit_id"])) {
        $queryingProduct = "SELECT * FROM `cart` WHERE `id`=$cart_id";
        $products = $con->query($queryingProduct);
        if ($products->num_rows > 0) {
            while ($eachProduct = $products->fetch_assoc()) {
    ?>
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <h1 class="login-title">Edit CART</h1>
                    <input type="text" class="login-input" name="p_name" value="<?php echo $eachProduct['p_name']; ?>" placeholder="product name" required />
                    <input type="text" class="login-input" name="p_price" value="<?php echo $eachProduct['p_price']; ?>" placeholder="price" required />
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
                    <input type="text" class="login-input" name="p_description" value="<?php echo $eachProduct['p_description']; ?>" placeholder="description" required />
                    <input type="submit" name="submit" value="Edit" class="login-button">

                </form>
    <?php
            }
        }
    } else {
        header("Location: ./p_edit.php");
        die();
    }
    ?>

</body>

</html>