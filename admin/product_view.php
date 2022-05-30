<?php
include "header.php";
include "db.php";
$category_id = $_GET["view"];


session_start();
$username = $_SESSION['username'];

if (!empty($_POST['cart-btn'])) {
  $productId = $_POST['cart-btn'];
  $quantity = $_POST['quantity'];

  $result = mysqli_query($con, "SELECT * FROM `products` where id='$productId'");
  $row = mysqli_fetch_array($result);
  $item_name = $row["p_name"];
  //$item_desc = $row["p_description"];
  $amounttopay = $quantity * $row["p_price"];
  $result = mysqli_query($con, "INSERT INTO `cart`(`id`, `item_name`, `total_item`, `username`, `rate`) VALUES 
    ('$productId','$item_name','$quantity','$username','$amounttopay')");
  if ($result) {
    header("Location: cart.php");
    die();
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 200px;
      margin: auto;
      text-align: center;
      font-family: arial;
      float: left;
      margin-left: 45px;
      margin-right: 40px;
      margin-bottom: 30px;
      margin-top: 20px;
      width: 40%;

    }

    .price {
      color: blue;
      font-size: 22px;
    }

    .card button {
      border: solid;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #FF8C00;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card h2 {
      background-color: #CCCCFF;
      font-family: arial;
      font-style: bold;
      color: green;
      font-size: 12px;
    }

    .card button:hover {
      opacity: 0.7;
    }
  </style>
</head>

<body>

  <h2 style="text-align:center">Products</h2>

  <?php
  $result = mysqli_query($con, "SELECT * FROM `products` where category_id='$category_id'");
  //ptint_r($result);
  while ($row = mysqli_fetch_array($result)) { ?>
    <form action="#" method="POST">
      <div class="card">
        <img src="./admin/pic/<?php echo $row["p_image"]; ?>" width="100" height="100">
        <h1><?php echo $row["p_name"]; ?></h1>
        <h2><?php echo $row["p_description"]; ?>
        </h2>
        <p class="price">RS : <?php echo $row["p_price"]; ?></p>
        <label for="quantity">Quantity :</label>

        <input type="number" id="quantity" name="quantity" min="1" max="20">
        <p><button type="submit" name="cart-btn" value="<?php echo $row["id"]; ?>">Add to Cart</button></p>
      </div>
    </form>
</body>

</html>


<?php
  }
?>