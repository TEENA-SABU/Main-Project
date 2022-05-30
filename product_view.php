<?php
include "header.php";
include "db.php";
include('auth_session.php');
$category_id = $_GET["view"];


//session_start();
$username = $_SESSION['username'];

if (!empty($_POST['cart-btn'])) {
  //$c = 0;
  //echo ++$c;
  $productId = $_POST['cart-btn'];
  $quantity = $_POST['quantity'];

  $result = mysqli_query($con, "SELECT * FROM `products` where id='$productId'");
  $row = mysqli_fetch_array($result);

  $result1 = mysqli_query($con, "UPDATE `products` SET `quantity`=quantity - $quantity WHERE id='$productId'");
  $item_name = $row["p_name"];
  //$item_desc = $row["p_description"];
  $amounttopay = $quantity * $row["p_price"];
  $result = mysqli_query($con, "SELECT * FROM `cart` WHERE `username`='$username'");
  //ptint_r($result);
  $flag = 0;
  $count = 0;
  while ($row = mysqli_fetch_array($result)) {
    if ($row['item_name'] == $item_name) {
      $flag = 1;
      $count = $row['total_item'];
      $amount = $row['rate'];
    }
  }
  if ($flag == 0) {
    $result = mysqli_query($con, "INSERT INTO `cart`(`id`, `item_name`, `total_item`, `username`, `rate`) VALUES 
              ('$productId','$item_name','$quantity','$username','$amounttopay')");
    if ($result) {
      header("Location: cart.php");
      die();
    }
  } else if ($flag == 1) {
    // echo ($amounttopay);
    // echo ($username);
    // echo ($productId);
    // echo ($count);
    $totalcount = $count + $quantity;
    $totalamount = $amount + $amounttopay;
    $query1 = "UPDATE `cart` SET `rate`= '$totalamount',`total_item`='$totalcount' WHERE  `cart`.`username`='$username'AND `cart`.`id`='$productId' ";
    $result1 = mysqli_query($con, $query1);
    if ($result1) {
      header("Location: cart.php");
      die();
    } else {
      echo "error";
    }
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
      margin-bottom: 40px;
      margin-top: 20px;
      width: 50%;

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

    .card button.dis {
      border: solid;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #FF0000;
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

    .card h3 {
      background-color: #FFFFFF;
      font-family: arial;
      font-style: bold;
      color: red;
      font-size: 12px;
    }

    .card button:hover {
      opacity: 0.7;
      background-color: #00FF00;
    }

    .card button.dis:hover {
      opacity: 0.7;
      background-color: #FF0000;
    }
  </style>
</head>

<body>

  <h2 style="text-align:center">Products</h2>

  <?php
  echo $category_id;
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
        <input type="number" id="quantity" name="quantity" min="1" max=<?php echo $row["quantity"]; ?>>
        <p>


          <?php
          $quantity = $row['quantity'];

          if ($quantity == '0') {
            echo ("<button type='button' name='cart-btn' class='dis' >Add to Cart</button>");

            echo "<h3>out of stock</h3>";
          } else {
            echo ("<button type='submit' name='cart-btn' value='" . $row['id'] . "'>Add to Cart</button>");
          }


          ?>



        </p>
      </div>
    </form>
</body>

</html>
<?php
  }
?>